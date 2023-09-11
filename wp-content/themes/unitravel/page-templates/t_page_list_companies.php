<?php
/*
Template Name: List Companies
*/
?>
<?php 
include get_theme_file_path("page-templates/utilities.php");

$companies_all = cus_get_companies_all($_GET['city']);

//img banner companies 
$city_banner_img =  find_city($_GET['city']);

if (!empty($city_banner_img['img_city'])) {
    $css = '.page-id-1506 .vc_custom_1693159376634 {
        background-image: url(' . esc_url($city_banner_img['img_city']) . ') !important;
    }';
    echo '<style>' . $css . '</style>';
}

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
                               <?php
                               $contador = 0;
                               foreach($companies_all as $companies){
                               ?> 
                                <div class="col-md-4 col-sm-12">
                                    <div class="mt-5">
                                        <div class="wpb_wrapper" style="background-color: #f6f7e6; border-radius: 0px 0px 30px 30px;">
                                            <div class="wpb_single_image wpb_content_element vc_align_center">	
                                                <figure class="wpb_wrapper vc_figure">
                                                    <a href="filandia/" target="_blank" class="vc_single_image-wrapper   vc_box_border_grey">
                                                        <img style="height: 200px; width: auto;"
                                                        src="<?= get_company_logo($companies['id_cus_company'],$companies['cus_company_logo'])?>" 
                                                        class="vc_single_image-img attachment-large" alt="" decoding="async" loading="lazy" 
                                                        title="finca-hotel-el-palmar-23"
                                                        sizes="(max-width: 1024px) 100vw, 1024px"></a>
                                                </figure>
                                            </div>
                                            <div id="text-ventures" class=" p-3 sc_title sc_title_default m ">
                                                <h6 style="color:#333333;"
                                                class="sc_item_title sc_title_title sc_align_center sc_item_title_style_default sc_item_title_tag">
                                                <?= $companies['cus_company_name'] ?></h6>
                                                <div class="sc_item_descr sc_title_descr sc_align_center sc_item_title_style_default">
                                               <?= $companies['cus_company_short_description']?>
                                                </div>
                                            </div><!-- /.sc_title -->
                                        </div>
                                    </div>
                                </div>
                               
                                 <?php

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