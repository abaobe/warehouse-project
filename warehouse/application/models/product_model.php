<?php

class Product_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    function add_new_product($product_info) {
        try {
            $params = array(
                array('name' => ':product_name', 'value' => $product_info['product_name']),
                array('name' => ':product_number', 'value' => &$product_info['product_number']),
                array('name' => ':product_type', 'value' => &$product_info['product_type']),
                array('name' => ':notes', 'value' => &$product_info['notes']),
                array('name' => ':category_id', 'value' => &$product_info['category_id']),
                array('name' => ':width', 'value' => &$product_info['width']),
                array('name' => ':height', 'value' => &$product_info['height']),
                array('name' => ':h_length', 'value' => &$product_info['h_length']),
                array('name' => ':re_demand_border', 'value' => &$product_info['re_demand_border']),
                array('name' => ':primary_unit_name', 'value' => &$product_info['primary_unit_name']),
                array('name' => ':secondary_unit_name', 'value' => &$product_info['secondary_unit_name']),
                array('name' => ':primary_unit_quantity', 'value' => &$product_info['primary_unit_quantity']),
                array('name' => ':secondary_unit_quantity', 'value' => &$product_info['secondary_unit_quantity']),
                array('name' => ':status', 'value' => &$product_info['status']),
                array('name' => ':res', 'value' => &$result)
            );

            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.add_new_product(:product_name,:product_number,:product_type,:notes,:category_id,:width,:height,:h_length,:re_demand_border,:primary_unit_name,:secondary_unit_name,:primary_unit_quantity,:secondary_unit_quantity,:status); end;");

            foreach ($params as $variable) {
                oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
            }

            oci_execute($stmt);
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    function get_all_products() {
        return $this->DBObject->readCursor("product_actions.get_all_products", null);
    }

    function get_product_by_id($product_id) {
        try {
            $params[0] = array("name" => ":prod_id", "value" => &$product_id);
            return $this->DBObject->readCursor("product_actions.get_product_by_id(:prod_id)", $params);
        } catch (Exception $ex) {
            echo ">>" . ex;
        }
    }

    function update_product($product_info) {
        try {
            $params = array(
                array('name' => ':product_id', 'value' => $product_info['product_id']),
                array('name' => ':product_name', 'value' => &$product_info['product_name']),
                array('name' => ':product_number', 'value' => &$product_info['product_number']),
                array('name' => ':product_type', 'value' => &$product_info['product_type']),
                array('name' => ':notes', 'value' => &$product_info['notes']),
                array('name' => ':category_id', 'value' => &$product_info['category_id']),
                array('name' => ':width', 'value' => &$product_info['width']),
                array('name' => ':height', 'value' => &$product_info['height']),
                array('name' => ':h_length', 'value' => &$product_info['h_length']),
                array('name' => ':re_demand_border', 'value' => &$product_info['re_demand_border']),
                array('name' => ':primary_unit_name', 'value' => &$product_info['primary_unit_name']),
                array('name' => ':secondary_unit_name', 'value' => &$product_info['secondary_unit_name']),
                array('name' => ':primary_unit_quantity', 'value' => &$product_info['primary_unit_quantity']),
                array('name' => ':secondary_unit_quantity', 'value' => &$product_info['secondary_unit_quantity']),
                array('name' => ':res', 'value' => &$result)
            );

            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.update_product(:product_id,:product_name,:product_number,:product_type,:notes,:category_id,:width,:height,:h_length,:re_demand_border,:primary_unit_name,:secondary_unit_name,:primary_unit_quantity,:secondary_unit_quantity); end;");

            foreach ($params as $variable)
                oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

            oci_execute($stmt);
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    function delete_product($product_id) {
        $params = array(array('name' => ':product_id', 'value' => &$product_id),
            array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.delete_product(:product_id); end;");

        foreach ($params as $variable)
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

        oci_execute($stmt);
        return $result;
    }

    function insert_product($product_info) {
        try {
            $r = 123; //see below comment
            $params = array(
                array('name' => ':product_id', 'value' => &$product_info['product_id']),
                array('name' => ':received_from', 'value' => &$product_info['received_from']),
                array('name' => ':billing_id', 'value' => &$product_info['billing_id']),
                array('name' => ':notes', 'value' => &$product_info['notes']),
                array('name' => ':receiver_id', 'value' => &$r), //notes: this will take value from session
                array('name' => ':quantity', 'value' => &$product_info['quantity']),
                array('name' => ':unit_type', 'value' => &$product_info['unit_type']),
                array('name' => ':unit_price', 'value' => &$product_info['unit_price']),
                array('name' => ':currency_type', 'value' => &$product_info['currency_type']),
                array('name' => ':res', 'value' => &$result)
            );

            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.insert_product(:product_id,:received_from,:billing_id,:notes,:receiver_id,:quantity,:unit_type,:unit_price,:currency_type); end;");

            foreach ($params as $variable)
                oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

            oci_execute($stmt);
            return $result;
        } catch (Exception $ex) {
            return ">>" . $ex;
        }
    }

    function dynamic_product_search($key) {
        $params[0] = array("name" => ":search_key", "value" => &$key);
        return $this->DBObject->readCursor("product_actions.dynamic_product_search(:search_key)", $params);
    }

    function get_product_unit_names($product_id) {
        $params[0] = array("name" => ":product_id", "value" => &$product_id);
        return $this->DBObject->readCursor("product_actions.get_product_unit_names(:product_id)", $params);
    }

    function supplies_order($order_info) {
        $r = '123'; //see below comment
        $result = null;
        $params = array(
            array('name' => ':product_id', 'value' => &$order_info[0]),
            array('name' => ':quantity', 'value' => &$order_info[3]),
            array('name' => ':department_id', 'value' => &$order_info[1]),
            array('name' => ':notes', 'value' => &$order_info[2]),
            array('name' => ':applicant_id', 'value' => &$r), //notes: this will take value from session
            array('name' => ':unit_type', 'value' => &$order_info[4]),
            array('name' => ':order_number', 'value' => &$order_info[5]),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.supplies_order(:product_id,:quantity,:department_id,:notes,:applicant_id,:unit_type,:order_number); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        $b = oci_execute($stmt);
        if (!$b) {
            $aa = oci_error();
            return $aa;
        }
        return $result;
    }

    function get_supplies_id() {
        return $this->DBObject->readCursor("product_actions.get_all_ordered_supplies", null);
    }
    
    function get_ordered_supplies_byNumber($order_number) {
        $params[0] = array("name" => ":order_number", "value" => &$order_number);
        return $this->DBObject->readCursor("product_actions.get_supplies_info_byNumber(:order_number)", $params);
    }

    function get_order_number() {
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "BEGIN :v_Return := PRODUCT_ACTIONS.NEXT_ORDER_NUMBER(); END;");
        oci_bind_by_name($stmt, ':v_Return', $result, SQLT_STR);

        if (!oci_execute($stmt)) {
            return oci_error($stmt);
        }
        return $result;
    }
    
    function refuse_order($order_number) {
        $params = array(array('name' => ':order_number', 'value' => &$order_number),
                        array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.refuse_order(:order_number); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }

        oci_execute($stmt);
        return $result;
    }

    function disburse_supplies($data) {
        $params = array(
            array('name' => ':order_supplies_id', 'value' => &$data['order_supplies_id']),
            array('name' => ':quantity_disbursed', 'value' => &$data['quantity_disbursed']),
            array('name' => ':unit_type', 'value' => &$data['unit_type']),
            array('name' => ':notes', 'value' => &$data['notes']),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.insert_disburse_info(:order_supplies_id,:quantity_disbursed, :unit_type, :notes); end;");

        foreach ($params as $variable)
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

        oci_execute($stmt);
        return $result;
    }
    
    function get_order_status($order_number) {
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "BEGIN :v_Return := PRODUCT_ACTIONS.get_order_status(:order_number); END;");
        oci_bind_by_name($stmt, ':v_Return', $result, SQLT_STR);
        oci_bind_by_name($stmt, ':order_number', $order_number);

        if (!oci_execute($stmt)) {
            return oci_error($stmt);
        }
        return $result;
    }

}

/* End of file product_model.php */