<?php

class Department_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    function get_departments_id_name() {
        return $this->DBObject->readCursor("department_actions.get_depatments_id_name", null);
    }

    function get_department_inventory($data) {
        $params = array(array('name' => ':departmentID', 'value' => &$data['department_id']),
            array('name' => ':start_date', 'value' => &$data['start_date']),
            array('name' => ':end_date', 'value' => &$data['end_date']));
        return $this->DBObject->readCursor("department_actions.get_department_inventory(:departmentID,:start_date,:end_date)", $params);
    }

    function add_department($data) {
        $params = array(array('name' => ':department_name', 'value' => &$data['department_name']),
            array('name' => ':address', 'value' => &$data['address']),
            array('name' => ':phone', 'value' => &$data['phone']),
            array('name' => ':mobile', 'value' => &$data['mobile']),
            array('name' => ':fax', 'value' => &$data['fax']),
            array('name' => ':parent_id', 'value' => &$data['parent_id']),
            array('name' => ':notes', 'value' => &$data['notes']),
            array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := department_actions.add_department(:department_name,:address,:phone,:mobile,:fax,:parent_id,:notes); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }

}

/* End of file department_model.php */