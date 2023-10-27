<?php
/*
Template Name: Activities Route
*/
    include get_theme_file_path("page-templates/shorcuts/_overlay_loading.php");
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");
    require_once get_theme_file_path("includes/custom-clases/CUS_Route.php");
    require_once get_theme_file_path("includes/custom-clases/CUS_Activities_Route.php");

    // Obtiene la session falsh en caso de que se haya creado una nueva colaboradora
    $success_message = get_flash_message('success_message');
    // Obtenemos la información de la ruta
    $id_route = isset($_GET['route']) ? cus_decrypt(sanitize_text_field($_GET['route'])) : false;

    if(!$id_route)  {
        wp_redirect(site_url().'/mis-rutas');
        exit;
    }

    $routesModel = new CUS_Route();
    $route = $routesModel->find($id_route);
    $activitiesModel = new CUS_Activities_Route();
    $activities = $activitiesModel->get_all_by_route($id_route); 
?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center mt-0 "><?= $route["route_name"] ?></h3>
                            <h5 class="text-center mt-0 h5-orange-list-routes">Actividades</h5>
                            <dic class="row">
                                <div class="col-md-12">
                                    <?php
                                        if (!empty($success_message)) {
                                            echo '<div class="alert alert-success" role="alert">' . esc_html($success_message) . '</div>';
                                        }
                                    ?>
                                </div>
                            </dic>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= home_url() ?>/mis-rutas">
                                        <button class="btn btn-secondary mb-2"><i class="fa-solid fa-arrow-left mr-2"></i>Regresar</button>
                                    </a>
                                    
                                </div>
                                <?php
                                    if(check_is_admin($current_user, $route["company_id"])){
                                        ?>
                                        <div class="col text-right">
                                            <a href="<?= home_url() ?>/agregar-actividad?route=<?= cus_encrypt($id_route) ?>">
                                                <button class="btn btn-primary mb-2"><i class="fa-solid fa-plus mr-2"></i>Agregar Actividad</button>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Lugar</th>
                                            <th scope="col">Inicio</th>
                                            <th scope="col">Fin</th>
                                            <?php
                                                if(check_is_admin($current_user, $route["company_id"])){?>
                                                        <th scope="col"></th>
                                                <?php }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(count($activities) > 0){
                                                for ($i=1; $i < count($activities) + 1; $i++) { 
                                                    $activity = $activities[$i-1];
                                                    $edit_route_url = add_query_arg(
                                                        array(
                                                            'activity' => cus_encrypt($activity["id_activities_route"]), 
                                                            'route' => cus_encrypt($activity["id_route"])
                                                        ), home_url('/agregar-actividad'));
                                                    $location = ($activity["activity_location"] == 0) ? $activity["activity_location_other"] : $activity["cus_company_name"];
                                                    ?>
                                                        <tr id="<?= $activity["id_activities_route"] ?>">
                                                            <th scope="row"><?= $activity["activity_order"] ?></th>
                                                            <td><?= $activity["activity_name"] ?></td>
                                                            <td><?= $location ?></td>
                                                            <td><?= date("h:i a", strtotime($activity["activity_start_time"])) ?></td>
                                                            <td><?= date("h:i a", strtotime($activity["activity_end_time"])) ?></td>
                                                                <?php
                                                                    if(check_is_admin($current_user, $route["company_id"])){
                                                                        ?>
                                                                        <td style="width:150px;">
                                                                            <a class="" href="<?= $edit_route_url ?>">
                                                                                <button class="btn btn-info">Editar</button>    
                                                                            </a>
                                                                            <button activity_id="<?= $activity["id_activities_route"] ?>" class="btn btn-danger activity-delete">Eliminar</button>
                                                                        </td>
                                                                        <?php
                                                                    }
                                                                ?>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </section>
        </div>
    </div>
    <?php get_footer() ?>
</div>