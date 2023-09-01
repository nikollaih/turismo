<?php
/*
Template Name: Collaborators
*/

include get_theme_file_path("page-templates/utilities.php");
include get_theme_file_path("page-templates/current_user_company_data.php");
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
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo electrónico</th>
                                            <th scope="col">Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><?= $current_user->display_name ?></td>
                                            <td>nikollaihernandez@gmail.com</td>
                                            <td>Administrador</td>
                                        </tr>
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