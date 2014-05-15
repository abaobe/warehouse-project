<?php

class Department_model extends CI_Model {

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
     * get_departments_id_name
     * 
     * function get departments ids,names from the database and parse 
     * it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_departments_id_name() {
        return $this->DBObject->readCursor("department_actions.get_depatments_id_name", null);
    }

    /**
     * get_all_departments
     * 
     * function get departments infroamtions from the database by calling pl/sql
     * function and parse it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_all_departments() {
        return $this->DBObject->readCursor("department_actions.get_all_departments", null);
    }

    /**
     * get_department_ById
     * 
     * function get department information depends on department id
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function get_department_ById($department_id) {
        $params[0] = array('name' => ':department_id', 'value' => &$department_id);
        return $this->DBObject->readCursor("department_actions.get_department_ById(:department_id)", $params);
    }

    /**
     * get_department_inventory
     * 
     * function get all products depends on department id
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function get_department_inventory($data) {
        $params = array(array('name' => ':departmentID', 'value' => &$data['department_id']),
            array('name' => ':start_date', 'value' => &$data['start_date']),
            array('name' => ':end_date', 'value' => &$data['end_date']));
        return $this->DBObject->readCursor("department_actions.get_department_inventory(:departmentID,:start_date,:end_date)", $params);
    }

    /**
     * add_department
     * 
     * function takes department information from the controller and parse 
     * it to pl/sql function add_department to store it into database 
     * and return number have transaction status
     * 
     * @access public
     * @return number
     */
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

    /**
     * update_department
     * 
     * function takes department infroamtions from the controller function and
     * parse it to pl/sql update_department function and return transaction status
     * 
     * @access public
     * @return number
     */
    function update_department($data) {
        $params = array(array('name' => ':department_id', 'value' => &$data['department_id']),
            array('name' => ':department_name', 'value' => &$data['department_name']),
            array('name' => ':address', 'value' => &$data['address']),
            array('name' => ':phone', 'value' => &$data['phone']),
            array('name' => ':mobile', 'value' => &$data['mobile']),
            array('name' => ':fax', 'value' => &$data['fax']),
            array('name' => ':parent_id', 'value' => &$data['parent_id']),
            array('name' => ':notes', 'value' => &$data['notes']),
            array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := department_actions.update_department(:department_id,:department_name,:address,:phone,:mobile,:fax,:parent_id,:notes); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }

    /**
     * delete_department
     * 
     * function recieve department id from controller and parse it 
     * to pl/sql function to delete department
     * 
     * @access public
     * @return number
     */
    function delete_department($department_info) {
        $params = array(
            array('name' => ':department_id', 'value' => $department_info['department_id']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := department_actions.delete_department(:department_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }

}

/* End of file department_model.php */