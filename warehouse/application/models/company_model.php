<?php

class Company_model extends CI_Model {

    /**
     * Constructor
     * 
     * Automatically load libraries needed in this controler
     *
     * @access public
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    /**
     * add_company
     * 
     * function takes company information from the controller and parse 
     * it to pl/sql function add_company to store it into database 
     * and return number have transaction status
     * 
     * @access public
     * @return number
     */
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

    /**
     * get_companies_id_name
     * 
     * function get company ids,names from the database and parse 
     * it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_companies_id_name() {
        return $this->DBObject->readCursor("company_actions.get_companies_id_name", null);
    }

    /**
     * get_all_companies
     * 
     * function get companies infroamtions from the database by calling pl/sql
     * function and parse it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_all_companies($i_search, $i_start_index, $i_end_index) {
        $params = array(array("name" => ":i_search", "value" => &$i_search),
            array("name" => ":i_start_index", "value" => &$i_start_index),
            array("name" => ":i_end_index", "value" => &$i_end_index)
        );
        return $this->DBObject->readCursor("company_actions.get_all_companies(:i_search,:i_start_index,:i_end_index)", $params);
    }

    /**
     * update_company
     * 
     * function takes companies infroamtions from the controller function and
     * parse it to pl/sql update_company function and return transaction status
     * 
     * @access public
     * @return number
     */
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

    /**
     * get_company_byID
     * 
     * function get company information depends on company id
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function get_company_byID($data) {
        $params[0] = array('name' => ':company_id', 'value' => &$data['company_id']);
        return $this->DBObject->readCursor("company_actions.get_company_byID(:company_id)", $params);
    }

    /**
     * delete_company
     * 
     * function recieve company id from controller and parse it 
     * to pl/sql function to delete company
     * 
     * @access public
     * @return number
     */
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

    function get_companies_count($searchKey) {
        $params = array(
            array('name' => ':i_seach', 'value' => &$searchKey),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := company_actions.get_companies_count(:i_seach); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }

    function get_companyName_by_id($company_id) {
        
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "BEGIN :v_Return := company_actions.get_companyName_by_id(:comp_id); END;");
        oci_bind_by_name($stmt, ':comp_id', $company_id);
        oci_bind_by_name($stmt, ':v_Return', $result, 32);

        if (!oci_execute($stmt)) {
            return oci_error($stmt);
        }
        return $result;
    }
    
}
/* End of file company_model.php */