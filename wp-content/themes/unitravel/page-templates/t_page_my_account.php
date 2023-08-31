<?php
/*
Template Name: My account enterprising
*/
?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>
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
                                        <h6 class="my-0 mb-0 h5-green">MIS RUTAS</h6>
        
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
                                            <a href="<?php echo get_template_directory_uri() . '/create-routes'; ?>" class="btn btn-routes-primary ms-1">CREAR RUTAS</a>
                                        </div>
                                   </div>
                                   <div class=" mt-3 pt-3">
                                  
                                   </div>
                                   <div class=" justify-content-center mt-5 mb-5 ">
                                        <h6 class="my-0 mb-0 h5-green">GALERÍA</h6>
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