<?php

class Service_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    function add_service($service_info) {
        $params = array(
            array('name' => ':service_name', 'value' => $service_info['service_name']),
            array('name' => ':provided_by', 'value' => $service_info['provided_by']),
            array('name' => ':billing', 'value' => &$service_info['billing_id']),
            array('name' => ':service_cost', 'value' => &$service_info['cost']),
            array('name' => ':currency_type', 'value' => &$service_info['currency_type']),
            array('name' => ':notes', 'value' => &$service_info['notes']),
            array('name' => ':received_date', 'value' => &$service_info['received_date']),
            array('name' => ':insert_number', 'value' => &$service_info['insert_number']),
            array('name' => ':quantity', 'value' => &$service_info['quantity']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := service_actions.add_service(:service_name,:provided_by,:billing,:service_cost,:currency_type,:notes,:received_date,:insert_number,:quantity); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }
    
    function delete_many_services($vouchers_ids){
        echo ">>".$vouchers_ids;
        $params = array(array('name' => ':vouchers_ids', 'value' => &$vouchers_ids),
            array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := service_actions.delete_many_services(:vouchers_ids); end;");

        foreach ($params as $variable)
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

        oci_execute($stmt);
        return $result;
    }
    
}

/* End of file category_model.php */