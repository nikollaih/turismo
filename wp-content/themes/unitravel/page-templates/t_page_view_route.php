<?php
/*
Template Name: View Route
*/
?>
<?php 
include get_theme_file_path("page-templates/utilities.php");
include get_theme_file_path("includes/custom-clases/CUS_Route.php");

$routesModel = new CUS_Route();
$route = $routesModel->find(cus_decrypt($_GET['ruta']));

?>
<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="list_companies">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <img src="<?= get_route_logo($route["id_route"], $route["route_image"]) ?>" alt="" srcset="">
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <h1 class="sc_item_title sc_promo_title sc_align_left sc_item_title_style_default sc_item_title_tag"><?= $route["route_name"] ?></h1>
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