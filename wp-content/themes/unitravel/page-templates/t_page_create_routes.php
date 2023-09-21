<?php
/*
Template Name: Create Routes
*/
?>
<?php 
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("includes/form-handlers/add_route.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");

    // Obtiene la session falsh en caso de que se haya creado una nueva colaboradora
    $success_message = get_flash_message('success_message');

    // Obtenemos la información de la ruta en caso de querer modificarla
    $id_route = isset($_GET['route']) ? cus_decrypt(sanitize_text_field($_GET['route'])) : false;
    if($id_route){
        $routeModel = new CUS_Route();
        $route = $routeModel->find($id_route);
        if(!isset($FORM_DATA["route"]))
            $FORM_DATA["route"] = $route;
    
        $FORM_DATA["route"]["route_image"] = $route["route_image"];

        // Validamos que el usuario si pertenezca a la finca
        if(!user_belongs_company($current_user->ID, $FORM_DATA["route"]["company_id"])){
            wp_redirect(site_url());
            exit;
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
                            <h3 class="text-center mt-0 h5-orange"><?= ($id_route) ? "MODIFICAR" : "CREAR" ?> EXPERIENCIA TURISTICA</h3>
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
                                                <input type="hidden" name="route[id_route]" value="<?= (isset($FORM_DATA["route"]["id_route"]) && $FORM_DATA["route"]["id_route"] != 0) ? $FORM_DATA["route"]["id_route"] : null ?>">
                                                <input type="hidden" name="route[company_id]" value="<?= $company["id_cus_company"] ?>">
                                                <div class="form-group text-center">
                                                    <label for=""><i class="fa-regular fa-pen-to-square"></i> Seleccionar imagen de experiencia</label><br>
                                                    <label for="file-image" style="cursor: pointer;">
                                                        <img id="file-preview" src="<?= get_route_logo($id_route, $FORM_DATA["route"]["route_image"]) ?>" alt="Vista previa de la imagen" class="img-thumbnail custom-image-profile banner-image">
                                                    </label>
                                                    <input name="route_image" type="file" class="form-control-file" id="file-image" accept="image/*" style="display: none;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nameRoute">Nombre <b class="text-danger">*</b></label>
                                                    <input required type="text" class="form-control" id="nameRoute" name="route[route_name]" value="<?= (isset($FORM_DATA["route"]["route_name"]) ? $FORM_DATA["route"]["route_name"] : "") ?>">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Hora de inicio <b class="text-danger">*</b></label>
                                                            <input required type="time" class="form-control" id="nameRoute" name="route[route_start_time]" value="<?= (isset($FORM_DATA["route"]["route_start_time"]) ? $FORM_DATA["route"]["route_start_time"] : "") ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Hora de finalización <b class="text-danger">*</b></label>
                                                            <input required type="time" class="form-control" id="nameRoute" name="route[route_end_time]" value="<?= (isset($FORM_DATA["route"]["route_end_time"]) ? $FORM_DATA["route"]["route_end_time"] : "") ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Precio <b class="text-danger">*</b> (Sin puntos ni comas)</label>
                                                            <input placeholder="$" required type="number" class="form-control" id="nameRoute" name="route[route_price]" value="<?= (isset($FORM_DATA["route"]["route_price"]) ? $FORM_DATA["route"]["route_price"] : "") ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Descuento (Sin puntos ni comas)</label>
                                                            <input placeholder="$" type="number" class="form-control" id="nameRoute" name="route[route_discount]" value="<?= (isset($FORM_DATA["route"]["route_discount"]) ? $FORM_DATA["route"]["route_discount"] : "") ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descriptionRoute">Descripción <b class="text-danger">*</b></label>
                                                    <textarea required cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" name="route[route_description]"><?= (isset($FORM_DATA["route"]["route_description"]) ? $FORM_DATA["route"]["route_description"] : "") ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="descriptionRoute">Recomendaciones generales <b class="text-danger">*</b></label>
                                                    <textarea required cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" name="route[route_recommendations]"><?= (isset($FORM_DATA["route"]["route_recommendations"]) ? $FORM_DATA["route"]["route_recommendations"] : "") ?></textarea>
                                                </div>
                                                <div class="mt-5">
                                                    <a href="<?= home_url() ?>/mis-rutas">
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