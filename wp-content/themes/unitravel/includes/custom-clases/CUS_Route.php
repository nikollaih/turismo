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
    }

}