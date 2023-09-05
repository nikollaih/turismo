<?php
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

        if (count($administrators) == 1 && $administrators[0] == $user_id) return false; else return true;
    }

    public function set_collaborators($collaborators) {
        $this->collaborators = $collaborators;
    }
}
