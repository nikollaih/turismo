<?php
require_once get_theme_file_path("includes/custom-clases/CUS_Companies.php");
require_once get_theme_file_path("includes/custom-clases/controllers/CUS_Controller_Company.php");
require_once get_theme_file_path("includes/custom-clases/controllers/CUS_Controller_User.php");
require_once get_theme_file_path("includes/custom-clases/CUS_Users.php");
require_once get_theme_file_path("includes/custom-clases/CUS_UserMeta.php");


global $RESPONSE_CREATE_USER_COMPANY, $FORM_DATA;
$RESPONSE_CREATE_USER_COMPANY = [];
$FORM_DATA = [];

if($_POST){
    $FORM_DATA = $_POST;
    $user_post = (isset($_POST["user"])) ? $_POST["user"] : false;
    $company_post = (isset($_POST["company"])) ? $_POST["company"] : false;
    updateUserCompany($user_post, $company_post);
}

function updateUserCompany($user, $company){
    updateUser($user);
    updateCompany($company);
    set_flash_message('success_message', '¡Información modificada exitosamente!');
}

function updateUser($user) {
    global $RESPONSE_CREATE_USER_COMPANY;
    if($user){
        // Crear una instancia de las clases
        $users_model = new CUS_Users();
        $user_controller = new CUS_Controller_User();

        // Validar que los campos
        $validateFields = validateUserCompany($user);
        $RESPONSE_CREATE_USER_COMPANY = $validateFields;

        if($validateFields["status"] == true){
            $new_user = $user_controller->getFormatedEditUserArray($user);
            $new_meta = array("biografia" => $user["biografia"]);
            $new_meta = array("historia" => $user["historia"]);

            // Modificar el usuario usuario
            $updated_user = $users_model->update_user($user["ID"], $new_user);
            if (isset($_FILES["profile"])) {
                if(trim($_FILES["profile"]["name"]) != ""){
                    $profile_image = load_profile_image($_FILES["profile"], $user["ID"]);
                    $user["profile_image"] = $profile_image;
                    $new_meta = array("wp_profile_image" => $user["profile_image"], "biografia" => $user["biografia"]);
                }
            }
            $user_controller->update_user_meta($user["ID"], $new_meta);
            $user["display_name"] = $user["fullname"];
            updateProfilePost($user, $user["ID"]);
        }
    }
}

function updateCompany($company) {
    if($company){
        $company_class = new CUS_Companies();
        $company_controller_class = new CUS_Controller_Company();

        $company_data = $company_controller_class->getFormatedCompanyArray($company);
    
        if(isset($_FILES["logo"])){
            if (trim($_FILES["logo"]["name"]) != "")
                $company_data["cus_company_logo"] = load_company_image($_FILES["logo"], $company["id_company"]);
        }

        $company_class->update_company($company["id_company"], $company_data);
    }
}

function validateUserCompany($user){
    $users = new CUS_Users();
    $user_meta = new CUS_UserMeta();

    $exists_document = $user_meta->get_usermeta_by_param("document_number", $user["document"]);
    
    if(is_array($exists_document) && $exists_document["user_id"] != $user["ID"]) return array('field' => 'document', 'message' => "Ya existe una cuenta con este número de documento.", "status" => false);

    if(trim($user["historia"]) != "" && !strpos($user["historia"], 'embed')) return array('field' => 'historia', 'message' => "La url del video de YouTube no es válida, recuerde que debe ser la url del video embebido.", "status" => false);

    $exists_email = $users->get_user_by_param("user_email", $user["email"]);
    if(is_array($exists_email) && $exists_email["ID"] != $user["ID"]) return array('field' => 'email', 'message' => "Ya existe una cuenta con este correo.", "status" => false);

    return array("status" => true);
}

?>