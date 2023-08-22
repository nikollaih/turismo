<?php
/*
Template Name: Routes
*/
?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>
<style>

.card-route{
    border-radius: 30px;
    background-color: #f6f7e6;
}
.card-img-radius{
    border-radius: 30px 30px 0px 0px;
}
.img-perfil-routes {
	margin-top: -95px;
}
.column-perfil-routes{
    margin-top: -150px;
    background-color: #f2f2f2;
    z-index: 10000;
}
.h5-green{
    color: #a8b504 !important;
}
.h5-orange{
    color: #eb5d11 !important;
}
@media(max-width: 767px){
    .img-perfil-routes {
	margin-top: -90;    
}   
.column-perfil-routes{
    margin-top: 0;
    margin-bottom: 50px;
}
.content-profile-one{
    flex-direction: column-reverse;

}
}

</style>
<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
<<<<<<< Updated upstream
            <h6 class="text-center sc_item_subtitle sc_services_subtitle sc_align_left sc_item_title_style_default">Listado</h6>
            <h3 class="mb-5 text-center sc_item_title sc_services_title sc_align_left sc_item_title_style_default sc_item_title_tag">RUTAS</h3>
=======
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-8 col-sm-12">
                            <h5 class="text-center mt-0 h5-orange">LISTA DE RUTAS</h5>
                            <div class="justify-content-center my-3">
                                <div class="text-center">
                                    <input type="search" name="listRoutes" id="listRoutes" class="text-center" placeholder="Buscar ruta">
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
                                        <h5 class="my-0 mb-0 h5-green">Silvia Torres</h5>
                                        <p class="text-muted">Guía</p>
                                    </div>
        
                                    <div class="justify-content-center">
                                        <h5 class="my-0 mb-0 h5-green">Latitud</h5>
                                        <p class="text-muted">150</p>
                                    </div>
                                    <div class="justify-content-center">
                                        <h5 class="my-0 mb-0 h5-green">Longitud</h5>
                                        <p class="text-muted">130</p>
                                    </div>
                                    <div class="justify-content-center">
                                        <h5 class="my-0 mb-0 h5-green">Contacto</h5>
                                        <p class="text-muted">+57 3112223344</p>
                                    </div>
                                    <div class="justify-content-center mt-3 pt-3">
                                        <button type="button" class="btn btn-outline-primary ms-1">Volver a crear rutas</button>
                                    </div>
                                </div>
                        </div>
                    </div>  
                </div>
            </section>
>>>>>>> Stashed changes
        </div>
    </div>
    <?php get_footer() ?>
</div>