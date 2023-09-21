<?php
/*
Template Name: My Routes
*/
    include get_theme_file_path("page-templates/shorcuts/_overlay_loading.php");
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");
    require_once get_theme_file_path("includes/custom-clases/CUS_Route.php");

     // Obtiene la session falsh en caso de que se haya creado una nueva colaboradora
     $success_message = get_flash_message('success_message');

    // Obtiene la lista de rutas asociadas a la finca
    $routesModel = new CUS_Route();
    $company_routes = $routesModel->get_all_by_company($company["id_cus_company"]);
?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center mt-0 "><?= $company["cus_company_name"] ?></h3>
                            <h5 class="text-center mt-0 h5-orange-list-routes">Experiencias turisticas</h5>
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
                                    <a href="<?= home_url() ?>/mi-cuenta">
                                        <button class="btn btn-secondary mb-2"><i class="fa-solid fa-arrow-left mr-2"></i>Regresar</button>
                                    </a>
                                    
                                </div>
                                <?php
                                    if(check_is_admin($current_user)){
                                        ?>
                                        <div class="col text-right">
                                            <a href="<?= home_url() ?>/crear-ruta">
                                                <button class="btn btn-primary mb-2"><i class="fa-solid fa-plus mr-2"></i>Agregar Experiencia</button>
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
                                            <th scope="col"></th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Inicio</th>
                                            <th scope="col">Fin</th>
                                            <?php
                                                if(check_is_admin($current_user)){?>
                                                        <th scope="col"></th>
                                                <?php }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(count($company_routes) > 0){
                                                for ($i=1; $i < count($company_routes) + 1; $i++) { 
                                                    $route = $company_routes[$i-1];
                                                    $edit_route_url = add_query_arg(array('route' => cus_encrypt($route["id_route"])), home_url('/crear-ruta'));
                                                    $activities_url = add_query_arg(array('route' => cus_encrypt($route["id_route"])), home_url('/actividades-ruta'));
                                                    ?>
                                                        <tr id="<?= $route["id_route"] ?>">
                                                            <th scope="row"><?= $i ?></th>
                                                            <td style="width:140px;"><img src="<?= get_route_logo($route["id_route"], $route["route_image"]) ?>" alt="" srcset="" style="width:130px;height:80px;border-radius:10px;"></td>
                                                            <td><?= $route["route_name"] ?></td>
                                                            <td><?= date("h:i a", strtotime($route["route_start_time"])) ?></td>
                                                            <td><?= date("h:i a", strtotime($route["route_end_time"])) ?></td>
                                                                <?php
                                                                    if(check_is_admin($current_user)){
                                                                        ?>
                                                                        <td style="width:240px;">
                                                                            <a class="" href="<?= $edit_route_url ?>">
                                                                                <button class="btn btn-info">Editar</button>    
                                                                            </a>
                                                                            <button user_id="<?= $route["id_route"] ?>" class="btn btn-danger route-delete">Eliminar</button>
                                                                            <a class="" href="<?= $activities_url ?>">
                                                                                <button class="btn btn-primary">Ver actividades</button>    
                                                                            </a>
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