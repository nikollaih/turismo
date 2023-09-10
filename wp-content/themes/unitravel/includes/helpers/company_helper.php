<?php
require_once get_theme_file_path("includes/custom-clases/CUS_Companies.php");

function cus_get_company($user_id){
    $company = new CUS_Companies();
    $company_data = $company->get_company_by_param("id_user", $user_id);
    return (count($company_data) > 0) ? $company_data[0] : false;
}

function cus_get_companies_all($city_id) {
    require_once get_template_directory().'/includes/custom-clases/CUS_Companies.php';
    $companies = new CUS_Companies();
    return $companies->get_company_by_param('cus_company_city',$city_id);
}