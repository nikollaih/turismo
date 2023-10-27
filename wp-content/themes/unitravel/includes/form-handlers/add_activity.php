<?php

require_once get_theme_file_path("includes/custom-clases/CUS_Activities_Route.php");

global $RESPONSE_CREATE_ROUTE, $FORM_DATA;
$RESPONSE_CREATE_ROUTE = [];
$FORM_DATA = [];

if($_POST){
    $FORM_DATA = $_POST;
    registerActivity($_POST['activity']);
}

function registerActivity($fields) {
    global $RESPONSE_CREATE_ROUTE;

    $activity = new CUS_Activities_Route();
    $validateFields = validateFieldActivities($fields);

    if($validateFields["status"]){
        $activity_id = ($fields["id_activities_route"]) ? $activity->update($fields["id_activities_route"], $fields) : $activity->insert($fields);

        if($activity_id){
            set_flash_message('success_message', '¡Información guardada exitosamente!');
            wp_redirect(site_url().'/actividades-ruta?route='.cus_encrypt($fields["id_route"]));
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


function validateFieldActivities($fields){
    // Valida si la hora de inicio es mayor a la de finalización
    if($fields["activity_start_time"] > $fields["activity_end_time"])
    return array('field' => 'time', 'message' => "<b>Error!</b> La hora de inicio no puede ser mayor a la de finalización.", "status" => false);

    return array("status" => true);
}

?>