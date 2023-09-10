<?php

    require_once get_theme_file_path("includes/custom-clases/CUS_UserMeta.php");

    class CUS_Controller_User {
        private $collaborators;

        public function __construct() {
            
        }

        public function getFormatedEditUserArray($user){
            $company_class = new CUS_Companies();
        
            // Datos del nuevo usuario
            return array(
                'user_nicename' => $user["fullname"],
                'user_email' => $user["email"],
                'user_status' => 1,
                'display_name' => $user["fullname"]
            );
        }

        public function update_user_meta($user_id, $meta){
            $user_meta = new CUS_Usermeta();

            foreach ($meta as $key => $value) {
                $data_update = array("user_id" => $user_id, "meta_key" => $key, "meta_value" => $value);
                $updated_user_meta = $user_meta->update_usermeta($data_update);
            }
        }
    }
