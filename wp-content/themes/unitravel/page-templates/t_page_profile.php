<?php
   /*
   Template Name: Profile
   */
   ?>
<?php 
include get_theme_file_path("page-templates/utilities.php");
require_once get_theme_file_path("includes/helpers/index.php");

$current_user = cus_get_current_user();
if(!$current_user){
   wp_redirect(site_url());
   exit;
}

$company = cus_get_company($current_user->ID);
if(!$company){
   wp_redirect(site_url());
   exit;
}

?>
<div id="custom-page">
   <?php get_header() ?>
   <div id="primary" class="site-content">
      <div id="content" role="main">
         <section id="profile-container">
            <div class="container py-5">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="card mb-4">
                        <div class="card-body text-center">
                           <img src="https://img.freepik.com/vector-premium/diseno-ilustracion-vector-personaje-avatar-mujer-joven_24877-18536.jpg" alt="avatar"
                              class="rounded-circle img-fluid" style="width: 150px;">
                           <h5 class="my-3"><?= $current_user->display_name; ?></h5>
                           <p class="text-muted mb-1">Mujer Emprendedora</p>
                           <div class="d-flex justify-content-center mb-2">
                              <button type="button" class="btn btn-outline-primary ms-1">Modificar</button>
                           </div>
                        </div>
                     </div>
                     <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                           <ul class="list-group list-group-flush rounded-3">
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                 <i class="fas fa-globe fa-lg text-warning"></i>
                                 <p class="mb-0"><?= $company["cus_company_web"] ?></p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                 <i class="fab fa-whatsapp fa-lg" style="color: #ac2bac;"></i>
                                 <p class="mb-0"><?= $company["cus_company_whatsapp"] ?></p>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div class="card mb-4">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Emprendimiento</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0"><?= $company["cus_company_name"] ?></p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Correo electronico</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0"><?= $current_user->user_email; ?></p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Teléfono</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0"><?= $company["cus_company_phone"] ?></p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Dirección</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0"><?= $company["cus_company_address"] ?></p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Descripción</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0"><?= $company["cus_company_description"] ?></p>
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