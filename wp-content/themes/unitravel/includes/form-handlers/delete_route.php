<?php
require_once('../../../../../wp-load.php');
require_once get_theme_file_path("includes/custom-clases/CUS_Activities_Route.php");
require_once get_theme_file_path("includes/custom-clases/CUS_Route.php");

// Obtiene el usuario logueado
$current_user = cus_get_current_user();
$activitiesModel = new CUS_Activities_Route();
$routesModel = new CUS_Route();

if($current_user){
    if($_POST){
        $id_route = $_POST["id_route"];
        // Determina si es posible actualizar un rol
        $deletedActivities = $activitiesModel->delete($id_route, "id_route");
        $deletedRoute = $routesModel->delete($id_route);
        if($deletedRoute)
            echo json_encode(array("status" => true, "message" => "Experiencia turistica eliminada exitosamente!"));
        else
            echo json_encode(array("status" => false, "message" => "No ha sido posible eliminar la experiencia turistica"));
    }
    else echo json_encode(array("status" => false, "message" => "No se ha recibido ningún dato"));
}
else echo json_encode(array("status" => false, "message" => "No tiene permisos para realizar esta acción"));