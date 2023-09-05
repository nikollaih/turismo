<?php
function getFormatedUserArray($user){
    // Datos del nuevo usuario
    return array(
        'user_login' => $user["email"],
        'user_login' => $user["document"],
        'user_pass' => $user["pass"],
        'user_nicename' => $user["fullname"],
        'user_email' => $user["email"],
        'user_url' => "",
        'user_activation_key' => '',
        'user_status' => 1,
        'display_name' => $user["fullname"]
    );
}

function registerUserMeta($user_id, $user, $company_id, $do_login = true){
    $user_meta = new CUS_UserMeta();
    $user_meta_capabilities = $user_meta->get_usermeta_by_key($user_id, "wp_capabilities");

    $data_update = array("user_id" => $user_id, "meta_key" => "wp_capabilities", "meta_value" => serialize([$user["rol"]]));
    $updated_user_meta = $user_meta->update_usermeta($data_update);

    $data_update = array("user_id" => $user_id, "meta_key" => "wp_profile_image", "meta_value" => $user["profile_image"]);
    $updated_user_meta = $user_meta->update_usermeta($data_update);

    $data_add = array("user_id" => $user_id, "meta_key" => "document_number", "meta_value" => $user["document"]);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);

    $data_add = array("user_id" => $user_id, "meta_key" => "user_company_id", "meta_value" => $company_id);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);

    $data_add = array("user_id" => $user_id, "meta_key" => "user_company_permissions", "meta_value" => $user["permissions"]);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);

    if($do_login)
        do_login($user["email"], $user["pass"], "registro-exitoso");
}