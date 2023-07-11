<?php
   /*
   Template Name: Profile
   */
   ?>
<?php include get_theme_file_path("page-templates/utilities.php"); ?>
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
                           <h5 class="my-3">Pepita Perez</h5>
                           <p class="text-muted mb-1">Mujer Emprendedora</p>
                           <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
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
                                 <p class="mb-0">https://mdbootstrap.com</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                 <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                 <p class="mb-0">mdbootstrap</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                 <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                 <p class="mb-0">mdbootstrap</p>
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
                                 <p class="text-muted mb-0">Accesorios Pepita</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Correo electronico</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">example@example.com</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Teléfono</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">(097) 234-5678</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Dirección</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                              </div>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-sm-3">
                                 <p class="mb-0">Descripción</p>
                              </div>
                              <div class="col-sm-9">
                                 <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae augue non eros pharetra malesuada ut volutpat diam. Integer ex lorem, sollicitudin pretium sapien ut, imperdiet vestibulum sem. Pellentesque ut fermentum metus, id euismod orci. Curabitur quis sem id eros pellentesque consectetur. Donec mattis dapibus odio vitae hendrerit. Quisque enim est, blandit non viverra ac, lacinia a quam. Nullam vehicula semper tortor, eget vestibulum nunc. Donec lobortis diam vel pretium sollicitudin. Nulla hendrerit faucibus elit vel facilisis. Aliquam vestibulum urna ut aliquet tristique. Vestibulum sollicitudin nulla at ligula semper faucibus. Donec nec ipsum vehicula, faucibus nisi ultrices, mattis erat. Nam sed est tincidunt, varius massa semper, volutpat erat. Nullam scelerisque arcu posuere pharetra elementum. Nam sit amet pellentesque turpis.</p>
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