<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companies extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('company_model');
    }

    public function index() {
        
    }

    public function add_company() {
        $this->load->view('webpages/add_company');
    }

    public function do_add_company() {
        $data['company_name'] = $this->input->post('company_name');
        $data['license_number'] = $this->input->post('license_number');
        $data['telephone'] = $this->input->post('telephone');
        $data['mobile'] = $this->input->post('mobile');
        $data['address'] = $this->input->post('address');

        $result = $this->company_model->add_company($data);
        echo json_encode($result);
    }
    
}
//End of File