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
            $data
        );

        return $wpdb->insert_id;
    }

    public function get_company_by_param($param, $value) {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM $this->table_name WHERE $param = '$value'");
        return $wpdb->get_results($query, ARRAY_A);
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
            array('id_cus_company' => $id)
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

    public function generateSlug($company_name){
        $company_name = strtolower($company_name);
        $company_name_slug = str_replace(" ", "_", $company_name);

        $exists_company_slug = $this->get_company_by_param("cus_company_slug", $company_name_slug);
        if(count($exists_company_slug) > 0) $company_name_slug.="_".count($exists_company_slug);
        
        return $company_name_slug;
    }
}

?>