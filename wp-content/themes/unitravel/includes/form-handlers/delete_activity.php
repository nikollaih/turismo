<?php
require_once('../../../../../wp-load.php');
require_once get_theme_file_path("includes/custom-clases/CUS_Activities_Route.php");

// Obtiene el usuario logueado
$current_user = cus_get_current_user();
$activitiesModel = new CUS_Activities_Route();

if($current_user){
    if($_POST){
        $id_activity = $_POST["id_activity"];
        // Determina si es posible actualizar un rol
        $deleted = $activitiesModel->delete($id_activity);
        if($deleted)
            echo json_encode(array("status" => true, "message" => "Actividad eliminada exitosamente!"));
        else
            echo json_encode(array("status" => false, "message" => "No ha sido posible eliminar la actividad"));
    }
    else echo json_encode(array("status" => false, "message" => "No se ha recibido ningún dato"));
}
else echo json_encode(array("status" => false, "message" => "No tiene permisos para realizar esta acción"));