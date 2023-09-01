<?php
require_once(ABSPATH . 'wp-blog-header.php');

function do_login($user, $password, $redirectTo = "perfil"){
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