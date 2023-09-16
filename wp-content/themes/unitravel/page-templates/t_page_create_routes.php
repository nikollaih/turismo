<?php
/*
Template Name: Create Routes
*/
?>
<?php 
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("includes/form-handlers/add_route.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");
?>
<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center mt-0 h5-orange">CREAR EXPERIENCIA TURISTICA</h3>
                            <div class="alert alert-warning" role="alert">
                                Los campos marcados con <b class="text-danger">*</b> son obligatorios.
                            </div>
                            <?php if(isset($RESPONSE_CREATE_ROUTE["status"]) && $RESPONSE_CREATE_ROUTE["status"] == false){
                                echo '<div class="alert alert-danger" role="alert">'.$RESPONSE_CREATE_ROUTE["message"].'</div>';
                            }?>
                            <!-- <div class="card">
                                <div class="p-5"> -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="card card-registration card-registration-2 p-5" style="border-radius: 15px;">
                                            <div class="card-body p-0">
                                                <input type="hidden" name="route[company_id]" value="<?= $company["id_cus_company"] ?>">
                                                <div class="form-group text-center">
                                                    <label for=""><i class="fa-regular fa-pen-to-square"></i> Seleccionar imagen de experiencia</label><br>
                                                    <label for="file-image" style="cursor: pointer;">
                                                        <img id="file-preview" src="" alt="Vista previa de la imagen" class="img-thumbnail custom-image-profile">
                                                    </label>
                                                    <input name="route_image" type="file" class="form-control-file" id="file-image" accept="image/*" style="display: none;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nameRoute">Nombre <b class="text-danger">*</b></label>
                                                    <input required type="text" class="form-control" id="nameRoute" name="route[route_name]" value="<?= (isset($FORM_DATA["route"]["route_name"]) ? $FORM_DATA["route"]["route_name"] : "") ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="descriptionRoute">Descripción <b class="text-danger">*</b></label>
                                                    <textarea required cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" name="route[route_description]"><?= (isset($FORM_DATA["route"]["route_description"]) ? $FORM_DATA["route"]["route_description"] : "") ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nameRoute">Hora de inicio <b class="text-danger">*</b></label>
                                                    <input required type="time" class="form-control" id="nameRoute" name="route[route_start_time]" value="<?= (isset($FORM_DATA["route"]["route_start_time"]) ? $FORM_DATA["route"]["route_start_time"] : "") ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nameRoute">Hora de finalización <b class="text-danger">*</b></label>
                                                    <input required type="time" class="form-control" id="nameRoute" name="route[route_end_time]" value="<?= (isset($FORM_DATA["route"]["route_end_time"]) ? $FORM_DATA["route"]["route_end_time"] : "") ?>">
                                                </div>
                                                <button type="submit" class="btn btn-primary my-3">Guardar</button>
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