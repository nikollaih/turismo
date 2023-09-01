<?php 
    require_once get_theme_file_path("includes/helpers/index.php");

    check_user_company_login();

    $current_user = cus_get_current_user();
    $company = cus_get_company($current_user->ID);

    $profile_image = get_profile_image($current_user->ID);
    $company_logo = get_company_logo($company["id_cus_company"], $company["cus_company_logo"]);

    $city = find_city($company["cus_company_city"]);
    $cities = get_all_cities();
?>