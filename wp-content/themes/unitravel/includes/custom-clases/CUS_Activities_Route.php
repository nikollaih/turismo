<?php
class CUS_Activities_Route {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'activities_route';
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
            array('id_activities_route' => $id)
        );
        return $id;
    }

    public function find($id_activities_route){
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE id_activities_route = %d", $id_activities_route);
        return $wpdb->get_row($query, ARRAY_A);
    }

    public function get_all_by_route($id_route){
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name ar LEFT JOIN cus_companies cc ON cc.id_cus_company = ar.activity_location WHERE ar.id_route = %d ORDER BY ar.activity_order ASC", $id_route);
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function delete($id_activities_route, $field = "id_activities_route"){
        global $wpdb;
        // Perform the delete operation
        $deleted = $wpdb->delete($this->table_name, array($field => $id_activities_route), array('%s', '%d'));

        return $deleted;
    }
}