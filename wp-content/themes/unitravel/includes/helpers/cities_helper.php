<?php
function get_all_cities() {
    require_once get_template_directory().'/includes/custom-clases/CUS_Cities.php';
    $ciudades = new CUS_Cities();
    return $ciudades->get_all();
}

function find_city($id) {
    require_once get_template_directory().'/includes/custom-clases/CUS_Cities.php';
    $ciudad = new CUS_Cities();
    return $ciudad->find($id);
}
?>