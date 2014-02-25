<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Departments extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('department_model');
    }

    public function index() {
        
    }

    public function inventory_supplies() {
        $result['departments'] = $this->department_model->get_departments_names();
        $this->load->view('webpages/inventory_supplies', $result);
    }
    
    public function get_department_inventory() {
        $data['department_id'] = $this->input->post('department_id');
        $data['start_date'] = $this->input->post('start_date');
        $data['end_date'] = $this->input->post('end_date');
        $result['inventory'] = $this->department_model->get_department_inventory($data);
        echo json_encode($result);
    }
    
    public function add_department() {
        $this->load->view('webpages/add_department');
    }
    
    public function do_add_department() {
        $data['department_name'] = $this->input->post('department_name');
        $data['address'] = $this->input->post('address');
        $data['phone'] = $this->input->post('phone');
        $data['notes']=  $this->input->post('notes');

        $result = $this->department_model->add_department($data);
        echo json_encode($result);
    }

}

/* End of file product.php */