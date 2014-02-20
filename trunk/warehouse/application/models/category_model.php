<?php

class Category_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('OracleModel');
        $this->DBObject = new OracleModel();
    }

    function get_all_categories() {
        return $this->DBObject->readCursor("category_actions.get_all_categories", null);
    }

}

/* End of file category_model.php */