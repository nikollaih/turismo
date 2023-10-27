<?php
/*
Template Name: Media Routes
*/
    include get_theme_file_path("page-templates/shorcuts/_overlay_loading.php");
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");
    require_once get_theme_file_path("includes/custom-clases/CUS_Route.php");
    require_once get_theme_file_path("includes/custom-clases/CUS_MediaRoutes.php");

    // Obtiene la session falsh en caso de que se haya creado una nueva colaboradora
    $success_message = get_flash_message('success_message');
    // Obtenemos la información de la ruta
    $id_route = isset($_GET['route']) ? cus_decrypt(sanitize_text_field($_GET['route'])) : false;

    if(!$id_route)  {
        wp_redirect(site_url().'/mis-rutas');
        exit;
    }

    $activitysModel = new CUS_Route();
    $activity = $activitysModel->find($id_route);
    $mediaModel = new CUS_MediaRoutes();
    $medios = $mediaModel->get_by_param("id_route", $id_route); 
?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center mt-0 "><?= $activity["route_name"] ?></h3>
                            <h5 class="text-center mt-0 h5-orange-list-routes">FOTOS Y VIDEOS</h5>
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
                                    if(check_is_admin($current_user, $company["id_cus_company"])){
                                        ?>
                                        <div class="col text-right">
                                            <a href="<?= home_url() ?>/agregar-foto-video?route=<?= cus_encrypt($id_route) ?>">
                                                <button class="btn btn-primary mb-2"><i class="fa-solid fa-plus mr-2"></i>Agregar foto o video</button>
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
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Foto o video</th>
                                            <th scope="col">Tipo</th>
                                            <?php
                                                if(check_is_admin($current_user, $company["id_cus_company"])){?>
                                                        <th scope="col"></th>
                                                <?php }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(count($medios) > 0){
                                                for ($i=0; $i < count($medios); $i++) { 
                                                    $media = $medios[$i];
                                                    $edit_route_url = add_query_arg(
                                                        array(
                                                            'media' => cus_encrypt($media["id_media_route"]), 
                                                            'route' => cus_encrypt($media["id_route"])
                                                        ), home_url('/agregar-foto-video'));
                                                    ?>
                                                        <tr id="<?= $media["id_media_route"] ?>">
                                                            <td><?= $media["name"] ?></td>
                                                            <td><?= $media["description"] ?></td>
                                                            <td>
                                                                <?php
                                                                    if($media["type"] == "video"){
                                                                        echo $media["url_video"];
                                                                    }
                                                                    else { ?>
                                                                        <img src="<?= get_media_route($media["id_route"], $media["url"]) ?>" alt="" srcset="" style="height:100px;">
                                                                    <?php }
                                                                ?>
                                                            </td>
                                                            <td><?= $media["type"] ?></td>
                                                                <?php
                                                                    if(check_is_admin($current_user, $company["id_cus_company"])){
                                                                        ?>
                                                                        <td style="width:150px;">
                                                                            <a class="" href="<?= $edit_route_url ?>">
                                                                                <button class="btn btn-info">Editar</button>    
                                                                            </a>
                                                                            <button media_id="<?= $media["id_media_route"] ?>" class="btn btn-danger media-delete">Eliminar</button>
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