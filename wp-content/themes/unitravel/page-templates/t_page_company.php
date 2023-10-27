<?php
/*
Template Name: Company
*/
?>
<?php 
include get_theme_file_path("page-templates/utilities.php");

$dataCompany = cus_get_companies_all(3);

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
    }
	@media (max-width: 768px) {
		'. $page .' .vc_custom_1693159376634::before{
		    font-size: 86px;
			letter-spacing: 20px;
			line-height: 74px;
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
						<div class="wrapper">
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
						</div>


						<div class="row" style="padding-top: 100px;">
							<div class="col-md-8 col-sm-6 col-xs-12">
								<div class="mb-5">
									<h3 class="h1-information">INFORMACIÓN</h3>
									<p style="font-size: large;" class="mb-4"><?= isset($dataCompany[0]['cus_company_short_description']) ? $dataCompany[0]['cus_company_short_description'] : '' ?></p>
								</div>
								<div class="mt-4">
									<label for="" class="mb-3">
										<i class="fa fa-thermometer-half fa-2x fa-color"></i>
										<span class="label-prefix mx-2"><?= isset($dataCompany[0]['cus_company_latitude']) ? $dataCompany[0]['cus_company_latitude'] : '' ?> latitud</span>
									</label> <br>
									<label for="" class="mb-3">
										<i class="fa fa-thermometer-three-quarters fa-2x fa-color"></i>
										<span class="label-prefix mx-2"><?= isset($dataCompany[0]['cus_company_longitude']) ? $dataCompany[0]['cus_company_longitude']  : '' ?> longitud</span>
									</label> <br>
									<label for="" class="mb-3">
										<i class="fa-brands fa-whatsapp fa-2x fa-color"></i>
										<span class="label-prefix mx-2"><?= isset($dataCompany[0]['cus_company_whatsapp']) ? $dataCompany[0]['cus_company_whatsapp'] : '' ?></span>
									</label> <br>
									<label for="" class="mb-3">
										<i class="fa fa-map-marker fa-2x fa-color"></i>
										<i class="bi bi-geo-alt"></i>
										<span class="label-prefix mx-2"> <?= isset($dataCompany[0]['cus_company_address']) ? $dataCompany[0]['cus_company_address'] : '' ?></span>
									</label> <br>
									<label for="" class="mb-3">
										<i class="fa fa-facebook fa-2x fa-color" aria-hidden="true"></i>
										<i class="fa fa-instagram fa-2x fa-color mx-2" aria-hidden="true"></i>
										<span class="label-prefix mx-2 ">  <a style="color: #a8b504;"href="<?= isset($dataCompany[0]['cus_company_web']) ?  $dataCompany[0]['cus_company_web'] : "" ?>" target="_blank"><?= $dataCompany[0]['cus_company_web'] ?></a></span>
									</label> <br>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="card" style="border-radius: 15px;">
										<div class="card-body text-center">
											<div class="mt-3 mb-4">
											<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
												class="rounded-circle img-fluid" style="width: 100px;" />
											</div>
											<h4 class="mt-5">Andres Ramirez</h4>
											<p class="text-muted mb-5">@andresfe-2010 <span class="mx-2">|</span> <a
												href="#!">facebook.com</a></p>
											<div class="mb-4 pb-2">
											</div>
									    </div>
									</div>
								</div>
							</div>
							
							<div class="containter mt-5">
								<div class="row">
									<div class="embed-responsive embed-responsive-21by9">
											<iframe class="embed-responsive-item"src="https://www.youtube.com/embed/7b2IawXPtHk?si=m1MgmNYeTybTxj0C" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
									</div>
								</div>
							</div>
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