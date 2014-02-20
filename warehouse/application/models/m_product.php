<?php

class M_product extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    function insert_product($new_product_array) {
//        $ret = 12;
//        $entree = random_string();
//        $entree2 = "dd";
//        $param = array(
//            array('name' => ':a1', 'value' => &$ret, 'type' => SQLT_INT, 'length' => -1),
//            array('name' => ':a2', 'value' => &$entree, 'type' => SQLT_CHR, 'length' => -1),
//            array('name' => ':a3', 'value' => &$entree2, 'type' => SQLT_CHR, 'length' => -1),
//        );
//        echo $this->db->stored_procedure('PRODUCT_ACTIONS', 'INSERT_PRODUCT', $param);
//        echo "ok";
    }

    FUNCTION ADD_PRODUCT($new_product_array1) {
//        $ret = 12;
//        $entree = "بسم اللة ";
//        $entree2 = random_string();
//        $params = array(
//            array('name' => ':params1', 'value' => &$ret, 'type' => SQLT_INT, 'length' => -1),
//            array('name' => ':params2', 'value' => &$entree, 'type' => SQLT_CHR, 'length' => -1),
//            array('name' => ':params3', 'value' => &$entree2, 'type' => SQLT_CHR, 'length' => -1),
//        );
//        $stmt = oci_parse($this->db->conn_id, "begin PRODUCT_ACTIONS.INSERT_PRODUCT(:params1, :params2, :params3); end;");
//        foreach ($params as $p)
//            oci_bind_by_name($stmt, $p['name'], $p['value'], $p['length']);
//        $r = ociexecute($stmt);
//        echo $r;
        return $this->DBObject->readCursor("category_actions.get_all_categories", null);
        
    }

    function add() {
        try {
            $param1 = random_string();
            $param2 = random_string();
            $result = null;
            $param = array(
                array('name' => ':param1', 'value' => &$param1),
                array('name' => ':param2', 'value' => &$param2),
                array('name' => ':res', 'value' => &$result),
            );

            $conn = $this->db->conn_id;
            $s = oci_parse($conn, "begin :res := orcl.add_new(:param1,:param2); end;");

            foreach ($param as $variable)
                oci_bind_by_name($s, $variable["name"], $variable["value"]);

            oci_execute($s);
            echo $result;
        } catch (Exception $ex) {
            echo ">>" . $ex;
        }
    }

//    public Function readCursor($storedProcedure, $binds = NULL) {
//
//        // This function needs two parameters:
//        //
//      // $storedProcedure - the name of the stored procedure to call a chamar. Ex:
//        //  my_schema.my_package.my_proc(:param)
//        //
//      // $binds - receives an array of associative arrays with: parameter names,
//        // values and sizes
//        //
//      // WARNING: The first parameter must be consistent with the second one
//
//        $conn = $this->db->conn_id;
//        // Create the statement and bind the variables (parameter, value, size)
//        $stid = oci_parse($conn, 'begin :cursor := ' . $storedProcedure . '; end;');
//        if ($binds != NULL) {
//            foreach ($binds as $variable)
//                oci_bind_by_name($stid, $variable["name"], $variable["value"], $variable["size"]);
//        }
//
//        // Create the cursor and bind it
//        $p_cursor = oci_new_cursor($conn);
//        oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);
//
//        // Execute the Statement and fetch the data
//        oci_execute($stid);
//        oci_execute($p_cursor, OCI_DEFAULT);
//        oci_fetch_all($p_cursor, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
//
//        // Return the data
//        return $data;
//    }
}