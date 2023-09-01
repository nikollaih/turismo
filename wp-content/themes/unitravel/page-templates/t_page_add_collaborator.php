<?php
/*
Template Name: Add Collaborator
*/

include get_theme_file_path("page-templates/utilities.php");
include get_theme_file_path("page-templates/current_user_company_data.php"); 
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
                                <div class="col-md-4 col-sm-12">
                                    <div class="mt-5">
                                        <div class="card card-route">
                                            <!-- Card image -->
                                            <div class="view view-cascade overlay">
                                            <img class="card-img-top card-img-radius" src="https://mdbootstrap.com/img/Photos/Others/forest-sm.webp" alt="Card image cap">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                            </div>               
                                            <div class="card-body text-muted text-center">
                                            <p class="card-title my-0 mb-0 text-uppercase"><small><strong>Avistamiento de aves</strong></small></p>
                                            <p class="card-text"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            </small>    
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                <div class="mt-5">
                                        <div class="card card-route">
                                            <!-- Card image -->
                                            <div class="view view-cascade overlay">
                                            <img class="card-img-top card-img-radius" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(1).webp" alt="Card image cap">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                            </div>               
                                            <div class="card-body text-muted text-center">
                                            <p class="card-title my-0 mb-0 text-uppercase"><small><strong>Avistamiento de aves</strong></small></p>
                                            <p class="card-text"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            </small>
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                <div class="mt-5">
                                        <div class="card card-route">
                                            <!-- Card image -->
                                            <div class="view view-cascade overlay">
                                            <img class="card-img-top card-img-radius" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(7).webp" alt="Card image cap">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                            </div>               
                                            <div class="card-body text-muted text-center">
                                            <p class="card-title my-0 mb-0 text-uppercase"><small><strong>Avistamiento de aves</strong></small></p>
                                            <p class="card-text"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            </small>
                                            </p>
                                            </div>
                                        </div>
                                    </div>
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