<?php

require_once get_theme_file_path("includes/custom-clases/CUS_MediaRoutes.php");
require_once get_theme_file_path("includes/custom-clases/controllers/CUS_Controller_MediaRoute.php");

global $RESPONSE_CREATE_ROUTE, $FORM_DATA;
$RESPONSE_CREATE_ROUTE = [];
$FORM_DATA = [];

if($_POST){
    $FORM_DATA = $_POST;
    registerMedia($_POST['media']);
}

function registerMedia($fields) {
    $media_controller = new CUS_Controller_MediaRoute();
    global $RESPONSE_CREATE_ROUTE;

    $media = new CUS_MediaRoutes();
    $media_id = ($fields["id_media_route"]) ? $media->update($fields["id_media_route"], $fields) : $media->insert($fields);

    if($media_id){
        if(isset($_FILES["media_image"])){
            if(trim($_FILES["media_image"]["name"]) != ""){
                $profile_image = $media_controller->load_image($_FILES["media_image"], $fields["id_route"]);
                $new_fields["url"] = $profile_image;
                $media->update($media_id, $new_fields);
            }
        }

        set_flash_message('success_message', '¡Información guardada exitosamente!');
        wp_redirect(site_url().'/media-experiencias/?route='.cus_encrypt($fields["id_route"]));
        exit;
    }
    else {
        $RESPONSE_CREATE_ROUTE = array('field' => 'time', 'message' => "<b>Error!</b> No se ha podido subir el contenido.");
    }
}
?>