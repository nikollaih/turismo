<?php
/*
Template Name: Company
*/
?>
<?php 
include get_theme_file_path("page-templates/utilities.php");
include get_theme_file_path("includes/custom-clases/CUS_Route.php");

$routesModel = new CUS_Route();
$user = get_users(array(
    'meta_key'     => 'user_company_id',
    'meta_value'   => $_GET['id'],
));
$user_data = get_user_meta($user[0]->ID);
$dataCompany = cus_get_company_id($_GET['id']);
$routes = $routesModel->get_all_by_company($dataCompany[0]['id_cus_company']);

$page_id = get_the_ID();
$page ='.page-id-'.$page_id;
if(!empty($dataCompany[0]['cus_company_name'])){
	$name = $dataCompany[0]['cus_company_name'];
	$css = '
	'. $page .' .vc_custom_1693159376634::before {
        content: "' . $name . '";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        padding: 10px;
        font-size: 95px;
        color: white;
        letter-spacing: 5px;
		line-height: normal;
    }
	@media (max-width: 768px) {
		'. $page .' .vc_custom_1693159376634::before{
		    font-size: 50px;
			letter-spacing: 20px;
			line-height: normal;
		}
	}
	';
	echo '<style>' . $css . '</style>';
} 
?>
<div id="custom-page">
    <?php get_header() ?>
				<div id="content" role="main">
					<section id="company">
						<!-- Se comenta carrusel de imagenes ya que en el momento no contamos con la galeria de imagenes de la finca-->
						<!-- <div class="wrapper">
							<i id="left" class="fa-solid fa-angle-left carrusel-left"></i>
							<div class="carousel-list">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
								<img src="https://rutasdelpaisajeculturalcafetero.com/wp-content/uploads/2016/07/mirador-salento.jpg" alt="" srcset="">
							</div>
							<div role="tablist" class="carousel-indicator"></div>
							<i id="right" class="fa-solid fa-angle-right carrusel-right" ></i>
						</div> -->


						<div class="row" style="padding-top: 100px;">
							<div class="col-md-8 col-sm-6 col-xs-12">
								<div class="mb-5">
									<h5 class="title-route sc_item_title sc_title_title sc_item_title_style_default">INFORMACIÓN</h5>
									<p style="font-size: large;" class="mb-4"><?= isset($dataCompany[0]['cus_company_short_description']) ? $dataCompany[0]['cus_company_short_description'] : '' ?></p>
								</div>
								<div class="mt-4">
									<label for="" class="mb-3">
										<i class="fa fa-thermometer-half fa-icon-travel"></i>
										<span class="label-prefix mx-2"><?= isset($dataCompany[0]['cus_company_latitude']) ? $dataCompany[0]['cus_company_latitude'] : '' ?> latitud</span>
									</label> <br>
									<label for="" class="mb-3">
										<i class="fa fa-thermometer-three-quarters fa-icon-travel"></i>
										<span class="label-prefix mx-2"><?= isset($dataCompany[0]['cus_company_longitude']) ? $dataCompany[0]['cus_company_longitude']  : '' ?> longitud</span>
									</label> <br>
									<label for="" class="mb-3">
										<i class="fa-brands fa-whatsapp fa-icon-travel"></i>
										<span class="label-prefix mx-2"><?= isset($dataCompany[0]['cus_company_whatsapp']) ? $dataCompany[0]['cus_company_whatsapp'] : '' ?></span>
									</label> <br>
									<label for="" class="mb-3">
										<i class="fa fa-map-marker fa-icon-travel"></i>
										<i class="bi bi-geo-alt"></i>
										<span class="label-prefix mx-2"> <?= isset($dataCompany[0]['cus_company_address']) ? $dataCompany[0]['cus_company_address'] : '' ?></span>
									</label> <br>
									<label for="" class="mb-3">
										<i class="fa fa-facebook fa-icon-travel" aria-hidden="true"></i>
										<i class="fa fa-instagram fa-icon-travel mx-2" aria-hidden="true"></i>
										<span class="label-prefix mx-2 ">  <a style="color: #a8b504;"href="<?= isset($dataCompany[0]['cus_company_web']) ?  $dataCompany[0]['cus_company_web'] : "" ?>" target="_blank"><?= $dataCompany[0]['cus_company_web'] ?></a></span>
									</label> <br>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="card" style="border-radius: 15px;">
										<div class="card-body text-center">
											<div class="mt-3 mb-4">
											<img  src="<?= get_profile_image($user[0]->ID) ?>" class="rounded-circle img-fluid" style="width: 110px; height:110px;" />
											</div>
											<h4 class="mt-5"><?= $user[0]->user_nicename ? $user[0]->user_nicename : ''?></h4>
											<p class="text-muted mb-5"><?= $user[0]->user_email ? $user[0]->user_email : '' ?></p>
											<div class="mb-4 pb-2">
											</div>
									    </div>
									</div>
								</div>
							<div class="col-md-12 col-sm-12 mt-5">
								<div class="mb-5">
									<h5 class="title-route sc_item_title sc_title_title sc_item_title_style_default">Rutas</h5>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
									<?php if(is_array($routes)){
									foreach ($routes as $route) 
										{ ?>
											<div class="room-plugin column-1-2">
												<div id="post-518" class="post-518 room type-room status-publish has-post-thumbnail hentry">
													<div class="room-plugin room-single">
														<div class="room-plugin room-featured">
															<img src="<?= get_route_logo($route["id_route"], $route["route_image"]) ?>" class="attachment-room-small size-room-small wp-post-image" alt="" decoding="async"  sizes="(max-width: 740px) 100vw, 740px"> 
														</div>
														<div class="room-plugin room-plugin-content text-center">
															<div class="room-title">
																<a class="room-plugin room-title-link" href="<?= home_url() ?>/ver-ruta?ruta=<?= cus_encrypt($route["id_route"]) ?>"><?= $route["route_name"] ?></a>
															</div>
															<div class="room-plugin room-info">
																<div class="room-plugin room-info-item">
																	<div class="room-plugin room-people">
																		<i class="fa-regular fa-clock"></i>&nbsp;&nbsp;&nbsp;<?= date("h:i a", strtotime($route["route_start_time"])) ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?= date("h:i a", strtotime($route["route_end_time"])) ?>
																	</div>
																</div>
															</div>
															<div class="room-plugin room-content">
																<p><?= $route["route_short_description"] ?></p>
																<div class="room-plugin room-price">
																	<?php
																		if($route["route_discount"] > 0) {
																			?>
																			<span class="room-plugin room-present-currency">$</span>
																			<span class="room-plugin room-old-price"><?= number_format($route["route_price"], 0) ?></span><br>
																			<?php
																		}

																		if($route["route_price"] > 0) { ?>
																			<span class="room-plugin room-present-currency">$</span>
																			<span class="room-plugin room-present-price"><?= number_format($route["route_price"] - $route["route_discount"], 0) ?></span>
																		<?php }
																	?>
																</div>
															</div>
														</div>
														</div>
													</div>
												</div>
											</div>
									<?php
										}
									}
									?>
									</div>
								</div>
                            </div>
                        </div>
							<!-- Se comenta video  ya que por el momento no contamos el video del mismo -->
							<!-- <div class="containter mt-5">
								<div class="row">
									<div class="embed-responsive embed-responsive-21by9">
											<iframe class="embed-responsive-item"src="https://www.youtube.com/embed/7b2IawXPtHk?si=m1MgmNYeTybTxj0C" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
									</div>
								</div>
							</div> -->
						</div>
					</section>
				</div>
			</div>
 <!-- Carrusel view companies image -->
<script>
  var carousel = $('.carousel-list');
  $(document).ready(function(){
    $('.carousel-list').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
	  scrollLock: true,
	  dots: '#resp-dots',
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2500,
      pauseOnHover: true,
      responsive: [
        {
          breakpoint: 775,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            itemWidth: 150,
            speed: 250
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            itemWidth: 150,
            speed: 250
          }
        }
      ]
    });
  });
  $('#right').on('click', function() {
    carousel.slick('slickNext');
  });

  $('#left').on('click', function() {
    carousel.slick('slickPrev');
  });
</script>
	<?php get_footer() ?>
</div>