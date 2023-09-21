<div class="col-md-4 col-sm-12">
    <div class="text-center position-relative pb-5 column-perfil-routes" >
        <img src="<?= $profile_image ?>" alt="avatar" class="img-perfil-routes rounded-circle img-fluid">
        
        <div class="justify-content-center mt-5 mb-5">
            <h5 class="my-0 mx-4 mb-0 h5-green"><?= $company["cus_company_name"] ?></h5>
            <p class="text-muted"><?= $city["city_name"] ?></p>
        </div>
        <div class="justify-content-center mb-3">
            <a href="<?php echo home_url() . '/modificar-cuenta'; ?>" class="btn btn-routes-primary ms-1">ADMINISTRAR</a>
        </div>

        <div class="justify-content-center mt-5 pt-5">
            <h6 class="my-0 mb-3 h5-green">MIS EXPERIENCIAS TURISTICAS</h6>

            <div class="justify-content-center mb-3">
                <a href="<?php echo home_url() . '/mis-rutas'; ?>" class="btn btn-routes-primary ms-1">ADMINISTRAR</a>
            </div>
        </div>
        <div class=" mt-3 pt-3">
        
        </div>
        <div class=" justify-content-center mt-5 mb-5 ">
            <h6 class="my-0 mb-3 h5-green">COLABORADORAS</h6>

            <div class="justify-content-center mb-3">
            <a href="<?php echo home_url() . '/colaboradoras'; ?>" class="btn btn-routes-primary ms-1">ADMINISTRAR</a>
            </div>
        </div>
        
    </div>
</div>