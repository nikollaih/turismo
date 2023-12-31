<?php
/*
Template Name: Collaborators
*/
    include get_theme_file_path("page-templates/shorcuts/_overlay_loading.php");
    include get_theme_file_path("page-templates/utilities.php");
    include get_theme_file_path("page-templates/current_user_company_data.php");
    require_once get_theme_file_path("includes/custom-clases/controllers/CUS_Controller_Collaborators.php");

    // Obtiene la lista de colaboradoras del sitio
    $collaborators = new CUS_Controller_Collaborators();
    $collaborators_list = $collaborators->get_collaborators($company["id_cus_company"]);
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
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                        if (!empty($success_message)) {
                                            echo '<div class="alert alert-success" role="alert">' . esc_html($success_message) . '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= home_url() ?>/mi-cuenta">
                                        <button class="btn btn-secondary mb-2"><i class="fa-solid fa-arrow-left mr-2"></i>Regresar</button>
                                    </a>
                                    
                                </div>
                                <?php
                                    if(check_is_admin($current_user, $company["id_cus_company"])){
                                        ?>
                                        <div class="col text-right">
                                            <a href="<?= home_url() ?>/agregar-colaboradora">
                                                <button class="btn btn-primary mb-2"><i class="fa-solid fa-plus mr-2"></i>Agregar Colaboradora</button>
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
                                            <th scope="col">Teléfono</th>
                                            <th scope="col">Correo electrónico</th>
                                            <th scope="col">Rol</th>
                                            <?php
                                                if(check_is_admin($current_user, $company["id_cus_company"])){
                                                    ?>
                                                        <th scope="col"></th>
                                                    <?php
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(count($collaborators_list) > 0){
                                                for ($i=1; $i < count($collaborators_list) + 1; $i++) { 
                                                    $collaborator = $collaborators_list[$i-1];
                                                    ?>
                                                        <tr id="<?= $collaborator["ID"] ?>">
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><img src="<?= get_profile_image($collaborator["ID"]) ?>" alt="" srcset="" style="width:50px;height:50px;border-radius:50%;"></td>
                                                            <td><?= $collaborator["display_name"] ?></td>
                                                            <td><?= $collaborator["phone_number"] ?></td>
                                                            <td><?= $collaborator["user_email"] ?></td>
                                                            <td>
                                                                <?php
                                                                    if(check_is_admin($current_user, $company["id_cus_company"])){
                                                                        ?>
                                                                        <select name="" id="" class="collaborator-select">
                                                                            <option <?= ($collaborator["user_company_permissions"] == "admin") ? "selected" : ""  ?> value="admin">Administradora</option>
                                                                            <?php
                                                                                if(count($collaborators_list) > 1) { ?>
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
                                                                <?php
                                                                    if(check_is_admin($current_user, $company["id_cus_company"])){
                                                                        ?>
                                                                        <td>
                                                                            <button user_id="<?= $collaborator["ID"] ?>" class="btn btn-danger collaborator-delete">Eliminar</button>
                                                                        </td>
                                                                        <?php
                                                                    }
                                                                ?>
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