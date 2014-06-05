<?php

class Product_model extends CI_Model {

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
     * add_new_product
     * 
     * function takes product information from the controller and parse 
     * it to pl/sql function add_product to store it into database 
     * and return number have transaction status
     * 
     * @access public
     * @return number
     */
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
                array('name' => ':quantity_status', 'value' => &$product_info['quantity_status']),
                array('name' => ':res', 'value' => &$result)
            );

            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.add_new_product(:product_name,:product_number,:product_type,:notes,:category_id,:width,:height,:h_length,:re_demand_border,:primary_unit_name,:secondary_unit_name,:primary_unit_quantity,:secondary_unit_quantity,:quantity_status); end;");
            foreach ($params as $variable) {
                oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
            }
            oci_execute($stmt);
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    /**
     * get_all_products
     * 
     * function get products infroamtions from the database by calling pl/sql
     * function and parse it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_all_products($i_search, $i_start_index,$i_end_index) {
        try {
            $params = array(array("name" => ":i_search", "value" => &$i_search),
                array("name" => ":i_start_index", "value" => &$i_start_index),
                array("name" => ":i_end_index", "value" => &$i_end_index)
             );
            return $this->DBObject->readCursor("product_actions.get_all_products(:i_search,:i_start_index,:i_end_index)", $params);
        } catch (Exception $ex) {
            return $ex;
        }
    }
    
    /**
     * get_static_products
     * 
     * function get static_products infroamtions from the database by calling pl/sql
     * function and parse it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_static_products() {
        return $this->DBObject->readCursor("product_actions.get_static_products", null);
    }

    function get_inserted_static_prod($product_id, $columns) {
        try {
            $params[0] = array("name" => ":prod_id", "value" => &$product_id);
            $params[1] = array("name" => ":columns", "value" => &$columns);
            return $this->DBObject->readCursor("product_actions.get_inserted_static_prod(:prod_id,:columns)", $params);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    function get_inserted_temp_prod($product_id) {
        try {
            $params[0] = array("name" => ":prod_id", "value" => &$product_id);
            return $this->DBObject->readCursor("product_actions.get_inserted_temp_prod(:prod_id)", $params);
        } catch (Exception $ex) {
            echo ">>" . ex;
        }
    }

    /**
     * get_static_product_by_voucherId
     * 
     * function get static_products infroamtions depends on voucher id from
     * the database by calling pl/sql function and parse it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_static_product_by_voucherId($voucher_id) {
        try {
            $params[0] = array("name" => ":voucher_id", "value" => &$voucher_id);
            return $this->DBObject->readCursor("product_actions.get_static_prod_ByVoucherID(:voucher_id)", $params);
        } catch (Exception $ex) {
            echo ">>" . ex;
        }
    }

    /**
     * get_temp_product_by_voucherId
     * 
     * function get temporary_products infroamtions depends on voucher id from
     * the database by calling pl/sql function and parse it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_temp_product_by_voucherId($voucher_id) {
        try {
            $params[0] = array("name" => ":voucher_id", "value" => &$voucher_id);
            return $this->DBObject->readCursor("product_actions.get_temp_prod_ByVoucherID(:voucher_id)", $params);
        } catch (Exception $ex) {
            echo ">>" . ex;
        }
    }

    /**
     * get_product_by_id
     * 
     * function get product information depends on product id
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function get_product_by_id($product_id) {
        try {
            $params[0] = array("name" => ":prod_id", "value" => &$product_id);
            return $this->DBObject->readCursor("product_actions.get_product_by_id(:prod_id)", $params);
        } catch (Exception $ex) {
            echo ">>" . ex;
        }
    }

    function update_inserted_static_product($product_info) {
        try {
            $r = 123;
            $params = array(
                array('name' => ':voucher_id', 'value' => $product_info['voucher_id']),
                array('name' => ':received_from', 'value' => $product_info['received_from']),
                array('name' => ':billing_id', 'value' => &$product_info['billing_id']),
                array('name' => ':notes', 'value' => &$product_info['notes']),
                array('name' => ':receiver_id', 'value' => &$r),
                array('name' => ':quantity', 'value' => &$product_info['quantity']),
                array('name' => ':unit_type', 'value' => &$product_info['unit_type']),
                array('name' => ':unit_price', 'value' => &$product_info['unit_price']),
                array('name' => ':currency_type', 'value' => &$product_info['currency_type']),
                array('name' => ':product_status', 'value' => &$product_info['product_status']),
                array('name' => ':product_nature', 'value' => &$product_info['product_nature']),
                array('name' => ':supply_type', 'value' => &$product_info['supply_type']),
                array('name' => ':expire_date', 'value' => &$product_info['expire_date']),
                array('name' => ':serial_number', 'value' => &$product_info['serial_number']),
                array('name' => ':res', 'value' => &$result)
            );
            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.update_inserted_static_product(:voucher_id,:received_from,:billing_id,:notes,:receiver_id,:quantity,:unit_type,:unit_price,:currency_type,:product_status,:product_nature,:supply_type,:expire_date,:serial_number); end;");

            foreach ($params as $variable)
                oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

            oci_execute($stmt);
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    function update_inserted_temp_product($product_info) {
        try {
            $r = 123;
            $params = array(
                array('name' => ':voucher_id', 'value' => $product_info['voucher_id']),
                array('name' => ':received_from', 'value' => $product_info['received_from']),
                array('name' => ':billing_id', 'value' => &$product_info['billing_id']),
                array('name' => ':notes', 'value' => &$product_info['notes']),
                array('name' => ':receiver_id', 'value' => &$r),
                array('name' => ':quantity', 'value' => &$product_info['quantity']),
                array('name' => ':unit_type', 'value' => &$product_info['unit_type']),
                array('name' => ':unit_price', 'value' => &$product_info['unit_price']),
                array('name' => ':currency_type', 'value' => &$product_info['currency_type']),
                array('name' => ':res', 'value' => &$result)
            );
            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.update_inserted_temp_product(:voucher_id,:received_from,:billing_id,:notes,:receiver_id,:quantity,:unit_type,:unit_price,:currency_type); end;");

            foreach ($params as $variable)
                oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

            oci_execute($stmt);
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    /**
     * update_product
     * 
     * function takes products infroamtions from the controller function and
     * parse it to pl/sql update_product function and return transaction status
     * 
     * @access public
     * @return number
     */
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
                array('name' => ':quantity_status', 'value' => &$product_info['quantity_status']),
                array('name' => ':res', 'value' => &$result)
            );

            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.update_product(:product_id,:product_name,:product_number,:product_type,:notes,:category_id,:width,:height,:h_length,:re_demand_border,:primary_unit_name,:secondary_unit_name,:primary_unit_quantity,:secondary_unit_quantity,:quantity_status); end;");

            foreach ($params as $variable)
                oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

            oci_execute($stmt);
            return $result;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    /**
     * delete_product
     * 
     * function recieve product id from controller and parse it 
     * to pl/sql function to delete product
     * 
     * @access public
     * @return number
     */
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

    /**
     * delete_inserted_product
     * 
     * function recieve product id from controller and parse it 
     * to pl/sql function to delete product depends on voucher id
     * 
     * @access public
     * @return number
     */
    function delete_inserted_product($voucher_id) {
        $params = array(array('name' => ':voucher_id', 'value' => &$voucher_id),
            array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.delete_inserted_product(:voucher_id); end;");

        foreach ($params as $variable)
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

        oci_execute($stmt);
        return $result;
    }

    /**
     * insert_product
     * 
     * function takes product information from the controller and parse 
     * it to pl/sql function add_product to store it into database 
     * and return number have transaction status
     * 
     * @access public
     * @return number
     */
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
                array('name' => ':received_date', 'value' => &$product_info['received_date']),
                array('name' => ':insert_number', 'value' => &$product_info['insert_number']),
                array('name' => ':res', 'value' => &$result)
            );

            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.insert_product(:product_id,:received_from,:billing_id,:notes,:receiver_id,:quantity,:unit_type,:unit_price,:currency_type,:received_date,:insert_number); end;");

            foreach ($params as $variable)
                oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

            oci_execute($stmt);
            return $result;
        } catch (Exception $ex) {
            return ">>" . $ex;
        }
    }
    
    function delete_many_inserted_products($vouchers_ids){
        $params = array(array('name' => ':vouchers_ids', 'value' => &$vouchers_ids),
            array('name' => ':res', 'value' => &$result));
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.delete_many_inserted_products(:vouchers_ids); end;");

        foreach ($params as $variable)
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

        oci_execute($stmt);
        return $result;
    }

    /**
     * insert_static_product
     * 
     * function takes product information from the controller and parse 
     * it to pl/sql function add_product to store it into database 
     * and return number have transaction status
     * 
     * @access public
     * @return number
     */
    function insert_static_product($product_info) {
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
                array('name' => ':product_status', 'value' => &$product_info['product_status']),
                array('name' => ':product_nature', 'value' => &$product_info['product_nature']),
                array('name' => ':supply_type', 'value' => &$product_info['supply_type']),
                array('name' => ':expire_date', 'value' => &$product_info['expire_date']),
                array('name' => ':serial_number', 'value' => &$product_info['serial_number']),
                array('name' => ':insert_number', 'value' => &$product_info['insert_number']),
                array('name' => ':res', 'value' => &$result)
            );
            $conn = $this->db->conn_id;
            $stmt = oci_parse($conn, "begin :res := product_actions.insert_static_product(:product_id,:received_from,:billing_id,:notes,:receiver_id,:quantity,:unit_type,:unit_price,:currency_type,:product_status,:product_nature,:supply_type,:expire_date,:serial_number,:insert_number); end;");

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
        $result = null;
        $params = array(
            array('name' => ':product_id', 'value' => &$order_info[0]),
            array('name' => ':department_id', 'value' => &$order_info[1]),
            array('name' => ':notes', 'value' => &$order_info[2]),
            array('name' => ':quantity', 'value' => &$order_info[3]),
            array('name' => ':unit_type', 'value' => &$order_info[4]),
            array('name' => ':order_number', 'value' => &$order_info[5]),
            array('name' => ':applicant_id', 'value' => &$order_info[6]),
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

    function static_supplies_order($order_info) {
        $result = null;
        $params = array(
            array('name' => ':product_id', 'value' => &$order_info[0]),
            array('name' => ':department_id', 'value' => &$order_info[1]),
            array('name' => ':notes', 'value' => &$order_info[2]),
            array('name' => ':quantity', 'value' => &$order_info[3]),
            array('name' => ':unit_type', 'value' => &$order_info[4]),
            array('name' => ':order_number', 'value' => &$order_info[5]),
            array('name' => ':employee_name', 'value' => &$order_info[6]),
            array('name' => ':employee_number', 'value' => &$order_info[7]),
            array('name' => ':section_name', 'value' => &$order_info[8]),
            array('name' => ':room_number', 'value' => &$order_info[9]),
            array('name' => ':applicant_id', 'value' => &$order_info[10]),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.static_supplies_order(:product_id,:quantity,:department_id,:notes,:applicant_id,:unit_type,:order_number,:employee_name,:employee_number,:section_name,:room_number); end;");

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

    function get_ordered_supplies() {
        return $this->DBObject->readCursor("product_actions.get_all_ordered_supplies", null);
    }

    function get_ordered_supplies_byNumber($order_number) {
        $params[0] = array("name" => ":order_number", "value" => &$order_number);
        return $this->DBObject->readCursor("product_actions.get_supplies_info_byNumber(:order_number)", $params);
    }

    /**
     * get_order_number
     * 
     * function get order number from database sequence
     * 
     * @access public
     * @return number
     */
    function get_order_number() {
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "BEGIN :v_Return := PRODUCT_ACTIONS.NEXT_ORDER_NUMBER(); END;");
        oci_bind_by_name($stmt, ':v_Return', $result, SQLT_STR);

        if (!oci_execute($stmt)) {
            return oci_error($stmt);
        }
        return $result;
    }

    /**
     * next_product_number
     * 
     * function get order number from database sequence
     * 
     * @access public
     * @return number
     */
    function next_product_number() {
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "BEGIN :v_Return := PRODUCT_ACTIONS.NEXT_PRODUCT_NUMBER(); END;");
        oci_bind_by_name($stmt, ':v_Return', $result, SQLT_STR);

        if (!oci_execute($stmt)) {
            return oci_error($stmt);
        }
        return $result;
    }

    /**
     * get_insert_number
     * 
     * function get insert number from database sequence
     * 
     * @access public
     * @return number
     */
    function get_insert_number() {
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "BEGIN :v_Return := PRODUCT_ACTIONS.NEXT_INSERT_NUMBER(); END;");
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

    function disburse_static_supplies($data) {
        $params = array(
            array('name' => ':order_supplies_id', 'value' => &$data[0]),
            array('name' => ':notes', 'value' => &$data[1]),
            array('name' => ':return_date', 'value' => &$data[2]),
            array('name' => ':insert_voucher_iD', 'value' => &$data[3]),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.insert_static_disburse_info(:order_supplies_id,:notes, :return_date, :insert_voucher_iD); end;");

        foreach ($params as $variable)
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);

        oci_execute($stmt);
        return $result;
    }

    function disburse_temp_supplies($data) {
        $params = array(
            array('name' => ':order_supplies_id', 'value' => &$data[0]),
            array('name' => ':quantity_disbursed', 'value' => &$data[1]),
            array('name' => ':unit_type', 'value' => &$data[2]),
            array('name' => ':notes', 'value' => &$data[3]),
            array('name' => ':acknowledgement', 'value' => &$data[4]),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.insert_temp_disburse_info(:order_supplies_id,:quantity_disbursed, :unit_type, :notes,:acknowledgement); end;");
        foreach ($params as $variable)
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        oci_execute($stmt);
        return $result;
    }

    /**
     * department_borrowing
     * 
     * function get products borrowed from the database depends on department id
     * and parse it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function department_borrowing($data) {
        $params[0] = array("name" => ":department_id", "value" => &$data['department_id']);
        return $this->DBObject->readCursor("product_actions.department_borrowing(:department_id)", $params);
    }

    /**
     * get_products_id_name
     * 
     * function get product ids,names from the database and parse 
     * it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_products_id_name($product_type) {
        $params[0] = array("name" => ":product_type", "value" => &$product_type);
        return $this->DBObject->readCursor("product_actions.get_products_id_name(:product_type)", $params);
    }

    /**
     * get_borrowing_byID
     * 
     * function get products borrowed from the database and parse 
     * it to controller function and return cursor
     * 
     * @access public
     * @return cursor
     */
    function get_borrowing_byID($voucher_id) {
        $params[0] = array("name" => ":voucher_id", "value" => &$voucher_id);
        return $this->DBObject->readCursor("product_actions.get_borrowing_byID(:voucher_id)", $params);
    }

    function return_borrowing($info) {
        $params = array(
            array('name' => ':voucher_id', 'value' => &$info['voucher_id']),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.return_borrowing(:voucher_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }

    function get_returned_products() {
        return $this->DBObject->readCursor("product_actions.get_returned_products", NULL);
    }

    function changeProDStatus($data) {
        $params = array(
            array('name' => ':product_status', 'value' => &$data['product_status']),
            array('name' => ':voucher_id', 'value' => &$data['voucher_id']),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.changeProdStatus(:product_status,:voucher_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }

    /**
     * extend_date
     * 
     * function change the return date datae and return status
     * 
     * @access public
     * @return cursor
     */
    function extend_date($data) {
        $params = array(
            array('name' => ':new_return_date', 'value' => &$data['new_return_date']),
            array('name' => ':voucher_id', 'value' => &$data['voucher_id']),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.extend_date(:new_return_date,:voucher_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }

    /**
     * get_ProductsBy_CatID
     * 
     * function get products depends on category IDinformation
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function get_ProductsBy_CatID($data) {
        $params[0] = array("name" => ":category_id", "value" => &$data['category_id']);
        $params[1] = array("name" => ":prodType", "value" => &$data['prodType']);
        return $this->DBObject->readCursor("product_actions.get_ProductsBy_CatID(:category_id,:prodType)", $params);
    }

    function disburse_servicing($data) {
        $params = array(
            array("name" => ":voucher_id", "value" => &$data['voucher_id']),
            array("name" => ":reasons", "value" => &$data['reasons']),
            array("name" => ":company_id", "value" => &$data['company_id']),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.disburse_servicing(:voucher_id,:reasons,:company_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }
    
    function get_temporary_output(){
        return $this->DBObject->readCursor("product_actions.get_temporary_output", null);
    }

    /**
     * get_temp_products
     * 
     * function get temporary products information
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function get_temp_products() {
        return $this->DBObject->readCursor("product_actions.get_temp_products", null);
    }
    
    function acceptOutputProduct($data) {
        $params = array(
            array('name' => ':product_status', 'value' => &$data['product_status']),
            array('name' => ':voucher_id', 'value' => &$data['voucher_id']),
            array('name' => ':res', 'value' => &$result)
        );

        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.acceptOutputProduct(:product_status,:voucher_id); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }

    /**
     * get_products_for_damage
     * 
     * function get damaged products information
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function get_products_for_damage() {
        return $this->DBObject->readCursor("product_actions.get_products_for_damage", null);
    }

    function accept_damge($data) {
        $params = array(
            array('name' => ':vouchers', 'value' => &$data['vouchers']),
            array('name' => ':monitor_ways', 'value' => &$data['monitor_ways']),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.accept_damage(:vouchers,:monitor_ways); end;");

        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }

    /**
     * getNotification
     * 
     * function get unreadable orders information
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function getNotification() {
        return $this->DBObject->readCursor("product_actions.getUnreadableOrders", null);
    }

    /**
     * getNotificationsNumber
     * 
     * function get unreadable orders counts information
     * and parse these infromation to controller
     * 
     * @access public
     * @return cursor
     */
    function getNotificationsNumber() {
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "BEGIN :v_Return := product_actions.getUnreadableOrdersNumber; END;");
        oci_bind_by_name($stmt, ':v_Return', $result, SQL_NUMERIC);

        if (!oci_execute($stmt)) {
            return oci_error($stmt);
        }
        return (int) $result;
    }

    function getStatistcs() {
        $conn = $this->db->conn_id;
        $s = oci_parse($conn, "select * from table(product_actions.getMainStatistics())");
        oci_execute($s);
        oci_fetch_all($s, $res);
        return $res;
    }

    function getProductsTopOrdered() {
        return $this->DBObject->readCursor("product_actions.getProductsTopOrdered", null);
    }
    
    function get_products_count($searchKey= ''){
        $params = array(
            array('name' => ':i_seach', 'value' => &$searchKey),
            array('name' => ':res', 'value' => &$result)
        );
        $conn = $this->db->conn_id;
        $stmt = oci_parse($conn, "begin :res := product_actions.get_products_count(:i_seach); end;");
        foreach ($params as $variable) {
            oci_bind_by_name($stmt, $variable["name"], $variable["value"]);
        }
        oci_execute($stmt);
        return $result;
    }
}

/* End of file product_model.php */