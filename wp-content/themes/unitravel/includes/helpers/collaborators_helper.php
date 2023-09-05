<?php
function get_company_collaborators($company_id) {
    require_once get_template_directory().'/includes/custom-clases/CUS_Collaborators.php';
    $collaborators = new CUS_Collaborators();
    return $collaborators->get_all($company_id);
}