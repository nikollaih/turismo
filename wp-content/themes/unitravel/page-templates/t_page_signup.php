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
                              <?php include("shorcuts/_form_personal_information.php") ?>
                              <?php include("shorcuts/_form_company_information.php") ?>
                              <div class="row">
                                 <div class="col">
                                    <div class="p-5">
                                       <button type="button" class="btn btn-dark btn-lg"
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