<?php
    function load_file($file, $path, $name) {
        // Crea la carpeta si no existe
        wp_mkdir_p($path);

        $upload_overrides = array('test_form' => false);
        $movefile = wp_handle_upload($file, $upload_overrides);
        // Ruta completa del archivo con el nombre personalizado
        $archivo_destino = $path . $name;

        if ($movefile && !isset($movefile['error'])) {
            // Renombra el archivo una vez que se carga
            rename($movefile['file'], $archivo_destino);

            return $name;
        } else {
            return "";
        }
    }

    function load_profile_image($file, $user_id) {
        if (isset($file['name']) && $user_id) {
            $name = microtime(true).".".get_file_extension($file); // Define el nombre del archivo
            $upload_dir = wp_upload_dir(); // Obtiene la ruta y la URL de la carpeta de subida
            $perfil_folder = trailingslashit($upload_dir['basedir'] . '/profiles/' . $user_id); // Ruta completa de la carpeta de perfil
            return load_file($file, $perfil_folder, $name);
        }
        return "";
    }

    function load_company_image($file, $company_id) {
        if (isset($file['name']) && $company_id) {
            $name = microtime(true).".".get_file_extension($file); // Define el nombre del archivo
            $upload_dir = wp_upload_dir(); // Obtiene la ruta y la URL de la carpeta de subida
            $perfil_folder = trailingslashit($upload_dir['basedir'] . '/companies/' . $company_id); // Ruta completa de la carpeta de perfil
            return load_file($file, $perfil_folder, $name);
        }
        return "";
    }

    function get_file_extension($file) {
        $file_name = $file['name'];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        return $extension;
    }

    function profile_file_exists($user_id, $file){
        $upload_dir = wp_upload_dir();
        $file_path = $upload_dir['basedir'] . '/profiles/' . $user_id . '/' . $file;
        return (file_exists($file_path) && $file);
    }

    function company_file_exists($company_id, $file){
        $upload_dir = wp_upload_dir();
        $file_path = $upload_dir['basedir'] . '/companies/' . $company_id . '/' . $file;
        return (file_exists($file_path) && $file);
    }

    function cus_file_exists($id, $file, $folder){
        $upload_dir = wp_upload_dir();
        $file_path = $upload_dir['basedir'] . '/'.$folder.'/' . $id . '/' . $file;
        return (file_exists($file_path) && $file);
    }

    function get_company_logo($company_id, $file){
        $company_logo = "https://dummyimage.com/1200X750";
        if(company_file_exists($company_id, $file) && $file){
            $upload_dir = wp_upload_dir();
            $company_logo = $upload_dir['baseurl'] . '/companies/' . $company_id . '/' . $file;
        }

        return $company_logo;
    }

    function get_route_logo($id_route, $file){
        $route_logo = "https://dummyimage.com/1200X750";
        if(cus_file_exists($id_route, $file, "routes") && $file){
            $upload_dir = wp_upload_dir();
            $route_logo = $upload_dir['baseurl'] . '/routes/' . $id_route . '/' . $file;
        }

        return $route_logo;
    }

    function get_media_route($id_route, $file){
        $route_logo = "https://dummyimage.com/1200X750";
        $upload_dir = wp_upload_dir();
        $file_path = $upload_dir['basedir'] . '/routes/' . $id_route . '/media/' . $file;
        if (file_exists($file_path) && $file){
            $upload_dir = wp_upload_dir();
            $route_logo = $upload_dir['baseurl'] . '/routes/' . $id_route . '/media/' . $file;
        }

        return $route_logo;
    }

    function get_profile_image($user_id){
        $profile_image = "https://dummyimage.com/700x700";
        $file = get_user_meta($user_id, "wp_profile_image", true);
        if(profile_file_exists($user_id, $file)){
            $upload_dir = wp_upload_dir();
            $profile_image = $upload_dir['baseurl'] . '/profiles/' . $user_id . '/' . $file;
        }

        return $profile_image;
    }
?>
