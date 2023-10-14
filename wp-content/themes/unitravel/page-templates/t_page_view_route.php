<?php
/*
Template Name: View Route
*/
?>
<?php 
include get_theme_file_path("page-templates/utilities.php");
include get_theme_file_path("includes/custom-clases/CUS_Route.php");
include get_theme_file_path("includes/custom-clases/CUS_Activities_Route.php");

$routesModel = new CUS_Route();
$activitysModel = new CUS_Activities_Route();

$route = $routesModel->find(cus_decrypt($_GET['ruta']));
$activitys = $activitysModel->get_all_by_route($route['id_route']);
?>
<style>

</style>
<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="list_companies">
                <div class="container" style="position: relative;">
                        <div class="row content-profile-one mb-5">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="row">
                                    <div class="col-md-6  col-xs-12">
                                        <img src="<?= get_route_logo($route["id_route"], $route["route_image"]) ?>" alt="" srcset="" class="img-fluid img-same-height">
                                    </div>
                                    <div class="col-md-6 col-xs-12  ">
                                        <h2 class="title-sm sc_item_title sc_promo_title sc_align_left sc_item_title_style_default sc_item_title_tag"><?= $route["route_name"] ?></h2>
                                            <div class="room-plugin room-info">
                                                <div class="room-plugin room-info-item">
                                                    <div class="room-plugin" style="font-size: 24px;">
                                                        <i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;<?= date("h:i a", strtotime($route["route_start_time"])) ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?= date("h:i a", strtotime($route["route_end_time"])) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="room-plugin room-content-route">
                                                <p class="route_short_description"><?= $route["route_short_description"] ?></p>
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
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-xs-12">
                                <div class="mt-5">
                                    <h5 class="title-route sc_item_title sc_title_title sc_item_title_style_default">Descripcción</h5>
                                    <div class="route_short_description">
                                        <p class="text-start"><?= $route['route_description']?></p>
                                    </div>
                                </div> 
                                <div class="mt-5">
                                    <h5 class="title-route sc_item_title sc_title_title sc_item_title_style_default">Recomendaciones</h5>
                                    <div class="route_short_description">
                                        <p class="text-start"><?= $route['route_recommendations']?></p>
                                    </div>
                                </div> 
                                <div class="mt-5 mb-4">
                                    <h5 class="title-route sc_item_title sc_title_title sc_item_title_style_default">Actividades</h5>
                                </div> 
                            </div>
                            <div class="col-md-4 col-xs-12">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="row">
                                    <?php if(!empty($activitys )) :?> 
                                            <?php $activityCount = 1;?> 
                                                <?php foreach($activitys as $activity) :?>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-2 d-flex text-center justify-content-center align-items-center">
                                                            <div class="outer-circle">
                                                                <div class="inner-circle">
                                                                    <span class="number"><?= $activityCount ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 d-flex justify-content-center align-items-center text-center ">
                                                            <span class="room-title"><?= $activity['activity_name'] ?></span>
                                                        </div>
                                                        <div class=" col-md-3 d-flex justify-content-center align-items-center text-center">
                                                            <p class="route_short_description"><?= !empty($activity['activity_location_other']) ? $activity['activity_location_other'] : $activity['cus_company_name'] ?></p>
                                                        </div>
                                                        <div class="col-md-3 d-flex justify-content-center align-items-center text-center">
                                                            <span style="color: #eb5d11; font-size: initial; font-weight: 600;">
                                                                <i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;<?= date("h:i a", strtotime($activity["activity_start_time"])) ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?= date("h:i a", strtotime($activity["activity_end_time"])) ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4 mb-4">
                                                         <hr style="border: 1px solid #edbb99; width:100%">
                                                    </div>
                                                </div>
                                                <?php $activityCount++; ?> 
                                            <?php endforeach; ?>
                                        <?php endif;?>
                                </div>               
                            </div>
                        </div>
                </div>
            </section>
        </div>
    </div>
    <a href='https://wa.me/57<?=$activity['cus_company_whatsapp'] ?>'target='_blank'>                                                 
    <div id='float-whatsapp-route'>
    <span style="font-size:20px;">Reservar</span>  &nbsp;&nbsp;&nbsp;
         </span> <i style="color: #ffffff; font-size: 38px;" class="fa fa-whatsapp" aria-hidden="true"></i>
        </div>
    </a>
    <?php get_footer() ?>
</div>