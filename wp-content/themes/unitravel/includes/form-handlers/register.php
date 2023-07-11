<?php
require_once get_theme_file_path("includes/custom-clases/CUS_Companies.php");
require_once get_theme_file_path("includes/custom-clases/CUS_Users.php");
require_once get_theme_file_path("includes/custom-clases/CUS_UserMeta.php");

global $RESPONSE_CREATE_USER, $FORM_DATA;
$RESPONSE_CREATE_USER = [];
$FORM_DATA = [];

if($_POST){
    $FORM_DATA = $_POST;
    registerUser($_POST["user"], $_POST["company"]);
}

function registerUser($user, $company) {
    global $RESPONSE_CREATE_USER;
    // Crear una instancia de la clase
    $users = new CUS_Users();
    $validateFields = validateNewUserCompany($user, $company);
    if($validateFields["status"] == true){
        $new_user = getFormatedUserArray($user);

        // Insertar el nuevo usuario
        $user_id = $users->insert_user($new_user);
        if ($user_id) {
            registerUserMeta($user_id, $user);
        } else {
            echo 'Error al agregar el usuario.';
        }
    }
    else {
        $RESPONSE_CREATE_USER = $validateFields;
    }
}

function registerCompany($company) {
    
}

function registerUserMeta($user_id, $user){
    $user_meta = new CUS_UserMeta();
    $user_meta_capabilities = $user_meta->get_usermeta_by_key($user_id, "wp_capabilities");
    $data_update = array("user_id" => $user_id, "meta_key" => "wp_capabilities", "meta_value" => serialize(["emprendedora"]));
    $updated_user_meta = $user_meta->update_usermeta($data_update);
    $data_add = array("user_id" => $user_id, "meta_key" => "document_number", "meta_value" => $user["document"]);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);
}

function validateNewUserCompany($user, $company){
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
?>