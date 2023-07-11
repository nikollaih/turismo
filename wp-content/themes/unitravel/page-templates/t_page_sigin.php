<?php
   /*
   Template Name: SignUp
   */
   ?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>
<div id="custom-page">
   <?php get_header() ?>
   <div id="primary" class="site-content">
      <div id="content" role="main">
         <section class="gradient-custom-2">
            <div class="container py-5">
               <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-12">
                     <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                           <div class="row g-0">
                              <div class="col-lg-12">
                                 <div class="p-5">
                                    <h3 class="fw-normal mb-5 no-top">Login</h3>
                                    <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                          <div class="form-outline form-white">
                                             <input placeholder="Correo electrónico" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                                          <div class="form-outline form-white">
                                             <input placeholder="Contraseña" type="password" id="form3Examplea4" class="form-control form-control-lg" />
                                          </div>
                                       </div>
                                       <div class="col-sm-12">
                                        <button type="button" class="btn btn-light btn-lg"
                                       data-mdb-ripple-color="dark">Ingresar</button>
                                       </div>
                                    </div>
                                 </div>
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