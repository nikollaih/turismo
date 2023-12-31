<?php

require_once get_theme_file_path("includes/custom-clases/CUS_Route.php");
require_once get_theme_file_path("includes/custom-clases/controllers/CUS_Controller_Route.php");

global $RESPONSE_CREATE_ROUTE, $FORM_DATA;
$RESPONSE_CREATE_ROUTE = [];
$FORM_DATA = [];

if($_POST){
    $FORM_DATA = $_POST;
    registerRoute($_POST['route']);
}

function registerRoute($fields) {
    $route_controller = new CUS_Controller_Route();
    global $RESPONSE_CREATE_ROUTE;

    $route = new CUS_Route();
    $validateFields = validateFieldRoutes($fields);

    if($validateFields["status"]){
        $route_id = ($fields["id_route"]) ? $route->update($fields["id_route"], $fields) : $route->insert($fields);

        if($route_id){
            if(isset($_FILES["route_image"]) || isset($_FILES["file_itinerario"])){
                if(trim($_FILES["route_image"]["name"]) != "" || trim($_FILES["file_itinerario"]["name"]) != ""){
                    if(trim($_FILES["route_image"]["name"]) != ""){
                        $profile_image = $route_controller->load_image($_FILES["route_image"], $route_id);
                        $new_fields["route_image"] = $profile_image;
                    }

                    if(trim($_FILES["file_itinerario"]["name"]) != ""){
                        $itinerario = $route_controller->load_itinerario($_FILES["file_itinerario"], $route_id);
                        $new_fields["route_itinerario"] = $itinerario;
                    }
                    $route->update($route_id, $new_fields);
                }
            }

            set_flash_message('success_message', '¡Información guardada exitosamente!');
            wp_redirect(site_url().'/mis-rutas');
            exit;
        }
        else {
            $RESPONSE_CREATE_ROUTE = array('field' => 'time', 'message' => "<b>Error!</b> No se ha podido crear la ruta.");
        }
    }
    else {
        $RESPONSE_CREATE_ROUTE = $validateFields;
    }
}


function validateFieldRoutes($fields){
    // Valida si la hora de inicio es mayor a la de finalización
    if($fields["route_start_time"] > $fields["route_end_time"])
    return array('field' => 'time', 'message' => "<b>Error!</b> La hora de inicio no puede ser mayor a la de finalización.", "status" => false);

    // Valida si el descuento es mayor al precio
    if($fields["route_discount"] > $fields["route_price"])
    return array('field' => 'price', 'message' => "<b>Error!</b> El descuento no puede ser mayor al precio.", "status" => false);

    return array("status" => true);
}

?>