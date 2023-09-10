<?php
/*
Template Name: Add Collaborator
*/

include get_theme_file_path("page-templates/utilities.php");
include get_theme_file_path("page-templates/current_user_company_data.php"); 
include get_theme_file_path("includes/form-handlers/add_collaborator.php");
?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <section id="create-routes">
                <div class="container" style="position: relative;">
                <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-12">
                     <form action="" method="post"  enctype="multipart/form-data">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                           <div class="card-body p-0">
                              <div class="row g-0">
                                 <div class="col-lg-12">
                                    <div class="p-5">
                                       <h3 class="fw-normal mb-5 no-top text-center">Agregar colaboradora</h3>
                                       <div class="row justify-content-center">
                                          <div class="col-md-12">
                                             <div class="form-group text-center">
                                                   <label for=""><i class="fa-regular fa-pen-to-square"></i> Seleccionar foto de perfil</label><br>
                                                   <label for="profile-image" style="cursor: pointer;">
                                                      <img id="profile-preview" src="https://avatar-management--avatars.us-west-2.prod.public.atl-paas.net/default-avatar.png" alt="Vista previa de la imagen" class="img-thumbnail custom-image-profile">
                                                   </label>
                                                   <input name="profile" type="file" class="form-control-file" id="profile-image" accept="image/*" style="display: none;">
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <label for="nameActivityRoute">Número de documento <b class="text-danger">*</b></label>
                                                <input required placeholder="" name="user[document]" type="number" id="document" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["document"]) ? $FORM_DATA["user"]["document"] : "") ?>"/>
                                                <?php if(isset($RESPONSE_CREATE_USER["status"]) && $RESPONSE_CREATE_USER["status"] == false && $RESPONSE_CREATE_USER["field"] == "document"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER["message"]."<span/>";
                                                }?>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <label for="nameActivityRoute">Nombres y apellidos <b class="text-danger">*</b></label>
                                                <input required placeholder="" name="user[fullname]" type="text" id="fullname" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["fullname"]) ? $FORM_DATA["user"]["fullname"] : "") ?>" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <label for="nameActivityRoute">Teléfono <b class="text-danger">*</b></label>
                                                <input minlength="7" required placeholder="" name="user[phone_number]" type="number" id="phone_number" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["phone_number"]) ? $FORM_DATA["user"]["phone_number"] : "") ?>" />
                                                <?php if(isset($RESPONSE_CREATE_USER["status"]) && $RESPONSE_CREATE_USER["status"] == false && $RESPONSE_CREATE_USER["field"] == "phone_number"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER["message"]."<span/>";
                                                }?>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <label for="nameActivityRoute">Correo electrónico <b class="text-danger">*</b></label>
                                                <input minlength="8" required placeholder="" name="user[email]" type="email" id="email" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["email"]) ? $FORM_DATA["user"]["email"] : "") ?>" />
                                                <?php if(isset($RESPONSE_CREATE_USER["status"]) && $RESPONSE_CREATE_USER["status"] == false && $RESPONSE_CREATE_USER["field"] == "email"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER["message"]."<span/>";
                                                }?>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <label for="nameActivityRoute">Contraseña (Minimo 8 caracteres) <b class="text-danger">*</b></label>
                                                <input minlength="8" required placeholder="" name="user[pass]" type="password" id="pass" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["pass"]) ? $FORM_DATA["user"]["pass"] : "") ?>"/>
                                                <?php if(isset($RESPONSE_CREATE_USER["status"]) && $RESPONSE_CREATE_USER["status"] == false && $RESPONSE_CREATE_USER["field"] == "pass"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER["message"]."<span/>";
                                                }
                                                ?>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <label for="nameActivityRoute">Repetir contraseña <b class="text-danger">*</b></label>
                                                <input required placeholder="" name="user[r_pass]" type="password" id="r_pass" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["r_pass"]) ? $FORM_DATA["user"]["r_pass"] : "") ?>"/>
                                             </div>
                                          </div>
                                       </div>
                                          <button onclick="window.history.back();" type="button" class="btn btn-dark btn-lg"
                                             data-mdb-ripple-color="dark">Cancelar</button>
                                       <button type="submit" class="btn btn-primary btn-lg"
                                          data-mdb-ripple-color="dark">Continuar</button>
                                    </div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
                </div>
            </section>
        </div>
    </div>
    <?php get_footer() ?>
</div>