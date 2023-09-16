<?php
class CUS_Collaborators {
    private $table_name;
    private $table_usermeta;

    public function __construct() {
        global $wpdb;
        $this->table_name = 'wp_users';
        $this->table_usermeta = 'wp_usermeta';
    }

    public function get_all($company_id) {
        global $wpdb;
        $query = $wpdb->prepare("SELECT u.ID, u.user_login, u.user_email, u.display_name, m1.meta_value AS user_company_id, m2.meta_value AS user_company_permissions FROM $this->table_name u INNER JOIN $this->table_usermeta m1 ON u.ID = m1.user_id LEFT JOIN wp_usermeta m2 ON u.ID = m2.user_id AND m2.meta_key = 'user_company_permissions' WHERE m1.meta_key = 'user_company_id' AND m1.meta_value = '$company_id'");
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function find($id) {
        global $wpdb;
        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE city_id = $id");
        return $wpdb->get_row($query, ARRAY_A);
    }
}
