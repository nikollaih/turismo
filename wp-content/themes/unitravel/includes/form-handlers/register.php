<?php
require_once get_theme_file_path("includes/custom-clases/CUS_Companies.php");
require_once get_theme_file_path("includes/custom-clases/CUS_Users.php");
require_once get_theme_file_path("includes/custom-clases/CUS_UserMeta.php");


global $RESPONSE_CREATE_USER_COMPANY, $FORM_DATA;
$RESPONSE_CREATE_USER_COMPANY = [];
$FORM_DATA = [];

if($_POST){
    $FORM_DATA = $_POST;
    registerUser($_POST["user"], $_POST["company"]);
}

function registerUser($user, $company) {
    $user["profile_image"] = "";
    global $RESPONSE_CREATE_USER_COMPANY;
    // Crear una instancia de la clase
    $users = new CUS_Users();
    $validateFields = validateNewUserCompany($user, $company);
    if($validateFields["status"] == true){
        $new_user = getFormatedUserArray($user);

        // Insertar el nuevo usuario
        $user_id = $users->insert_user($new_user);
        if ($user_id) {
            if(isset($_FILES["profile"])){
                $profile_image = load_profile_image($_FILES["profile"], $user_id);
                $user["profile_image"] = $profile_image;
            }
            registerUserMeta($user_id, $user);
            registerCompany($user_id, $new_user, $company);
        } else {
            echo 'Error al agregar el usuario.';
        }
    }
    else {
        $RESPONSE_CREATE_USER_COMPANY = $validateFields;
    }
}

function registerCompany($user_id, $user, $company) {
    $company_class = new CUS_Companies();
    $new_company = getFormatedCompanyArray($user_id, $company);
    $company_id = $company_class->insert_company($new_company);
    if(isset($_FILES["logo"])){
        $new_data["cus_company_logo"] = load_company_image($_FILES["logo"], $company_id);
        $company_class->update_company($company_id, $new_data);
    }
    do_login($user["user_login"], $user["user_pass"], "registro-exitoso");
}

function registerUserMeta($user_id, $user){
    $user_meta = new CUS_UserMeta();
    $user_meta_capabilities = $user_meta->get_usermeta_by_key($user_id, "wp_capabilities");

    $data_update = array("user_id" => $user_id, "meta_key" => "wp_capabilities", "meta_value" => serialize(["emprendedora"]));
    $updated_user_meta = $user_meta->update_usermeta($data_update);

    $data_update = array("user_id" => $user_id, "meta_key" => "wp_profile_image", "meta_value" => $user["profile_image"]);
    $updated_user_meta = $user_meta->update_usermeta($data_update);

    $data_add = array("user_id" => $user_id, "meta_key" => "document_number", "meta_value" => $user["document"]);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);
}

function validateNewUserCompany($user, $company_data){
    $users = new CUS_Users();
    $user_meta = new CUS_UserMeta();

    $exists_document = $user_meta->get_usermeta_by_param("document_number", $user["document"]);
    if(is_array($exists_document)) return array('field' => 'document', 'message' => "Ya existe una cuenta con este número de documento.", "status" => false);

    $exists_email = $users->get_user_by_param("user_email", $user["email"]);
    if(is_array($exists_email)) return array('field' => 'email', 'message' => "Ya existe una cuenta con este correo.", "status" => false);

    if($user["pass"] != $user["r_pass"])
    return array('field' => 'pass', 'message' => "Las contraseñas no coinciden.", "status" => false);

    return array("status" => true);
}

function getFormatedUserArray($user){
    // Datos del nuevo usuario
    return array(
        'user_login' => $user["email"],
        'user_login' => $user["email"],
        'user_pass' => $user["pass"],
        'user_nicename' => $user["email"],
        'user_email' => $user["email"],
        'user_url' => "",
        'user_activation_key' => '',
        'user_status' => 1,
        'display_name' => $user["fullname"]
    );
}

function getFormatedCompanyArray($id_user, $company){
    $company_class = new CUS_Companies();

    // Datos del nuevo emprendimiento
    return array(
        'id_user' => $id_user,
        'cus_company_name' => $company["name"],
        'cus_company_slug' => $company_class->generateSlug($company["name"]),
        'cus_company_web' => $company["web"],
        'cus_company_city' => $company["city"],
        'cus_company_whatsapp' => $company["whatsapp"],
        'cus_company_address' => $company["address"],
        'cus_company_phone' => $company["phone"],
        'cus_company_latitude' => $company["latitude"],
        'cus_company_longitude' => $company["longitude"],
        'cus_company_description' => $company["description"]
    );
}
?>