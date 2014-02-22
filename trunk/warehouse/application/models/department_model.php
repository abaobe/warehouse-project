<?php

class Department_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    function get_departments_names() {
        return $this->DBObject->readCursor("department_actions.get_depatments_names", null);
    }
    
    function get_department_inventory() {
        return $this->DBObject->readCursor("department_actions.get_department_inventory", null);
    }
    
    function add_department($data) {
        $params = array(array('name' => ':department_name', 'value' => &$data['department_name']),
                        array('name' => ':address', 'value' => &$data['address']),
                        array('name' => ':phone', 'value' => &$data['phone']),
                        array('name' => ':notes', 'value' => &$data['notes']),
                        array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := department_actions.add_department(:department_name,:address,:phone,:notes); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }

}

/* End of file category_model.php */