<?php
class CUS_UserMeta {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'usermeta';
    }

    public function insert_usermeta($data) {
        $user_id = add_user_meta($data["user_id"], $data["meta_key"], $data["meta_value"]);

        if ($user_id) {
            return $user_id;
        } else {
            return false;
        }
    }

    public function get_usermeta_by_param($key, $value) {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE meta_key = '$key' AND meta_value = '$value'");
        return $wpdb->get_row($query, ARRAY_A);
    }

    public function get_usermeta_by_key($user_id, $meta_key) {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE meta_key = '$meta_key' AND user_id = '$user_id'");
        return $wpdb->get_row($query, ARRAY_A);
    }

    public function update_usermeta($data) {
        // Actualizar el usermeta
        update_user_meta($data["user_id"], $data["meta_key"], $data["meta_value"]);
    }

    public function delete_usermeta($id) {
        global $wpdb;

        $wpdb->delete(
            $this->table_name,
            array('umeta_id' => $id),
            array('%d') // umeta_id data type
        );
    }

    public function get_users_historias() {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $this->table_name um JOIN wp_users u ON um.user_id = u.ID WHERE um.meta_key = 'historia'");
        return $wpdb->get_results($query, ARRAY_A);
    }
}
