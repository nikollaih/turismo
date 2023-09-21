<?php

    require_once get_theme_file_path("includes/custom-clases/CUS_Companies.php");

    class CUS_Controller_Company {
        private $collaborators;

        public function __construct() {
            
        }

        public function getFormatedCompanyArray($company){
            $company_class = new CUS_Companies();
            $slug = ($company["id_company"]) ? "" : $company_class->generateSlug($company["name"]);
        
            // Datos del nuevo emprendimiento
            $new_company = array(
                'cus_company_name' => $company["name"],
                'cus_company_slug' => $slug,
                'cus_company_web' => $company["web"],
                'cus_company_city' => $company["city"],
                'cus_company_whatsapp' => $company["whatsapp"],
                'cus_company_address' => $company["address"],
                'cus_company_latitude' => $company["latitude"],
                'cus_company_longitude' => $company["longitude"],
                'cus_company_short_description' => $company["short_description"]
            );

            if($company["id_company"]){
                unset($new_company['cus_company_slug']);
            }
            return $new_company;
        }
    }
