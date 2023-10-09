<?php
require_once(ABSPATH . 'wp-blog-header.php');

function do_login($user, $password, $redirectTo = "mi-cuenta"){
    $credentials = array(
        'user_login'    => $user,
        'user_password' => $password,
        'remember'      => true
    );
    
    $user = wp_signon($credentials, false);

    if (!is_wp_error($user)) {
        header("Location: ".site_url('/'.$redirectTo));
    }
}

function cus_get_current_user() {
    $current_user = wp_get_current_user();
    if ($current_user->ID === 0) {
        // No hay usuario logueado
        return false;
    } else {
        $current_user->document_number = get_user_meta($current_user->ID, "document_number", true );
        $current_user->company_id = get_user_meta($current_user->ID, "user_company_id", true );
        $current_user->company_permissions = get_user_meta($current_user->ID, "user_company_permissions", true );
        $current_user->biografia = get_user_meta($current_user->ID, "biografia", true );

        // Usuario logueado
        return $current_user;
    }
}

function check_user_company_login(){
    $current_user = cus_get_current_user();

    if(!$current_user){
        wp_redirect(site_url());
        exit;
    }

    $company = cus_get_company($current_user->ID);
        if(!$company){
        wp_redirect(site_url());
        exit;
    }
}

function check_is_admin($current_user){
    return ($current_user->company_permissions == "admin");
}

// Verificamos si un usuario pertenece a una finca
function user_belongs_company($id_user, $id_company){
    $found = get_user_meta($id_user, "user_company_id", true);
    return ($found == $id_company);
}