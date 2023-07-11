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

        $wpdb->update(
            $this->table_name,
            $data,
            array('ID' => $id),
            array(
                '%s', // user_login
                '%s', // user_pass
                '%s', // user_nicename
                '%s', // user_email
                '%s', // user_url
                '%s', // user_activation_key
                '%d', // user_status
                '%s'  // display_name
            ),
            array('%d') // ID data type
        );
    }

    public function delete_user($id) {
        global $wpdb;

        $wpdb->delete(
            $this->table_name,
            array('ID' => $id),
            array('%d') // ID data type
        );
    }
}
