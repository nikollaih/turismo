<?php
class CUS_Route {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'routes';
    }

    public function insert($data){
        global $wpdb;
        $wpdb->insert($this->table_name,$data);
        return $wpdb->insert_id;
    }

    public function update($id, $data) {
        global $wpdb;
        $wpdb->update(
            $this->table_name,
            $data,
            array('id_route' => $id)
        );
        return $id;
    }

    public function find($id_route){
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE id_route = %d", $id_route);
        return $wpdb->get_row($query, ARRAY_A);
    }

    public function get_all_by_company($company_id){
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE company_id = %d", $company_id);
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function get_all_by_city($city_id){
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name as r JOIN cus_companies as cc ON r.company_id = cc.id_cus_company WHERE cc.cus_company_city = %d", $city_id);
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function get_all(){
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name wr JOIN cus_companies cc ON wr.company_id = cc.id_cus_company JOIN cus_cities cci ON cc.cus_company_city = cci.city_id");
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function delete($value, $field = "id_route"){
        global $wpdb;
        // Perform the delete operation
        $deleted = $wpdb->delete($this->table_name, array($field => $value), array('%s', '%d'));
        return $deleted;
    }

    public function get_all_collaborator($company_id){
        global $wpdb;
        $query = $wpdb->prepare("SELECT r.*, cc.cus_company_name FROM $this->table_name r LEFT JOIN wp_activities_route ar ON ar.id_route = r.id_route JOIN cus_companies cc ON cc.id_cus_company = r.company_id WHERE ar.activity_location = %d AND r.company_id != %d GROUP BY r.id_route", $company_id, $company_id);
        return $wpdb->get_results($query, ARRAY_A);
    }
}