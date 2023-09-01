<?php
class CUS_Cities {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = 'cus_cities';
    }

    public function get_all() {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $this->table_name");
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function find($id) {
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE city_id = $id");
        return $wpdb->get_row($query, ARRAY_A);
    }
}
