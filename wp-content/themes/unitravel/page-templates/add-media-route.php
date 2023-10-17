<?php
/*
Template Name: Add Media Route
*/
?>
<?php 
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("includes/form-handlers/add_media_route.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");
    require_once get_theme_file_path("includes/custom-clases/CUS_MediaRoutes.php");

    // Obtiene la session falsh en caso de que se haya creado una nueva colaboradora
    $success_message = get_flash_message('success_message');

    // Obtenemos la información de la ruta en caso de querer modificarla
    $id_route = isset($_GET['route']) ? cus_decrypt(sanitize_text_field($_GET['route'])) : false;
    $id_media = isset($_GET['media']) ? cus_decrypt(sanitize_text_field($_GET['media'])) : false;

    if($id_route){
        $routeModel = new CUS_Route();
        $route = $routeModel->find($id_route);
        $mediaModel = new CUS_MediaRoutes();
        $media = $mediaModel->find($id_media); 

        if(!isset($FORM_DATA["media"]))
            $FORM_DATA["media"] = $media;
    
        $FORM_DATA["media"]["media_image"] = $media["url"];

        // Validamos que el usuario si pertenezca a la finca
        if(!user_belongs_company($current_user->ID, $route["company_id"])){
            //wp_redirect(site_url());
            //exit;
        }
    }
?>
<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center mt-0 h5-orange"><?= ($id_media) ? "MODIFICAR" : "AGREGAR" ?> FOTO O VIDEO</h3>
                            <div class="alert alert-warning" role="alert">
                                Los campos marcados con <b class="text-danger">*</b> son obligatorios.
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                        if (!empty($success_message)) {
                                            echo '<div class="alert alert-success" role="alert">' . esc_html($success_message) . '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php if(isset($RESPONSE_CREATE_ROUTE["status"]) && $RESPONSE_CREATE_ROUTE["status"] == false){
                                echo '<div class="alert alert-danger" role="alert">'.$RESPONSE_CREATE_ROUTE["message"].'</div>';
                            }?>
                            <!-- <div class="card">
                                <div class="p-5"> -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="card card-registration card-registration-2 p-5" style="border-radius: 15px;">
                                            <div class="card-body p-0">
                                                <input type="hidden" name="media[id_media_route]" value="<?= (isset($FORM_DATA["media"]["id_media_route"]) && $FORM_DATA["media"]["id_media_route"] != 0) ? $FORM_DATA["media"]["id_media_route"] : null ?>">
                                                <input type="hidden" name="media[id_route]" value="<?= $id_route ?>">
                                                <div class="form-group">
                                                    <label for="nameRoute">Nombre de la foto o video<b class="text-danger">*</b></label>
                                                    <input required type="text" class="form-control" id="nameRoute" name="media[name]" value="<?= (isset($FORM_DATA["media"]["name"]) ? $FORM_DATA["media"]["name"] : "") ?>">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Tipo de medio <b class="text-danger">*</b></label>
                                                            <select name="media[type]" id="select-media-type">
                                                                <option <?= (isset($FORM_DATA["media"]["type"]) && $FORM_DATA["media"]["type"] == "foto") ? "selected" : "" ?> value="foto">Foto</option>
                                                                <option <?= (isset($FORM_DATA["media"]["type"]) && $FORM_DATA["media"]["type"] == "video") ? "selected" : "" ?>  value="video">Video</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 show-video" style="display:<?= (isset($FORM_DATA["media"]["type"]) && $FORM_DATA["media"]["type"] == "video") ? "block" : "none" ?>;">
                                                        <div class="form-group">
                                                            <label for="nameRoute">URL del video (Youtube)</label>
                                                            <input type="text" class="form-control" id="nameRoute" name="media[url_video]" value="<?= (isset($FORM_DATA["media"]["url_video"]) ? $FORM_DATA["media"]["url_video"] : "") ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 show-image" style="display:<?= (isset($FORM_DATA["media"]["type"]) && $FORM_DATA["media"]["type"] == "foto") ? "block" : ((!isset($FORM_DATA["media"]["type"])) ? "block" : "none") ?>;">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Seleccionar foto</label>
                                                            <input name="media_image[]" multiple type="file" class="form-control-file form-control" id="file-image" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nameActivityRoute">Descripción corta</label>
                                                    <input maxlength="250" value="<?= (isset($FORM_DATA["media"]["description"]) ? $FORM_DATA["media"]["description"] : "") ?>" name="media[description]" placeholder="" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                                </div>
                                                <div class="mt-5">
                                                    <a href="<?= home_url() ?>/media-experiencias/?route=<?= cus_encrypt($id_route) ?>">
                                                        <button type="button" class="btn btn-dark btn-lg"
                                                            data-mdb-ripple-color="dark">Regresar</button>
                                                    </a>
                                                    <button type="submit" class="btn btn-primary btn-lg"
                                                        data-mdb-ripple-color="dark">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <!-- </div>
                            </div> -->
                        </div>
                    </div>  
                </div>
            </section>
        </div>
    </div>
    <?php get_footer() ?>
</div>