<?php
require_once('../../../../../wp-load.php');
require_once get_theme_file_path("includes/custom-clases/CUS_MediaRoutes.php");

// Obtiene el usuario logueado
$current_user = cus_get_current_user();
$mediasModel = new CUS_MediaRoutes();

if($current_user){
    if($_POST){
        $id_media = $_POST["id_media"];
        // Determina si es posible actualizar un rol
        $deleted = $mediasModel->delete($id_media);
        if($deleted)
            echo json_encode(array("status" => true, "message" => "Recurso eliminado exitosamente!"));
        else
            echo json_encode(array("status" => false, "message" => "No ha sido posible eliminar el recurso"));
    }
    else echo json_encode(array("status" => false, "message" => "No se ha recibido ningún dato"));
}
else echo json_encode(array("status" => false, "message" => "No tiene permisos para realizar esta acción"));