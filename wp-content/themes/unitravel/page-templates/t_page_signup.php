<?php
   /*
   Template Name: SignUp
   */
   ?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>
<?php include get_theme_file_path("includes/form-handlers/register.php"); ?>
<div id="custom-page">
   <?php get_header() ?>
   <div id="primary" class="site-content">
      <div id="content" role="main">
         <section class="gradient-custom-2">
            <div class="container py-5">
               <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-12">
                     <h6 class="text-center sc_item_subtitle sc_services_subtitle sc_align_left sc_item_title_style_default">Nuevo Usuario</h6>
                     <h3 class="mb-5 text-center sc_item_title sc_services_title sc_align_left sc_item_title_style_default sc_item_title_tag">REGISTRO</h3>
                     <form action="" method="post">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                           <div class="card-body p-0">
                              <div class="row g-0">
                                 <div class="col-lg-12">
                                    <div class="p-5">
                                       <h4 class="fw-normal mb-5 no-top">Información personal</h4>
                                       <div class="row">
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required placeholder="Número de documento" name="user[document]" type="number" id="document" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["document"]) ? $FORM_DATA["user"]["document"] : "") ?>"/>
                                                <?php if(isset($RESPONSE_CREATE_USER["status"]) && $RESPONSE_CREATE_USER["status"] == false && $RESPONSE_CREATE_USER["field"] == "document"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER["message"]."<span/>";
                                                }?>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required placeholder="Nombres y apellidos" name="user[fullname]" type="text" id="fullname" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["fullname"]) ? $FORM_DATA["user"]["fullname"] : "") ?>" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required placeholder="Teléfono" type="number" name="user[phone]" id="phone" class="form-control form-control-lg"  value="<?= (isset($FORM_DATA["user"]["phone"]) ? $FORM_DATA["user"]["phone"] : "") ?>"/>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required placeholder="Correo electrónico" name="user[email]" type="email" id="email" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["email"]) ? $FORM_DATA["user"]["email"] : "") ?>" />
                                                <?php if(isset($RESPONSE_CREATE_USER["status"]) && $RESPONSE_CREATE_USER["status"] == false && $RESPONSE_CREATE_USER["field"] == "email"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER["message"]."<span/>";
                                                }?>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required placeholder="Contraseña" name="user[pass]" type="password" id="pass" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["pass"]) ? $FORM_DATA["user"]["pass"] : "") ?>"/>
                                                <?php if(isset($RESPONSE_CREATE_USER["status"]) && $RESPONSE_CREATE_USER["status"] == false && $RESPONSE_CREATE_USER["field"] == "pass"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER["message"]."<span/>";
                                                }
                                                ?>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required placeholder="Repetir contraseña" name="user[r_pass]" type="password" id="r_pass" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["r_pass"]) ? $FORM_DATA["user"]["r_pass"] : "") ?>"/>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 bg-indigo text-white">
                                    <div class="p-5">
                                       <h4 class="fw-normal mb-5 no-top">Información del emprendimiento</h4>
                                       <div class="row">
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input placeholder="Nombre" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input placeholder="Pagina web" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input placeholder="Facebook" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input placeholder="Instagram" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input placeholder="Dirección" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                             <textarea cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Descripción" name="textarea-message"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <button type="button" class="btn btn-dark btn-lg"
                                          data-mdb-ripple-color="dark">Cancelar</button>
                                       <button type="submit" class="btn btn-light btn-lg"
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