<?php
require_once get_theme_file_path("includes/custom-clases/CUS_Companies.php");
require_once get_theme_file_path("includes/custom-clases/controllers/CUS_Controller_Company.php");
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
    $user["rol"] = "en_revision";
    $user["permissions"] = "admin";
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
                $new_user["profile_image"] = $profile_image;
            }
            
            $company_id = registerCompany($company);
            if($company_id == 0)
                $users->delete($user_id);
            else {
                $new_user["biografia"] = $user["biografia"];
                createProfilePost($new_user, $user_id);
                registerUserMeta($user_id, $user, $company_id);
            } 
        }
    }
    else {
        $RESPONSE_CREATE_USER_COMPANY = $validateFields;
    }
}

function registerCompany($company) {
    $company_class = new CUS_Companies();
    $company_controller_class = new CUS_Controller_Company();
    $new_company = $company_controller_class->getFormatedCompanyArray($company);
    $company_id = $company_class->insert_company($new_company);

    if(isset($_FILES["logo"])){
        $new_data["cus_company_logo"] = load_company_image($_FILES["logo"], $company_id);
        $company_class->update_company($company_id, $new_data);
    }
    
    return $company_id;
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

?>