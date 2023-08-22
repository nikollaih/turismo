<?php
class CUS_Route {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'routes';
    }

    public function insert_routes($data){

        global $wpdb;
        $route_id = $wpdb->insert($this->table_name,$data);
        print_r($wpdb->last_error);
        if (!is_wp_error($route_id)) {
            return $route_id;
        } else {
            return false;
        }
    }

}