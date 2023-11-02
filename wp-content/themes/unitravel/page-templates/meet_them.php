<?php
/*
Template Name: Meet Them
*/
    include get_theme_file_path("page-templates/shorcuts/_overlay_loading.php");
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");
    require_once get_theme_file_path("includes/custom-clases/CUS_UserMeta.php");

    $UserMeta = new CUS_UserMeta();
    $historias = $UserMeta->get_users_historias();
?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="create-routes">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h5 class="text-center mt-0 mb-5 h5-orange-list-routes">Conoce sus historias</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            if(is_array($historias) && count($historias) > 0) {
                                foreach ($historias as $historia) { ?>
                                    <div class="col-md-4 col-sm-12 mt-4">
                                        <iframe width="560" height="315" src="<?= $historia["meta_value"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        <h5 class="mt-4 text-center"><?= $historia["display_name"] ?></h5>
                                    </div>
                                <?php }
                            }
                            else {
                                echo "<p>No se han encontrado registros.</p>";
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php get_footer() ?>
</div>