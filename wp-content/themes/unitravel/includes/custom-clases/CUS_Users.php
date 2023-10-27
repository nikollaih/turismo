<?php
class CUS_Users {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'users';
    }

    public function insert_user($data) {
        $user_id = wp_insert_user($data);

        if (!is_wp_error($user_id)) {
            return $user_id;
        } else {
            return false;
        }
    }

    public function get_user_by_param($param, $value) {
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE $param = '$value'");
        return $wpdb->get_row($query, ARRAY_A);
    }

    public function update_user($id, $data) {
        global $wpdb;
        return $wpdb->update(
            $this->table_name,
            $data,
            array('ID' => $id)
        );
    }

    public function delete($id) {
        global $wpdb;
        return $wpdb->delete(
            $this->table_name,
            array('ID' => $id),
            array('%d') // ID data type
        );
    }
}
