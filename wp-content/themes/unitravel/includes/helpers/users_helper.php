<?php
if ( ! function_exists( 'wp_crop_image' ) ) {
    include( ABSPATH . 'wp-admin/includes/image.php' );
}

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

    $data_add = array("user_id" => $user_id, "meta_key" => "phone_number", "meta_value" => $user["phone_number"]);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);

    $data_add = array("user_id" => $user_id, "meta_key" => "biografia", "meta_value" => $user["biografia"]);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);

    $data_add = array("user_id" => $user_id, "meta_key" => "user_company_id", "meta_value" => $company_id);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);

    $data_add = array("user_id" => $user_id, "meta_key" => "user_company_permissions", "meta_value" => $user["permissions"]);
    $saved_user_meta = $user_meta->insert_usermeta($data_add);

    if($do_login)
        do_login($user["email"], $user["pass"], "registro-exitoso");
}

function createProfilePost($profile, $user_id){
    if(isset($profile["profile_image"]) && !empty($profile["profile_image"])){
        // Obtener información sobre el directorio de uploads
        $upload_dir = wp_upload_dir();

        // Ruta completa al directorio de uploads
        $ruta_uploads = $upload_dir['basedir'];

        // Ruta completa a tu imagen dentro del directorio de uploads
        $ruta_imagen = $ruta_uploads . '/profiles/'.$user_id."/".$profile["profile_image"];

        // Preparar datos para la imagen adjunta
        $datos_adjunto = array(
            'guid'           => $ruta_imagen,
            'post_mime_type' => 'image/jpeg',
            'post_title'     => $profile["display_name"],
            'post_content'   => '',
            'post_status'    => 'inherit',
        );

        // Insertar la imagen adjunta
        $id_adjunto = wp_insert_attachment($datos_adjunto, $ruta_imagen);

        // Generar metadatos de la imagen y actualizar el registro en la base de datos
        $metadatos_adjunto = wp_generate_attachment_metadata($id_adjunto, $ruta_imagen);
        wp_update_attachment_metadata($id_adjunto, $metadatos_adjunto);
    }
    
    // Create post data
    $post_data = array(
        'post_title'    => $profile["display_name"],
        'post_content'  => $profile["biografia"],
        'post_status'   => 'publish',
        'post_author'   => $user_id, // Use the author's user ID
        'post_type' => "cpt_testimonials", // Use category IDs
    );

    // Insertar el post en la base de datos
    $id_post = wp_insert_post($post_data);
    update_post_meta($id_post, "trx_addons_options", array("subtitle" => ""));

    if(isset($profile["profile_image"])){
        // Asignar la imagen adjunta como miniatura del post
        set_post_thumbnail($id_post, $id_adjunto);
    }

    // Check if the post was successfully created
    return array("post_id" => $id_post, "attachment_id" => $id_adjunto); 
}

function updateProfilePost($profile, $user_id){
        // ID del autor que quieres modificar

        // Obtener posts del autor
        $args = array(
            'author'      => $user_id,
            'post_type'   => 'cpt_testimonials', // Puedes ajustar esto según el tipo de post que estás modificando
        );

        $post = get_posts($args);

        if (count($post) > 0) {
            // Nuevos datos para el post
            $nuevos_datos_post = array(
                'ID'           => $post[0]->ID,
                'post_title'    => $profile["display_name"],
                'post_content'  => $profile["biografia"],
            );

            // Actualizar el post
            wp_update_post($nuevos_datos_post);
            update_post_meta($post[0]->ID, "trx_addons_options", array("subtitle" => ""));

            if(isset($profile["profile_image"]) && !empty($profile["profile_image"])){
                // Obtener el ID de la imagen adjunta
                $attachment_id = get_post_thumbnail_id($post[0]->ID);

                // Obtener información sobre el directorio de uploads
                $upload_dir = wp_upload_dir();

                // Ruta completa al directorio de uploads
                $ruta_uploads = $upload_dir['basedir'];

                // Ruta completa a tu imagen dentro del directorio de uploads
                $ruta_imagen = $ruta_uploads . '/profiles/'.$user_id."/".$profile["profile_image"];

                if(!$attachment_id){
                    // Preparar datos para la imagen adjunta
                    $datos_adjunto = array(
                        'guid'           => $ruta_imagen,
                        'post_mime_type' => 'image/jpeg',
                        'post_title'     => $profile["display_name"],
                        'post_content'   => '',
                        'post_status'    => 'inherit',
                        'post_parent'    => $post[0]->ID
                    );

                    // Insertar la imagen adjunta
                    $attachment_id = wp_insert_attachment($datos_adjunto, $ruta_imagen);
                }

                // Generar metadatos de la imagen y actualizar el registro en la base de datos
                $metadatos_adjunto = wp_generate_attachment_metadata($attachment_id, $ruta_imagen);
                wp_update_attachment_metadata($attachment_id, $metadatos_adjunto);

                if(!$attachment_id){
                    // Asignar la imagen adjunta como miniatura del post
                    set_post_thumbnail($id_post, $attachment_id);
                }
            } 
        }
        else {
            createProfilePost($profile, $user_id);
        } 
}