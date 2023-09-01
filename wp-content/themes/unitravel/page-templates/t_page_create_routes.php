<?php
/*
Template Name: Create Routes
*/
?>
<?php 
include get_theme_file_path("page-templates/utilities.php");
require_once get_theme_file_path("includes/helpers/index.php");
include get_theme_file_path("includes/form-handlers/route.php");

check_user_company_login();

$current_user = cus_get_current_user();
$company = cus_get_company($current_user->ID);

$profile_image = get_profile_image($current_user->ID);
$company_logo = get_company_logo($company["id_cus_company"], $company["cus_company_logo"]);
$city = find_city($company["cus_company_city"]);
$cities = get_all_cities();
?>
<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-8 col-sm-12">
                            <h3 class="text-center mt-0 h5-orange">CREAR RUTAS</h3>
                            <!-- <div class="card">
                                <div class="p-5"> -->
                                <h5 class="mt-3">INFORMACIÓN DE LA RUTA</h5>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nameRoute">Nombre</label>
                                            <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                        </div>
                                        <div class="form-group">
                                            <label for="descriptionRoute">Descripción</label>
                                            <textarea class="form-control text-area-route" id="descriptionRoute" name="route[description]"></textarea>
                                        </div>
                                        <h5 class="mt-5">ASIGNAR ACTIVIDADES DE RUTA</h5>
                                        <div class="form-group">
                                            <label for="nameActivityRoute">Nombre de actividad</label>
                                            <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                        </div>
                                        <div class="form-group">
                                            <label for="descriptionRoute">Descripción</label>
                                            <textarea class="form-control text-area-route" id="descriptionRoute" name="route[activityDescription]"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="longitudRoute">Longitud</label>
                                            <input type="text" class="form-control" id="longitudRoute" name="route[longitud]">
                                        </div>
                                        <div class="form-group">
                                            <label for="latitudRoute">Latitud</label>
                                            <input type="text" class="form-control" id="latitudRoute" name="route[latitud]">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Crear actividad</button>
                                    </form>
                                <!-- </div>
                            </div> -->
                        </div>
                        <?php include(get_theme_file_path("templates/left-profile.php")); ?>
                    </div>  
                </div>
            </section>
        </div>
    </div>
    <?php get_footer() ?>
</div>