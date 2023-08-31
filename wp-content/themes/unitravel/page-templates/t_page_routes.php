<?php
/*
Template Name: Routes
*/
?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-8 col-sm-12">
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
                        <div class="col-md-4 col-sm-12">
                                <div class="text-center position-relative pb-5 column-perfil-routes" >
                                    <img src="https://img.freepik.com/vector-premium/diseno-ilustracion-vector-personaje-avatar-mujer-joven_24877-18536.jpg" alt="avatar" class="img-perfil-routes rounded-circle img-fluid" style="width: 200px;">
                                    
                                    <div class="justify-content-center mt-5 mb-5">
                                        <h5 class="my-0 mb-0 h5-green">FINCA LA <br> ESTRELLA</h5>
                                        <p class="text-muted">Buenavista</p>
                                        <h6 class="my-0 mb-0 h5-green">Silvia Torres</h6>
                                        <p class="text-muted">Guía</p>
                                    </div>
        
                                    <div class="justify-content-center">
                                        <h6 class="my-0 mb-0 h5-green">Latitud</h6>
                                        <p class="text-muted">150</p>
                                    </div>
                                    <div class="justify-content-center">
                                        <h6 class="my-0 mb-0 h5-green">Longitud</h6>
                                        <p class="text-muted">130</p>
                                    </div>
                                    <div class="justify-content-center">
                                        <h6 class="my-0 mb-0 h5-green">Contacto</h6>
                                        <p class="text-muted">+57 3112223344</p>
                                    </div>
                                    <div class="justify-content-center mt-3 pt-3">
                                         <a href="<?php echo get_template_directory_uri() . '/create-routes'; ?>" class="btn btn-routes-primary ms-1">Volver a crear rutas</a>
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