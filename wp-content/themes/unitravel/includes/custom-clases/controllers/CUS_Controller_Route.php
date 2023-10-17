<?php

    require_once get_theme_file_path("includes/custom-clases/CUS_Route.php");

    class CUS_Controller_Route {

        public function __construct() {
            
        }

        function load_image($file, $route_id) {
            if (isset($file['name']) && $route_id) {
                $name = microtime(true).".".get_file_extension($file); // Define el nombre del archivo
                $upload_dir = wp_upload_dir(); // Obtiene la ruta y la URL de la carpeta de subida
                $perfil_folder = trailingslashit($upload_dir['basedir'] . '/routes/' . $route_id); // Ruta completa de la carpeta de perfil
                return load_file($file, $perfil_folder, $name);
            }
            return "";
        }

        function load_itinerario($file, $route_id) {
            if (isset($file['name']) && $route_id) {
                $name = microtime(true).".".get_file_extension($file); // Define el nombre del archivo
                $upload_dir = wp_upload_dir(); // Obtiene la ruta y la URL de la carpeta de subida
                $perfil_folder = trailingslashit($upload_dir['basedir'] . '/routes/' . $route_id . '/itinerario'); // Ruta completa de la carpeta de perfil
                return load_file($file, $perfil_folder, $name);
            }
            return "";
        }
    }
