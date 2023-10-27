<?php
/*
Template Name: Add Activity
*/
?>
<?php 
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("includes/form-handlers/add_activity.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");
    require_once get_theme_file_path("includes/custom-clases/CUS_Activities_Route.php");
    $companiesModel = new CUS_Companies();
    $activitiesModel = new CUS_Activities_Route();
    // Obtiene la session falsh en caso de que se haya creado una nueva colaboradora
    $success_message = get_flash_message('success_message');

    // Obtenemos la información de la ruta en caso de querer modificarla
    $id_route = isset($_GET['route']) ? cus_decrypt(sanitize_text_field($_GET['route'])) : false;
    $id_activity = isset($_GET['activity']) ? cus_decrypt(sanitize_text_field($_GET['activity'])) : false;

    if($id_activity){
        $activity = $activitiesModel->find($id_activity);
        if(!isset($FORM_DATA["activity"]))
            $FORM_DATA["activity"] = $activity;
        
        $FORM_DATA["activity"]["id_activities_route"] = $id_activity;
    }
    $companies = cus_get_companies_all($company["cus_company_city"]);
    $next_order = count($activitiesModel->get_all_by_route($id_route)) + 1;
?>
<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center mt-0 h5-orange"><?= ($id_activity) ? "MODIFICAR" : "AGREGAR" ?> ACTIVIDAD</h3>
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
                                                <input type="hidden" name="activity[id_route]" value="<?= $id_route ?>">
                                                <input type="hidden" name="activity[id_activities_route]" value="<?= (isset($FORM_DATA["activity"]["id_activities_route"]) ? $FORM_DATA["activity"]["id_activities_route"] : null) ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Nombre <b class="text-danger">*</b></label>
                                                            <input required type="text" class="form-control" id="nameRoute" name="activity[activity_name]" value="<?= (isset($FORM_DATA["activity"]["activity_name"]) ? $FORM_DATA["activity"]["activity_name"] : "") ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Ubicación <b class="text-danger">*</b></label>
                                                            <select name="activity[activity_location]" id="activity-location-select">
                                                                <option value="null">- Seleccionar</option>
                                                                <?php
                                                                    if(is_array($companies)){
                                                                        foreach ($companies as $company) {
                                                                            $selected = ($company["id_cus_company"] == $FORM_DATA["activity"]["activity_location"]) ?  "selected" : "";
                                                                            echo '<option '.$selected.' value="'.$company["id_cus_company"].'">'.$company["cus_company_name"].'</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                                <option <?= (isset($FORM_DATA["activity"]) && $FORM_DATA["activity"]["activity_location"] == 0) ? "selected" : "" ?> value="other">Otro</option>
                                                            </select>
                                                            <input style="display:<?= (isset($FORM_DATA["activity"]) && $FORM_DATA["activity"]["activity_location"] == 0) ? "block" : "none" ?>;" placeholder="Escriba el nombre de la ubicación" type="text" class="form-control mt-1" id="activity-location-input" name="activity[activity_location_other]" value="<?= (isset($FORM_DATA["activity"]["activity_location_other"]) ? $FORM_DATA["activity"]["activity_location_other"] : "") ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Hora de inicio <b class="text-danger">*</b></label>
                                                            <input required type="time" class="form-control" id="nameRoute" name="activity[activity_start_time]" value="<?= (isset($FORM_DATA["activity"]["activity_start_time"]) ? $FORM_DATA["activity"]["activity_start_time"] : "") ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Hora de finalización <b class="text-danger">*</b></label>
                                                            <input required type="time" class="form-control" id="nameRoute" name="activity[activity_end_time]" value="<?= (isset($FORM_DATA["activity"]["activity_end_time"]) ? $FORM_DATA["activity"]["activity_end_time"] : "") ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="nameRoute">Orden de visita <b class="text-danger">*</b></label>
                                                            <input required type="number" class="form-control" id="nameRoute" name="activity[activity_order]" value="<?= (isset($FORM_DATA["activity"]["activity_order"]) ? $FORM_DATA["activity"]["activity_order"] : $next_order) ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label for="descriptionRoute">Descripción <b class="text-danger">*</b></label>
                                                    <textarea required cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" name="activity[activity_description]"><?= (isset($FORM_DATA["activity"]["activity_description"]) ? $FORM_DATA["activity"]["activity_description"] : "") ?></textarea>
                                                </div>
                                                <div class="mt-5">
                                                    <a href="<?= home_url() ?>/actividades-ruta?route=<?= cus_encrypt($id_route) ?>">
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