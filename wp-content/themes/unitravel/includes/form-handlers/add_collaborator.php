<?php
require_once get_theme_file_path("includes/custom-clases/CUS_Users.php");
require_once get_theme_file_path("includes/custom-clases/CUS_UserMeta.php");


global $RESPONSE_CREATE_USER, $FORM_DATA;
$RESPONSE_CREATE_USER = [];
$FORM_DATA = [];


if($_POST){
    $FORM_DATA = $_POST;
    $FORM_DATA["user"]["company_id"] = $company["id_cus_company"];
    registerUser($FORM_DATA["user"]);
}

function registerUser($user) {
    $user["profile_image"] = "";
    $user["rol"] = "emprendedora";
    $user["permissions"] = "collaborator";
    global $RESPONSE_CREATE_USER;
    // Crear una instancia de la clase
    $users = new CUS_Users();
    $validateFields = validateNewUser($user);
    if($validateFields["status"] == true){
        $new_user = getFormatedUserArray($user);

        // Insertar el nuevo usuario
        $user_id = $users->insert_user($new_user);
        if ($user_id) { 
            if(isset($_FILES["profile"])){
                $profile_image = load_profile_image($_FILES["profile"], $user_id);
                $user["profile_image"] = $profile_image;
            }

            registerUserMeta($user_id, $user, $user["company_id"], false);
            // En el controlador del formulario o en el lugar donde procesas el formulario con éxito.
            set_flash_message('success_message', '¡Colaboradora creada exitosamente!');
            header("Location: ".home_url()."/colaboradoras");
        }
    }
    else {
        $RESPONSE_CREATE_USER = $validateFields;
    }
}


function validateNewUser($user){
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