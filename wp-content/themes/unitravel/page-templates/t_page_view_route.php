<?php
/*
Template Name: View Route
*/
?>
<?php 
include get_theme_file_path("page-templates/utilities.php");
include get_theme_file_path("includes/custom-clases/CUS_Route.php");
include get_theme_file_path("includes/custom-clases/CUS_Activities_Route.php");
require_once get_theme_file_path("includes/custom-clases/CUS_MediaRoutes.php");

$routesModel = new CUS_Route();
$activitysModel = new CUS_Activities_Route();

$route = $routesModel->find(cus_decrypt($_GET['ruta']));
$activitys = $activitysModel->get_all_by_route($route['id_route']);
$mediaModel = new CUS_MediaRoutes();
$mediosFoto = $mediaModel->get_by_type($route['id_route'], "foto"); 
$mediosVideo = $mediaModel->get_by_type($route['id_route'], "video"); 
?>
<style>
    #modal.modal {
        position: fixed !important;
        z-index: 99999;
    }

    .modal-backdrop.show {
        z-index: 9999;
    }
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
                                        <h3 class="title-sm sc_item_title sc_promo_title sc_align_left sc_item_title_style_default sc_item_title_tag"><?= $route["route_name"] ?></h3>
                                            <div class="room-plugin room-info">
                                                <div class="room-plugin room-info-item">
                                                    <div class="room-plugin" style="font-size: 24px;color:#949393;">
                                                        <i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;<?= date("h:i a", strtotime($route["route_start_time"])) ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?= date("h:i a", strtotime($route["route_end_time"])) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="room-plugin room-content-route">
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
                        <?php if(trim($route["route_itinerario"]) != ""){ ?>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <a target="_blank" href="<?= home_url() ?>/wp-content/uploads/routes/<?= $route["id_route"] ?>/itinerario/<?= $route["route_itinerario"] ?>">
                                        <button class="btn-info mb-3 mt-3 d-flex align-items-center">
                                            <i class="fa-solid fa-list-ul"></i>&nbsp; DESCARGAR ITINERARIO
                                        </button>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-xs-12">
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
                        </div>
                        <div class="row mt-3">
                            <?php if(!empty($activitys )) :?> 
                                    <?php $activityCount = 1;?> 
                                        <?php foreach($activitys as $activity) :?>
                                            <div class="col-md-12">
                                                <div class="container container-activity">
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
                                                            <div>
                                                                <p class="mb-0">Lugar</p>
                                                                <p class="route_short_description"><?= !empty($activity['activity_location_other']) ? $activity['activity_location_other'] : $activity['cus_company_name'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 d-flex justify-content-center align-items-center text-center">
                                                            <span style="color: #eb5d11; font-size: initial; font-weight: 600;">
                                                                <i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;<?= date("h:i a", strtotime($activity["activity_start_time"])) ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?= date("h:i a", strtotime($activity["activity_end_time"])) ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $activityCount++; ?> 
                                    <?php endforeach; ?>
                                <?php endif;?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mt-5 mb-4">
                                    <h5 class="title-route sc_item_title sc_title_title sc_item_title_style_default">Galeria</h5>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <?php
                                if(count($mediosVideo) > 0){
                                    foreach ($mediosVideo as $medio) { ?>
                                        <div class="col-md-4 col-sm-4 col-sx-12 col-lg-4 mt-3">
                                            <iframe width="560" height="315" src="<?= $medio["url_video"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </div>
                                    <?php }
                                }
                            ?>
                        </div>

                        <div class="row">
                            <?php
                                if(count($mediosFoto) > 0){
                                    foreach ($mediosFoto as $medio) { ?>
                                        <div class="col-md-3 col-sm-4 col-sx-12 col-lg-3 mt-3">
                                            <a href="#" class="thumbnail" data-toggle="modal" data-target="#modal">
                                                <img src="<?= get_media_route($medio["id_route"], $medio["url"]) ?>" class="img-fluid" alt="Imagen 1">
                                            </a>
                                        </div>
                                    <?php }
                                }
                            ?>
                        </div>
                </div>
            </section>
        </div>
    </div>
    <a href='https://wa.me/57<?=$route['route_whatsapp'] ?>'target='_blank'>                                                 
    <div id='float-whatsapp-route'>
    <span style="font-size:20px;">Reservar</span>  &nbsp;&nbsp;&nbsp;
         </span> <i style="color: #ffffff; font-size: 38px;" class="fa fa-whatsapp" aria-hidden="true"></i>
        </div>
    </a>
    <?php get_footer() ?>
</div>
<!-- Modal para ampliar la imagen -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="" id="enlargedImg" class="img-fluid mx-auto d-block" alt="Ampliación de Imagen">
      </div>
    </div>
  </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
  jQuery(document).ready(function(){
    // Cuando se hace clic en una miniatura, muestra la imagen en el modal
    jQuery('.thumbnail').click(function(){
      var imgSrc = jQuery(this).find('img').attr('src');
      console.log(imgSrc);
      jQuery('#enlargedImg').attr('src', imgSrc);
    });
  });
</script>