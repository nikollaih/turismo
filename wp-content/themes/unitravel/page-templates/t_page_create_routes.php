<?php
/*
Template Name: Create Routes
*/
?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>
<?php include get_theme_file_path("includes/form-handlers/route.php"); ?>
<style>

.img-perfil-routes {
	margin-top: -95px;
}
.column-perfil-routes{
    margin-top: -150px;
    background-color: #f2f2f2;
    z-index: 10000;
}
.text-area-route{
    border-radius: 30px;
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
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-8 col-sm-12">
                            <h5 class="text-center mt-0 h5-orange">CREAR RUTAS</h5>
                            <div>
                            <h5 class="mt-3">INFORMACIÓN DE LA RUTA</h5>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nameRoute">Nombre</label>
                                    <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                </div>
                                <div class="form-group">
                                    <label for="descriptionRoute">Descripción</label>
                                    <textarea class="form-control text-area-route" id="descriptionRoute" name="route[description]"></textarea>
                                </div>
                                <h5 class="mt-5">ASIGNAR ACTIVIDADES DE RUTA</h5>
                                <div class="form-group">
                                    <label for="nameActivityRoute">Nombre de actividad</label>
                                    <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                </div>
                                <div class="form-group">
                                    <label for="descriptionRoute">Descripción</label>
                                    <textarea class="form-control text-area-route" id="descriptionRoute" name="route[activityDescription]"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="longitudRoute">Longitud</label>
                                    <input type="text" class="form-control" id="longitudRoute" name="route[longitud]">
                                </div>
                                <div class="form-group">
                                    <label for="latitudRoute">Latitud</label>
                                    <input type="text" class="form-control" id="latitudRoute" name="route[latitud]">
                                </div>
                                <button type="submit" class="btn btn-primary">Crear actividad</button>
                            </form>
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
        
                                    <div class="justify-content-center mt-5 pt-5">
                                        <h5 class="my-0 mb-0 h5-green">MIS RUTAS</h5>
        
                                        <table class="table  table-borderless">
                                            <tbody  style="background-color: #f2f2f2;">
                                                <tr>
                                                    <p class="text-center mt-3"><i class="fa-solid fa-circle-check fa-lg" style="color:#cfd318;"></i>  Lorem ipsum dolor sit amet, con-</p>
                                                    <p class="text-center mt-3"><i class="fa-solid fa-circle-check fa-lg" style="color:#cfd318;"></i>  Lorem ipsum dolor sit amet, con-</p>
                                                    <p class="text-center mt-3"><i class="fa-solid fa-circle-check fa-lg" style="color:#cfd318;"></i>  Lorem ipsum dolor sit amet, con-</p>
                                                    <p class="text-center mt-3"><i class="fa-solid fa-circle-check fa-lg" style="color:#cfd318;"></i>  Lorem ipsum dolor sit amet, con-</p>
                                                    <p class="text-center mt-3"><i class="fa-solid fa-circle-check fa-lg" style="color:#cfd318;"></i>  Lorem ipsum dolor sit amet, con-</p>
                                                </tr>
                                            </tbody>
                                        </table>
            
                                        <div class="justify-content-center">
                                            <button type="button" class="btn btn-outline-primary ms-1">Ver rutas creadas</button>
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