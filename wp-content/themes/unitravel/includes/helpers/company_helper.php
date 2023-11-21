<?php
require_once get_theme_file_path("includes/custom-clases/CUS_Companies.php");

function cus_get_company($user_id){
    $company_id = get_user_meta($user_id, "user_company_id", true );
    $company = new CUS_Companies();
    $company_data = $company->get_company_by_param("id_cus_company", $company_id);
    return (count($company_data) > 0) ? $company_data[0] : false;
}

function cus_get_company_id($id_company) {
    require_once get_template_directory().'/includes/custom-clases/CUS_Companies.php';
    $companies = new CUS_Companies();
    return $companies->get_company_by_param('id_cus_company',$id_company);
}
function cus_get_companies_all($city_id) {
    require_once get_template_directory().'/includes/custom-clases/CUS_Companies.php';
    $companies = new CUS_Companies();
    return $companies->get_company_by_param('cus_company_city',$city_id);
}