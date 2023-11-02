<?php
   /*
   Template Name: Edit Profile Company
   */

    include get_theme_file_path("page-templates/utilities.php"); 
    include get_theme_file_path("includes/form-handlers/edit_profile_company.php");
    include get_theme_file_path("page-templates/current_user_company_data.php"); 
    $cities = get_all_cities(); 

   if(!isset($FORM_DATA["user"])){
      $FORM_DATA["user"]["ID"] = $current_user->ID;
      $FORM_DATA["user"]["document"] = $current_user->document_number;
      $FORM_DATA["user"]["fullname"] = $current_user->display_name;
      $FORM_DATA["user"]["email"] = $current_user->user_email;
      $FORM_DATA["user"]["biografia"] = $current_user->biografia;
      $FORM_DATA["user"]["historia"] = $current_user->historia;
   }

   if(!isset($FORM_DATA["company"])){
      $FORM_DATA["company"]["id_company"] = $company["id_cus_company"];
      $FORM_DATA["company"]["name"] = $company["cus_company_name"];
      $FORM_DATA["company"]["web"] = $company["cus_company_web"];
      $FORM_DATA["company"]["whatsapp"] = $company["cus_company_whatsapp"];
      $FORM_DATA["company"]["city"] = $company["cus_company_city"];
      $FORM_DATA["company"]["address"] = $company["cus_company_address"];
      $FORM_DATA["company"]["latitude"] = $company["cus_company_latitude"];
      $FORM_DATA["company"]["longitude"] = $company["cus_company_longitude"];
      $FORM_DATA["company"]["cus_company_logo"] = $company["cus_company_logo"];
      $FORM_DATA["company"]["short_description"] = $company["cus_company_short_description"];
   }

   // Obtiene la session falsh en caso de que se haya creado una nueva colaboradora
   $success_message = get_flash_message('success_message');

?>

<div id="custom-page">
   <?php get_header() ?>
   <div id="primary" class="site-content">
      <div id="content" role="main">
         <section class="gradient-custom-2">
            <div class="container py-5">
               <dic class="row">
                  <div class="col-md-12">
                     <?php
                           if (!empty($success_message) && (isset($RESPONSE_CREATE_USER_COMPANY["status"]) && $RESPONSE_CREATE_USER_COMPANY["status"] == true)) {
                              echo '<div class="alert alert-success" role="alert">' . esc_html($success_message) . '</div>';
                           }
                           
                           if ((isset($RESPONSE_CREATE_USER_COMPANY["status"]) && $RESPONSE_CREATE_USER_COMPANY["status"] == false)) {
                              echo '<div class="alert alert-danger" role="alert">' . esc_html($RESPONSE_CREATE_USER_COMPANY["message"]) . '</div>';
                           }
                     ?>
                  </div>
               </dic>
               <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-12">
                     <form action="" method="post"  enctype="multipart/form-data">
                        <input name="user[ID]" type="hidden" value="<?= $current_user->ID ?>">
                        <input name="company[id_company]" type="hidden" value="<?= $company["id_cus_company"] ?>">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                           <div class="card-body p-0">
                              <?php include("shorcuts/_form_edit_personal_information.php") ?>
                              <?php include("shorcuts/_form_company_information.php") ?>
                              <div class="row">
                                 <div class="col">
                                    <div class="p-5">
                                       <a href="<?= home_url() ?>/mi-cuenta">
                                          <button type="button" class="btn btn-dark btn-lg"
                                          data-mdb-ripple-color="dark">Cancelar</button>
                                       </a>
                                       <button type="submit" class="btn btn-primary btn-lg"
                                          data-mdb-ripple-color="dark">Actualizar</button>
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