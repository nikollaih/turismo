<?php
/*
Template Name: Routes
*/

include get_theme_file_path("page-templates/utilities.php");
include get_theme_file_path("includes/custom-clases/CUS_Route.php");

$routesModel = new CUS_Route();
$routes = $routesModel->get_all();

?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <h5 class="text-center mt-0 h5-orange-list-routes">LISTA DE RUTAS</h5>
                            <div class="justify-content-center my-3">
                                <div class="text-center">
                                    <input type="search" name="listRoutes" id="listRoutes" class="text-center input-search" placeholder="Buscar ruta">
                                </div>  
                            </div>
                            <div class="row">
                                
                                <?php
                                    if(is_array($routes)){
                                        foreach ($routes as $route) {
                                ?>
                                <div class="col-md-4 col-sm-12">
                                    <div class="room-plugin column-1-2">
                                        <div id="post-518" class="post-518 room type-room status-publish has-post-thumbnail hentry">
                                            <div class="room-plugin room-single">
                                                <div class="room-plugin room-featured">
                                                    <img src="<?= get_route_logo($route["id_route"], $route["route_image"]) ?>" class="attachment-room-small size-room-small wp-post-image" alt="" decoding="async"  sizes="(max-width: 740px) 100vw, 740px"> 
                                                </div>
                                                <div class="room-plugin room-plugin-content text-center">
                                                    <div class="room-title">
                                                        <a class="room-plugin room-title-link" href="https://unitravel.ancorathemes.com/room/entire-homeapt-in-bogota/"><?= $route["route_name"] ?></a>
                                                    </div>
                                                    <div class="room-plugin room-info">
                                                        <div class="room-plugin room-info-item">
                                                            <div class="room-plugin room-people">
                                                                <i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;<?= date("H:i a", strtotime($route["route_start_time"])) ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?= date("H:i a", strtotime($route["route_end_time"])) ?>
                                                            </div>
                                                            <div class="room-plugin room-people">
                                                                <?php
                                                                    if(trim($route["cus_company_location"]) != "") { ?>
                                                                        <a target="_blank" href="<?= $route["cus_company_location"] ?>"><i class="fa-solid fa-map-location-dot"></i>&nbsp;&nbsp;&nbsp;<?= $route["city_name"] ?></a>
                                                                    <?php }
                                                                    else { ?>
                                                                        <span style="color:#5d6673;"><i class="fa-solid fa-map-location-dot"></i>&nbsp;&nbsp;&nbsp;<?= $route["city_name"] ?></span>
                                                                    <?php }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="room-plugin room-content">
                                                        <p><?= $route["route_short_description"] ?></p>
                                                        <div class="room-plugin room-price">
                                                            <?php
                                                                if($route["route_discount"] > 0) {
                                                                    ?>
                                                                    <span class="room-plugin room-present-currency">$</span>
                                                                    <span class="room-plugin room-old-price"><?= number_format($route["route_price"], 0) ?></span><br>
                                                                    <?php
                                                                }

                                                                if($route["route_price"] > 0) { ?>
                                                                    <span class="room-plugin room-present-currency">$</span>
                                                                    <span class="room-plugin room-present-price"><?= number_format($route["route_price"] - $route["route_discount"], 0) ?></span>
                                                                <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>  
                </div>
            </section>
        </div>
    </div>
    <?php get_footer() ?>
</div>