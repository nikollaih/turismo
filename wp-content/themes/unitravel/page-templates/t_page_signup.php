<?php
   /*
   Template Name: SignUp
   */
   ?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>
<?php include get_theme_file_path("includes/form-handlers/register.php"); ?>
<?php $cities = get_all_cities(); ?>
<div id="custom-page">
   <?php get_header() ?>
   <div id="primary" class="site-content">
      <div id="content" role="main">
         <section class="gradient-custom-2">
            <div class="container py-5">
               <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-12">
                     <form action="" method="post"  enctype="multipart/form-data">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                           <div class="card-body p-0">
                              <div class="row g-0">
                                 <div class="col-lg-12">
                                    <div class="p-5">
                                       <h3 class="fw-normal mb-5 no-top text-center">Información personal</h3>
                                       <div class="row justify-content-center">
                                          <div class="col-md-12">
                                             <div class="form-group text-center">
                                                   <label for="profile-image" style="cursor: pointer;">
                                                      <img id="profile-preview" src="https://avatar-management--avatars.us-west-2.prod.public.atl-paas.net/default-avatar.png" alt="Vista previa de la imagen" class="img-thumbnail custom-image-profile">
                                                   </label>
                                                   <input name="profile" type="file" class="form-control-file" id="profile-image" accept="image/*" style="display: none;">
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required placeholder="Número de documento" name="user[document]" type="number" id="document" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["document"]) ? $FORM_DATA["user"]["document"] : "") ?>"/>
                                                <?php if(isset($RESPONSE_CREATE_USER_COMPANY["status"]) && $RESPONSE_CREATE_USER_COMPANY["status"] == false && $RESPONSE_CREATE_USER_COMPANY["field"] == "document"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER_COMPANY["message"]."<span/>";
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
                                                <input required placeholder="Teléfono" type="number" name="company[phone]" id="phone" class="form-control form-control-lg"  value="<?= (isset($FORM_DATA["company"]["phone"]) ? $FORM_DATA["company"]["phone"] : "") ?>"/>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input minlength="8" required placeholder="Correo electrónico" name="user[email]" type="email" id="email" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["email"]) ? $FORM_DATA["user"]["email"] : "") ?>" />
                                                <?php if(isset($RESPONSE_CREATE_USER_COMPANY["status"]) && $RESPONSE_CREATE_USER_COMPANY["status"] == false && $RESPONSE_CREATE_USER_COMPANY["field"] == "email"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER_COMPANY["message"]."<span/>";
                                                }?>
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input minlength="8" required placeholder="Contraseña" name="user[pass]" type="password" id="pass" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["pass"]) ? $FORM_DATA["user"]["pass"] : "") ?>"/>
                                                <?php if(isset($RESPONSE_CREATE_USER_COMPANY["status"]) && $RESPONSE_CREATE_USER_COMPANY["status"] == false && $RESPONSE_CREATE_USER_COMPANY["field"] == "pass"){
                                                   echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER_COMPANY["message"]."<span/>";
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
                                       <h3 class="fw-normal mb-5 no-top text-center">Información del emprendimiento</h3>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="form-group text-center">
                                                   <label for="logo-image" style="cursor: pointer;">
                                                      <img id="logo-preview" src="https://www.globalterramaps.com/images/AGLCA/HistoricSite.png" alt="Vista previa de la imagen" class="img-thumbnail custom-image-profile">
                                                   </label>
                                                   <input name="logo" type="file" class="form-control-file" id="logo-image" accept="image/*" style="display: none;">
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required value="<?= (isset($FORM_DATA["company"]["name"]) ? $FORM_DATA["company"]["name"] : "") ?>" name="company[name]" placeholder="Nombre" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required value="<?= (isset($FORM_DATA["company"]["web"]) ? $FORM_DATA["company"]["web"] : "") ?>" name="company[web]" placeholder="Pagina web" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required value="<?= (isset($FORM_DATA["company"]["whatsapp"]) ? $FORM_DATA["company"]["whatsapp"] : "") ?>" name="company[whatsapp]" placeholder="Número de whatsapp" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <select name="company[city]" id="">
                                                   <option value="null">- Seleccionar municipio</option>
                                                   <?php
                                                      if(count($cities) > 0){
                                                         for ($i=0; $i < count($cities); $i++) { 
                                                   ?>
                                                      <option <?= (isset($FORM_DATA["company"]["city"]) == $cities[$i]["city_id"]) ? "selected" : "" ?>  value="<?= $cities[$i]["city_id"] ?>"><?= $cities[$i]["city_name"] ?></option>
                                                   <?php
                                                         }
                                                      }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input required value="<?= (isset($FORM_DATA["company"]["address"]) ? $FORM_DATA["company"]["address"] : "") ?>" name="company[address]" placeholder="Dirección" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input value="<?= (isset($FORM_DATA["company"]["latitude"]) ? $FORM_DATA["company"]["latitude"] : "") ?>" name="company[latitude]" placeholder="Latitud" type="number" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                                <input value="<?= (isset($FORM_DATA["company"]["longitude"]) ? $FORM_DATA["company"]["longitude"] : "") ?>" name="company[longitude]" placeholder="Longitud" type="number" id="form3Examplea4" class="form-control form-control-lg" />
                                             </div>
                                          </div>
                                          <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                                             <div class="form-outline form-white">
                                             <textarea required name="company[description]" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Descripción" name="textarea-message"><?= (isset($FORM_DATA["company"]["description"]) ? $FORM_DATA["company"]["description"] : "") ?></textarea>
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