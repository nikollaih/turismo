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

// Registrar nuevo item de galeria
function registerMedia($fields) {
    $media_controller = new CUS_Controller_MediaRoute();
    global $RESPONSE_CREATE_ROUTE;
    $media = new CUS_MediaRoutes();
    if(isset($_FILES["media_image"])){
        if(trim($_FILES["media_image"]["name"][0]) != ""){
            for ($i=0; $i < count($_FILES["media_image"]["name"]); $i++) { 
                $newFile = getFileFormat($_FILES["media_image"], $i);
                $media_id = ($fields["id_media_route"]) ? $media->update($fields["id_media_route"], $fields) : $media->insert($fields);
                $profile_image = $media_controller->load_image($newFile, $fields["id_route"]);
                $new_fields["url"] = $profile_image;
                $media->update($media_id, $new_fields);
            }
        }
        else {
            $media_id = ($fields["id_media_route"]) ? $media->update($fields["id_media_route"], $fields) : $media->insert($fields);
        }
    }

    set_flash_message('success_message', '¡Información guardada exitosamente!');
    wp_redirect(site_url().'/media-experiencias/?route='.cus_encrypt($fields["id_route"]));
    exit;
}

// Obtener el formato de archivo
function getFileFormat($file, $index){
    return array(
        "name" => $file["name"][$index],
        "type" => $file["type"][$index],
        "tmp_name" => $file["tmp_name"][$index],
        "size" => $file["size"][$index]
    );
}
?>
