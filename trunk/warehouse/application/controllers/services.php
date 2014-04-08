<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Services extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('service_model');
    }

    public function index() {
        
    }

    public function add_service() {
        $this->load->view('webpages/add_service');
    }

    public function do_add_service() {
        $data['service_name'] = $this->input->post('service_name');
        $data['provided_by'] = $this->input->post('provided_by');
        $data['billing'] = $this->input->post('billing');
        $data['cost'] = $this->input->post('cost');
        $data['currency_type'] = $this->input->post('currency_type');
        $data['notes'] = $this->input->post('notes');

        $result = $this->service_model->add_service($data);
        echo json_encode($result);
    }

    public function insert_multiple_service() {
        $inserts = json_decode($this->input->post('services'));
        foreach ($inserts as $item) {
            $data['service_name'] = $item[0];
            $data['provided_by'] = $item[1];
            $data['billing_id'] = $item[2];
            $data['notes'] = $item[3];
            $data['cost'] = $item[4];
            $data['currency_type'] = $item[5];

            $result = $this->service_model->add_service($data);
        }
        echo json_encode($result);
    }

}

//End of File