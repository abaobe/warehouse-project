<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    function get_all_roles() {
        return $this->DBObject->readCursor("user_actions.get_all_roles", null);
    }

    function do_add_user($user_info) {
        $params = array(
            array('name' => ':first_name', 'value' => $user_info['first_name']),
            array('name' => ':middle_name', 'value' => &$user_info['middle_name']),
            array('name' => ':last_name', 'value' => &$user_info['last_name']),
            array('name' => ':employee_number', 'value' => &$user_info['employee_number']),
            array('name' => ':username', 'value' => &$user_info['username']),
            array('name' => ':password', 'value' => &$user_info['password']),
            array('name' => ':phone_number', 'value' => &$user_info['phone_number']),
            array('name' => ':mobile_number', 'value' => &$user_info['mobile_number']),
            array('name' => ':department_id', 'value' => &$user_info['department_id']),
            array('name' => ':user_role', 'value' => &$user_info['user_role']),
            array('name' => ':email_address', 'value' => &$user_info['email_address']),
            array('name' => ':user_picture', 'value' => &$user_info['user_picture']),
            array('name' => ':account_status', 'value' => &$user_info['account_status']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := user_actions.add_user(:first_name,:middle_name,:last_name,:employee_number,:username,:password,:phone_number,:mobile_number,:department_id,:user_role,:email_address,:user_picture,:account_status); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
    
    function do_update_user($user_info) {
        $params = array(
            array('name' => ':user_id', 'value' => $user_info['user_id']),
            array('name' => ':first_name', 'value' => $user_info['first_name']),
            array('name' => ':middle_name', 'value' => &$user_info['middle_name']),
            array('name' => ':last_name', 'value' => &$user_info['last_name']),
            array('name' => ':employee_number', 'value' => &$user_info['employee_number']),
            array('name' => ':username', 'value' => &$user_info['username']),
            array('name' => ':password', 'value' => &$user_info['password']),
            array('name' => ':phone_number', 'value' => &$user_info['phone_number']),
            array('name' => ':mobile_number', 'value' => &$user_info['mobile_number']),
            array('name' => ':department_id', 'value' => &$user_info['department_id']),
            array('name' => ':user_role', 'value' => &$user_info['user_role']),
            array('name' => ':email_address', 'value' => &$user_info['email_address']),
            array('name' => ':user_picture', 'value' => &$user_info['user_picture']),
            array('name' => ':account_status', 'value' => &$user_info['account_status']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := user_actions.update_user(:user_id,:first_name,:middle_name,:last_name,:employee_number,:username,:password,:phone_number,:mobile_number,:department_id,:user_role,:email_address,:user_picture,:account_status); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
    
    function get_users($fields) {
        $params[0] = array('name' => ':fields', 'value' => &$fields);
        return $this->DBObject->readCursor("user_actions.get_users(:fields)", $params);
    }
    
    function get_user_byID($user_id) {
        $params[0] = array('name' => ':user_id', 'value' => &$user_id);
        return $this->DBObject->readCursor("user_actions.get_user_byID(:user_id)", $params);
    }

    function delete_user($user_info) {
        $params = array(
            array('name' => ':user_id', 'value' => $user_info['user_id']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := user_actions.delete_user(:user_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
}

/* End of file user_model.php */