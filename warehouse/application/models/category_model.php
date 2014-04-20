<?php

class Category_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    function get_categories_id_name() {
        return $this->DBObject->readCursor("category_actions.get_categories_id_name", null);
    }
    
    function get_all_categories() {
        return $this->DBObject->readCursor("category_actions.get_all_categories", null);
    }
    
    function get_category_byID($data) {
        $params[0] = array('name' => ':category_id', 'value' => &$data['category_id']);
        return $this->DBObject->readCursor("category_actions.get_category_byID(:category_id)", $params);
    }
    
    function add_category($category_info) {
        $params = array(
            array('name' => ':category_name', 'value' => $category_info['category_name']),
            array('name' => ':category_description', 'value' => &$category_info['category_description']),
            array('name' => ':subs', 'value' => &$category_info['subs']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := category_actions.add_category(:category_name,:category_description,:subs); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
    
    function update_category($category_info) {
        $params = array(
            array('name' => ':category_id', 'value' => $category_info['category_id']),
            array('name' => ':category_name', 'value' => $category_info['category_name']),
            array('name' => ':category_description', 'value' => &$category_info['category_description']),
            array('name' => ':parent_id', 'value' => &$category_info['parent_id']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := category_actions.update_category(:category_id,:category_name,:category_description,:parent_id); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
    
    function delete_category($category_info) {
        $params = array(
            array('name' => ':category_id', 'value' => $category_info['category_id']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := category_actions.delete_category(:category_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
    
    function add_subCategory($category_info) {
        $params = array(
            array('name' => ':category_name', 'value' => $category_info['category_name']),
            array('name' => ':parent_id', 'value' => &$category_info['parent_id']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := category_actions.add_subCategory(:category_name,:parent_id); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }
}

/* End of file category_model.php */