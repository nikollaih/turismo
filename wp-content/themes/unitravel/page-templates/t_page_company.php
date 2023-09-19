<?php
/*
Template Name: Company
*/
?>
<?php 
include get_theme_file_path("page-templates/utilities.php");

$dataCompany = cus_get_companies_all(2);

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
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">			<div id="primary" class="site-content">
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
								<div>
									<h2 class="h1-information">INFORMACIÓN</h2>
									<p style="font-size: large;"><?= $dataCompany[0]['cus_company_description'] ?> </p>
								</div>
								<div class="mt-4">
									<label for="" class="mb-2">
										<i class="fa fa-thermometer-half fa-2x fa-color"></i>
										<span class="label-prefix mx-2"><?= $dataCompany[0]['cus_company_latitude'] ?> latitud</span>
									</label> <br>
									<label for="" class="mb-2">
										<i class="fa fa-thermometer-three-quarters fa-2x fa-color"></i>
										<span class="label-prefix mx-2"><?= $dataCompany[0]['cus_company_longitude'] ?> longitud</span>
									</label> <br>
									<label for="" class="mb-2">
										<i class="fa-brands fa-whatsapp fa-2x fa-color"></i>
										<span class="label-prefix mx-2"><?= $dataCompany[0]['cus_company_whatsapp'] ?></span>
									</label> <br>
									<label for="" class="mb-2">
										<i class="fa fa-map-marker fa-2x fa-color"></i>
										<i class="bi bi-geo-alt"></i>
										<span class="label-prefix mx-2"> <?= $dataCompany[0]['cus_company_address'] ?></span>
									</label> <br>
									<label for="" class="mb-2">
										<i class="fa fa-facebook fa-2x fa-color" aria-hidden="true"></i>
										<i class="fa fa-instagram fa-2x fa-color mx-2" aria-hidden="true"></i>
										<span class="label-prefix mx-2 ">  <a style="color: #a8b504;"href="<?= $dataCompany[0]['cus_company_web'] ?>" target="_blank"><?= $dataCompany[0]['cus_company_web'] ?></a></span>
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
		

<script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
<script>
		window.addEventListener('load',function(){
			new Glider(document.querySelector('.carousel-list'), {
				// Mobile-first defaults
				slidesToShow: 2,
				slidesToScroll: 1,
				scrollLock: true,
				dots: '#resp-dots',
				draggable: true,
				dragVelocity: 1.3,
				arrows: {
					prev: '.carrusel-left',
					next: '.carrusel-right'
				},
				responsive: [
					{
					breakpoint: 775,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						itemWidth: 150,
						duration: 0.25
					}
					},{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						itemWidth: 150,
						duration: 0.25
					}
					}
				]
				});
		});
</script>
	<?php get_footer() ?>
</div>