<?php

class Category_model extends CI_Model {

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
     * get_categories_id_name
     * 
     * function get categories ids,names from the database and parse 
     * it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_categories_id_name() {
        return $this->DBObject->readCursor("category_actions.get_categories_id_name", null);
    }

    /**
     * get_all_categories
     * 
     * function get categories infroamtions from the database by calling pl/sql
     * function and parse it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_all_categories($i_search, $i_start_index, $i_end_index) {
        $params = array(array("name" => ":i_search", "value" => &$i_search),
            array("name" => ":i_start_index", "value" => &$i_start_index),
            array("name" => ":i_end_index", "value" => &$i_end_index)
        );
        return $this->DBObject->readCursor("category_actions.get_all_categories(:i_search,:i_start_index,:i_end_index)", $params);
    }

    /**
     * get_category_byID
     * 
     * function get category information depends on category id
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function get_category_byID($data) {
        $params[0] = array('name' => ':category_id', 'value' => &$data['category_id']);
        return $this->DBObject->readCursor("category_actions.get_category_byID(:category_id)", $params);
    }

    /**
     * add_category
     * 
     * function takes category information from the controller and parse 
     * it to pl/sql function add_category to store it into database 
     * and return number have transaction status
     * 
     * @access public
     * @return number
     */
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

    /**
     * update_category
     * 
     * function takes category infroamtions from the controller function and
     * parse it to pl/sql update_category function and return transaction status
     * 
     * @access public
     * @return number
     */
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

    /**
     * delete_category
     * 
     * function recieve category id from controller and parse it 
     * to pl/sql function to delete category
     * 
     * @access public
     * @return number
     */
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

    /**
     * add_subCategory
     * 
     * function takes Category information from the controller and parse 
     * it to pl/sql function add_Category to store it into database 
     * and return number have transaction status
     * 
     * @access public
     * @return number
     */
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
    function get_categories_count($searchKey) {
        $params = array(
            array('name' => ':i_seach', 'value' => &$searchKey),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := category_actions.get_categories_count(:i_seach); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }
    

}

/* End of file category_model.php */