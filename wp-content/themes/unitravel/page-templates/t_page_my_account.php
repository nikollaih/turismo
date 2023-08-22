<?php
/*
Template Name: My account enterprising
*/
?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>
<style>

.img-perfil-routes {
	margin-top: -95px;
}
.column-perfil-routes{
    margin-top: -150px;
    background-color: #f2f2f2;
    z-index: 10000;
}
.text-my-perfil-route{
    padding-left: 4rem;
    padding-right: 3rem;

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
        <section id="my-account">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-8 col-sm-12">
                            <h5 class="text-center mt-0 h5-orange">MI CUENTA</h5>
                            <div>
                            <h5 class="mt-3">INFORMACIÓN PERSONAL</h5>
                            <form action="" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nameRoute">Nombre</label>
                                        <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="descriptionRoute">Email</label>
                                        <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="descriptionRoute">Teléfono</label>
                                        <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="descriptionRoute">Contraseña</label>
                                        <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                    </div>
                                    <div class="col-md-12">
                                        <h5 class="mt-5">INFORMACIÓN DEL EMPRENDIMIENTO</h5>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameActivityRoute">Nombre</label>
                                        <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameActivityRoute">Dirección</label>
                                        <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameActivityRoute">Sitio web</label>
                                        <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameActivityRoute">Instagram</label>
                                        <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameActivityRoute">Facebook</label>
                                        <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameActivityRoute">Latitud</label>
                                        <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameActivityRoute">Longitud</label>
                                        <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="nameActivityRoute">Descripción</label>
                                        <textarea  class="form-control text-area-route" id="nameActivityRoute" name="route[activityName]"></textarea>
                                    </div>
                                  
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                             </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                                <div class="text-center position-relative pb-5 column-perfil-routes" >
                                    <img src="https://img.freepik.com/vector-premium/diseno-ilustracion-vector-personaje-avatar-mujer-joven_24877-18536.jpg" alt="avatar" class="img-perfil-routes rounded-circle img-fluid" style="width: 200px;">
                                    
                                    <div class="justify-content-center mt-5 mb-5">
                                        <h5 class="my-0 mb-0 h5-green">FINCA LA <br> ESTRELLA</h5>
                                        <p class="text-muted">Buenavista</p>
                                    </div>
        
                                    <div class="justify-content-center mt-5 pt-5">
                                        <h5 class="my-0 mb-0 h5-green">MIS RUTAS</h5>
        
                                        <table class="table  table-borderles">
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
            
                                        <div class="justify-content-center mb-3">
                                            <button type="button" class="btn btn-outline-primary ms-1">Crear rutas</button>
                                        </div>
                                   </div>
                                   <div class=" mt-3 pt-3">
                                  
                                   </div>
                                   <div class=" justify-content-center mt-5 mb-5 ">
                                        <h5 class="my-0 mb-0 h5-green">GALERÍA</h5>
                                        <div class="text-my-perfil-route">
                                        <p class="text-justify text-center mt-5 pt-3 ">Lorem ipsum dolor sit amet, con-
                                        sectetuer adipiscing elit, sed diam
                                        nonummy nibh euismod tincidunt
                                        ut laoreet dolore magna aliquam</p>
                                        </div>

                                        <div class="justify-content-center mb-3">
                                            <button type="button" class="btn btn-outline-primary ms-1">Actualizar</button>
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