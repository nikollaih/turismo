<?php
class CUS_Companies {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = 'cus_companies';
    }

    public function insert_company($data) {
        global $wpdb;

        $wpdb->insert(
            $this->table_name,
            $data,
            array(
                '%d', // id_cus_company
                '%d', // id_user
                '%s', // cus_company_name
                '%s', // cus_company_web
                '%s', // cus_company_facebook
                '%s', // cus_company_instagram
                '%s', // cus_company_address
                '%f', // cus_company_latitud
                '%f', // cus_company_longitude
                '%s'  // cus_company_description
            )
        );

        return $wpdb->insert_id;
    }

    public function get_company_by_id($id) {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE id_cus_company = %d", $id);
        return $wpdb->get_row($query, ARRAY_A);
    }

    public function get_companies_by_user($user_id) {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE id_user = %d", $user_id);
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function search_companies($search_term) {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE cus_company_name LIKE '%%%s%%'", $search_term);
        return $wpdb->get_results($query, ARRAY_A);
    }

    public function update_company($id, $data) {
        global $wpdb;

        $wpdb->update(
            $this->table_name,
            $data,
            array('id_cus_company' => $id),
            array(
                '%s', // cus_company_name
                '%s', // cus_company_web
                '%s', // cus_company_facebook
                '%s', // cus_company_instagram
                '%s', // cus_company_address
                '%f', // cus_company_latitud
                '%f', // cus_company_longitude
                '%s'  // cus_company_description
            ),
            array('%d') // id_cus_company data type
        );
    }

    public function delete_company($id) {
        global $wpdb;

        $wpdb->delete(
            $this->table_name,
            array('id_cus_company' => $id),
            array('%d') // id_cus_company data type
        );
    }
}

?>