<?php

/**
 * This class extends CI_Model to allow it to read ORACLE cursors 
 * from STORED PROCEDURES in the DB
 */
class OracleModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public Function readCursor($storedProcedure, $binds = NULL) {
        // 
        // This function needs two parameters:
        // 
        // $storedProcedure - the name of the stored procedure to call a chamar. Ex:
        //  my_schema.my_package.my_proc(:param)
        //  
        // $binds - receives an array of associative arrays with: parameter names, 
        // values and sizes
        // 
        // WARNING: The first parameter must be consistent with the second one

        $conn = $this->db->conn_id;

        // Create the statement and bind the variables (parameter, value, size)
        $stid = oci_parse($conn, 'begin :cursor := ' . $storedProcedure . '; end;');
        if ($binds != NULL) {
            foreach ($binds as $variable)
                oci_bind_by_name($stid, $variable["name"], $variable["value"]);
        }
        // Create the cursor and bind it
        $p_cursor = oci_new_cursor($conn);
        oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

        // Execute the Statement and fetch the data
        oci_execute($stid);
        oci_execute($p_cursor, OCI_DEFAULT);
        oci_fetch_all($p_cursor, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);

        // Return the data
        return $data;
    }

}
/* END OF FILE*/