<?php

class Company_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }
    
    function add_company($data) {
        $params = array(array('name' => ':company_name', 'value' => &$data['company_name']),
            array('name' => ':license_number', 'value' => &$data['license_number']),
            array('name' => ':telephone', 'value' => &$data['telephone']),
            array('name' => ':mobile', 'value' => &$data['mobile']),
            array('name' => ':address', 'value' => &$data['address']),
            array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := company_actions.add_company(:company_name,:license_number,:telephone,:mobile,:address); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }

    function get_companies_id_name() {
        return $this->DBObject->readCursor("company_actions.get_companies_id_name", null);
    }
}

/* End of file company_model.php */