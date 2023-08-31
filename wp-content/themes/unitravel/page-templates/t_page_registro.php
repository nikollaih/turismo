<?php
/*
Template Name: Register
*/
?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="register">
                <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <div class="text-center mb-5">
                                <img src="http://localhost/turismo/wp-content/uploads/2017/01/logo1_x2.png" alt="" >
                            </div>
                            <h3 class="text-center mt-0 h5-orange">Registro</h3>
                            <div class="card">
                              <div class="p-5">
                                <h5 class="mt-3">INFORMACIÓN PERSONAL</h5>
                                <form action="" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="nameRoute">Nombre</label>
                                            <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="descriptionRoute">Email</label>
                                            <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="descriptionRoute">Teléfono</label>
                                            <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="descriptionRoute">Contraseña</label>
                                            <input type="text" class="form-control" id="nameRoute" name="route[name]">
                                        </div>
                                        <div class="col-md-12">
                                            <h5 class="mt-5">INFORMACIÓN DEL EMPRENDIMIENTO</h5>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="nameActivityRoute">Nombre</label>
                                            <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="nameActivityRoute">Dirección</label>
                                            <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="nameActivityRoute">Sitio web</label>
                                            <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="nameActivityRoute">Municipio</label>
                                            <select aria-label="Default select example">
                                                <option selected>Elige el municipio</option>
                                                <option value="1">Armenia</option>
                                                <option value="2">Buenavista</option>
                                                <option value="3">Cordoba</option>
                                            </select>                                   
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="nameActivityRoute">Telefono</label>
                                            <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="nameActivityRoute">Latitud</label>
                                            <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="nameActivityRoute">Longitud</label>
                                            <input type="text" class="form-control" id="nameActivityRoute" name="route[activityName]">
                                        </div>
                                        <div class="form-group col-md-12 pb-3">
                                            <label for="nameActivityRoute">Descripción</label>
                                            <textarea  class="form-control text-area-route" id="nameActivityRoute" name="route[activityName]"></textarea>
                                        </div>
                                    
                                        <button type="submit" class="btn btn-lg btn-primary">Actualizar</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                        </div>
                 </div>
            </section>
        </div>
    </div>
    <?php get_footer() ?>
</div>