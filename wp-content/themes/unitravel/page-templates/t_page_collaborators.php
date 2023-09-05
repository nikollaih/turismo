<?php
/*
Template Name: Collaborators
*/
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");

    // Obtiene la lista de colaboradoras del sitio
    $collaborators = get_company_collaborators($company["id_cus_company"]);
    // Obtiene la session falsh en caso de que se haya creado una nueva colaboradora
    $success_message = get_flash_message('success_message');
?>

<div id="custom-page">
    <?php get_header() ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">
        <section id="create-routes">
                <div class="container" style="position: relative;">
                    <div class="row content-profile-one">
                        <div class="col-md-12 col-sm-12">
                            <h3 class="text-center mt-0 "><?= $company["cus_company_name"] ?></h3>
                            <h5 class="text-center mt-0 h5-orange-list-routes">colaboradoras</h5>
                            <dic class="row">
                                <div class="col-md-12">
                                    <?php
                                        if (!empty($success_message)) {
                                            echo '<div class="alert alert-success" role="alert">' . esc_html($success_message) . '</div>';
                                        }
                                    ?>
                                </div>
                            </dic>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= home_url() ?>/mi-cuenta">
                                        <button class="btn btn-secondary mb-2"><i class="fa-solid fa-arrow-left mr-2"></i>Regresar</button>
                                    </a>
                                    
                                </div>
                                <?php
                                    if(check_is_admin($current_user)){
                                        ?>
                                        <div class="col text-right">
                                            <a href="<?= home_url() ?>/agregar-colaboradora">
                                                <button class="btn mb-2"><i class="fa-solid fa-plus mr-2"></i>Agregar Colaboradora</button>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"></th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo electrónico</th>
                                            <th scope="col">Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(count($collaborators) > 0){
                                                for ($i=1; $i < count($collaborators) + 1; $i++) { 
                                                    $collaborator = $collaborators[$i-1];
                                                    ?>
                                                        <tr id="<?= $collaborator["ID"] ?>">
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><img src="<?= get_profile_image($collaborator["ID"]) ?>" alt="" srcset="" style="width:50px;height:50px;border-radius:50%;"></td>
                                                            <td><?= $collaborator["display_name"] ?></td>
                                                            <td><?= $collaborator["user_email"] ?></td>
                                                            <td>
                                                                <?php
                                                                    if(check_is_admin($current_user)){
                                                                        ?>
                                                                        <select name="" id="" class="collaborator-select">
                                                                            <option <?= ($collaborator["user_company_permissions"] == "admin") ? "selected" : ""  ?> value="admin">Administradora</option>
                                                                            <?php
                                                                                if(count($collaborators) > 1) { ?>
                                                                            <option <?= ($collaborator["user_company_permissions"] == "collaborator") ? "selected" : ""  ?> value="collaborator">Colaboradora</option>
                                                                                <?php } ?>
                                                                        </select>
                                                                        <?php
                                                                    }
                                                                    else {
                                                                        echo ($collaborator["user_company_permissions"] == "admin") ? "Administradora" : "Colaboradora";
                                                                    }
                                                                ?>
                                                                
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    </table>
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