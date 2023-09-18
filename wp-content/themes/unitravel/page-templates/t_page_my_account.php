<?php
/*
Template Name: My account enterprising
*/

    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("page-templates/current_user_company_data.php"); 
?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="my-account">
                    <div class="container" style="position: relative;">
                        <div class="row content-profile-one">
                            <div class="col-md-8 col-sm-12">
                                <h3 class="text-center mt-0 h5-orange">MI CUENTA</h3>
                                <div>
                                    <h5 class="mt-3">INFORMACIÓN PERSONAL</h5>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="descriptionRoute">Documento</label>
                                            <input disabled type="text" class="form-control" id="nameRoute" value="<?= isset($current_user->document_number) ? $current_user->document_number : "" ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameRoute">Nombre</label>
                                            <input disabled type="text" class="form-control" id="nameRoute" value="<?= isset($current_user->display_name) ? $current_user->display_name : "" ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="descriptionRoute">Email</label>
                                            <input disabled type="text" class="form-control" id="nameRoute" value="<?= isset($current_user->user_email) ? $current_user->user_email : "" ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <h5 class="mt-5">INFORMACIÓN DEL EMPRENDIMIENTO</h5>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameActivityRoute">Nombre</label>
                                            <input disabled type="text" class="form-control" id="nameActivityRoute" value="<?= isset($company["cus_company_name"]) ? $company["cus_company_name"] : "" ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameActivityRoute">Sitio web</label>
                                            <input disabled type="text" class="form-control" id="nameActivityRoute" value="<?= isset($company["cus_company_web"]) ? $company["cus_company_web"] : "" ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameActivityRoute">Número Whatsapp</label>
                                            <input disabled type="text" class="form-control" id="nameActivityRoute" value="<?= isset($company["cus_company_whatsapp"]) ? $company["cus_company_whatsapp"] : "" ?>">
                                        </div>
                                        <div class="col-md-6 col-sm-6 form-group">
                                        <label for="nameActivityRoute">Municipio</label>
                                            <select disabled name="company[city]" id="">
                                                <option value="null">- Seleccionar municipio</option>
                                                <?php
                                                    if(count($cities) > 0){
                                                        for ($i=0; $i < count($cities); $i++) { 
                                                ?>
                                                    <option <?= ($company["cus_company_city"] == $cities[$i]["city_id"]) ? "selected" : "" ?>  value="<?= $cities[$i]["city_id"] ?>"><?= $cities[$i]["city_name"] ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="nameActivityRoute">Dirección</label>
                                            <input disabled type="text" class="form-control" id="nameActivityRoute" value="<?= isset($company["cus_company_address"]) ? $company["cus_company_address"] : "" ?>">
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-6">
                                            <label for="nameActivityRoute">Latitud</label>
                                            <input disabled type="text" class="form-control" id="nameActivityRoute" value="<?= isset($company["cus_company_latitude"]) ? $company["cus_company_latitude"] : "" ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameActivityRoute">Longitud</label>
                                            <input disabled type="text" class="form-control" id="nameActivityRoute" value="<?= isset($company["cus_company_longitude"]) ? $company["cus_company_longitude"] : "" ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="nameActivityRoute">Descripción corta</label>
                                            <input disabled type="text" class="form-control" id="nameActivityRoute" value="<?= isset($company["cus_company_short_description"]) ? $company["cus_company_short_description"] : "" ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="nameActivityRoute">Descripción</label>
                                            <textarea disabled class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" id="nameActivityRoute"><?= isset($company["cus_company_description"]) ? $company["cus_company_description"] : "" ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php include(get_theme_file_path("templates/left-profile.php")); ?>
                        </div>  
                    </div>
            </section>
        </div>
    </div>
    <?php get_footer() ?>
</div>