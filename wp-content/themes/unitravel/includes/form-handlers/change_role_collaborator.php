<?php
require_once('../../../../../wp-load.php');
require_once get_theme_file_path("includes/custom-clases/CUS_UserMeta.php");
require_once get_theme_file_path("includes/custom-clases/controllers/CUS_Controller_Collaborators.php");

// Obtiene el usuario logueado
$current_user = cus_get_current_user();

// Obtiene la lista de colaboradoras del sitio
$company = cus_get_company($current_user->ID);
$collaborators = new CUS_Controller_Collaborators();
$collaborators->set_collaborators(get_company_collaborators($company["id_cus_company"]));

if($current_user){
    if($_POST){
        // Determina si es posible actualizar un rol
        if($collaborators->check_if_possible_collaborator($_POST["user_id"])){
            // Actualizar el metadato del usuario
            $updated = update_user_meta($_POST["user_id"], "user_company_permissions", $_POST["new_role"]);
            if($updated)
                echo json_encode(array("status" => true, "message" => "Rol actualizado correctamente!"));
            else
                echo json_encode(array("status" => false, "message" => "No ha sido posible actualizar el rol"));
        }
        else echo json_encode(array("status" => false, "message" => "No es posible cambiar el rol a este usuario"));
    }
    else echo json_encode(array("status" => false, "message" => "No se ha recibido ningún dato"));
}
else echo json_encode(array("status" => false, "message" => "No tiene permisos para realizar esta acción"));