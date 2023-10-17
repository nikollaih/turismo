<?php
class CUS_MediaRoutes {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = 'wp_media_routes';
    }

    public function insert($data) {
        global $wpdb;
        $wpdb->insert(
            $this->table_name,
            $data
        );
        return $wpdb->insert_id;
    }

    public function find($id_media){
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE id_media_route = %d", $id_media);
        return $wpdb->get_row($query, ARRAY_A);
    }

    public function get_by_param($param, $value) {
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE $param = '$value'");
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function update($id, $data) {
        global $wpdb;
        $wpdb->update(
            $this->table_name,
            $data,
            array('id_media_route' => $id)
        );

        return $id;
    }

    public function delete($id) {
        global $wpdb;
        return $wpdb->delete(
            $this->table_name,
            array('id_media_route' => $id),
            array('%d') // id_cus_company data type
        );
    }
}

?>