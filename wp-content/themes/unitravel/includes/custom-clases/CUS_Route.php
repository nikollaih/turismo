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

    public function delete($value, $field = "id_route"){
        global $wpdb;
        // Perform the delete operation
        $deleted = $wpdb->delete($this->table_name, array($field => $value), array('%s', '%d'));

        return $deleted;
    }
}