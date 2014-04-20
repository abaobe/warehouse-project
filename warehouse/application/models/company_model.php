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
            array('name' => ':fax_number', 'value' => &$data['fax_number']),
            array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := company_actions.add_company(:company_name,:license_number,:telephone,:mobile,:address,:fax_number); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }

    function get_companies_id_name() {
        return $this->DBObject->readCursor("company_actions.get_companies_id_name", null);
    }
    
    function get_all_companies() {
        return $this->DBObject->readCursor("company_actions.get_all_companies", null);
    }
    
    function update_company($company_info) {
        $params = array(
            array('name' => ':company_id', 'value' => $company_info['company_id']),
            array('name' => ':company_name', 'value' => $company_info['company_name']),
            array('name' => ':license_number', 'value' => &$company_info['license_number']),
            array('name' => ':telephone', 'value' => &$company_info['telephone']),
            array('name' => ':mobile', 'value' => &$company_info['mobile']),
            array('name' => ':address', 'value' => &$company_info['address']),
            array('name' => ':fax_number', 'value' => &$company_info['fax_number']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := company_actions.update_company(:company_id,:company_name,:license_number,:telephone,:mobile,:address,:fax_number); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
    
    function get_company_byID($data) {
        $params[0] = array('name' => ':company_id', 'value' => &$data['company_id']);
        return $this->DBObject->readCursor("company_actions.get_company_byID(:company_id)", $params);
    }
    
    function delete_company($company_info) {
        $params = array(
            array('name' => ':company_id', 'value' => $company_info['company_id']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := company_actions.delete_company(:company_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
}

/* End of file company_model.php */