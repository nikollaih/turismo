<?php
require_once get_template_directory().'/includes/custom-clases/CUS_Collaborators.php';

class CUS_Controller_Collaborators {
    private $collaborators;

    public function __construct() {
        $this->collaborators = [];
    }

    public function check_if_possible_collaborator($user_id){
        $administrators = [];

        for ($i=0; $i < count($this->collaborators); $i++) { 
            $collaborator = $this->collaborators[$i];
            if($collaborator["user_company_permissions"] == $_ENV["USER_COMPANY_ADMIN"]){
                array_push($administrators, $collaborator["ID"]);
            }
        }

        if ((count($administrators) == 1 && $administrators[0] == $user_id) || ($this->collaborators != false && count($this->collaborators) == 1)) return false; else return true;
    }

    public function set_collaborators($collaborators) {
        $this->collaborators = $collaborators;
    }

    public function get_collaborators($company_id){
        $collaborators_model = new CUS_Collaborators();
        $collaborators = $collaborators_model->get_all($company_id);

        for ($i=0; $i < count($collaborators); $i++) { 
            $collaborators[$i]["phone_number"] = get_user_meta($collaborators[$i]["ID"], "phone_number", true);
        }

        return $collaborators;
    }
}
