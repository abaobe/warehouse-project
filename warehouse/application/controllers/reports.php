<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('product_model');
    }

    public function index() {
        echo redirect("http://localhost:7001/xmlpserver/~weblogic/Drafts/EmpInfo%20Report.xdo");
    }

}

//end controller