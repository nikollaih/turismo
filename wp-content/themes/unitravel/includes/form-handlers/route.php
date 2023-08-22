<?php

require_once get_theme_file_path("includes/custom-clases/CUS_Route.php");

global $RESPONSE_CREATE_ROUTE, $FORM_DATA;
$RESPONSE_CREATE_ROUTE = [];
$FORM_DATA = [];

if($_POST){
    $FORM_DATA = $_POST['route'];
    registerRoute($_POST['route']);
}

function registerRoute($fields) {
    global $RESPONSE_CREATE_ROUTE;

    $route = new CUS_Route();
    $validateFields = validateFieldRoutes($fields);
    $new_route = getFormatedRouteArray($fields);

    //Insert Route
    $route_id = $route->insert_routes($new_route);

    if(!$route_id) echo "Error al agregar nueva ruta. ";
}


function validateFieldRoutes($fields){

}

function getFormatedRouteArray($fields){

    return array(
        'route_name' => $fields["name"],
        'route_description' => $fields["description"],
        'route_activity_name' => $fields["activityName"],
        'route_activity_description' => $fields["activityDescription"],
        'route_longitude' => $fields["longitud"],
        'route_latitude' => $fields["latitud"]
    );
}

?>