<?php
require_once('../../../../../wp-load.php');
require_once get_theme_file_path("includes/custom-clases/CUS_UserMeta.php");
require_once get_theme_file_path("includes/custom-clases/CUS_Users.php");
require_once get_theme_file_path("includes/custom-clases/controllers/CUS_Controller_Collaborators.php");

// Obtiene el usuario logueado
$current_user = cus_get_current_user();

// Obtiene la lista de colaboradoras del sitio
$company = cus_get_company($current_user->ID);
$collaborators = new CUS_Controller_Collaborators();
$usersModel = new CUS_Users();
$collaborators->set_collaborators(get_company_collaborators($company["id_cus_company"]));

if($current_user){
    if($_POST){
        // Determina si es posible actualizar un rol
        if($collaborators->check_if_possible_collaborator($_POST["user_id"])){
            $id_user = $_POST["user_id"];

            // Obtiene todos los metadatos del usuario
            $all_user_meta = get_user_meta($id_user);

            // Itera a través de los metadatos y elimínalos uno por uno
            foreach ($all_user_meta as $meta_key => $meta_values) {
                delete_user_meta($id_user, $meta_key);
            }

            $deleted = $usersModel->delete($id_user);
            if($deleted)
                echo json_encode(array("status" => true, "message" => "Colaborador eliminado exitosamente!"));
            else
                echo json_encode(array("status" => false, "message" => "No ha sido posible eliminar el usuario"));
        }
        else echo json_encode(array("status" => false, "message" => "No es posible eliminar a este usuario, es necesario mantener por lo menos una persona con el rol de administrador."));
    }
    else echo json_encode(array("status" => false, "message" => "No se ha recibido ningún dato"));
}
else echo json_encode(array("status" => false, "message" => "No tiene permisos para realizar esta acción"));