<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Services extends CI_Controller {

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
        $this->auth->no_cache();
        $this->auth->is_logged_in();
        $this->load->model('service_model');

        define("USER_ROLE", $this->auth->get_user_role());
    }

    public function index() {
        
    }

    /**
     * add_department 
     * 
     * function to load view to dispaly add form
     * 
     * @access public
     * @return load view
     */
    public function add_service() {
        if (USER_ROLE == ROLE_ONE) {
            $this->load->view('webpages/add_service');
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_add_service
     * 
     * function takes service information from view page and parse 
     * it to model class to store it in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_add_service() {
        if (USER_ROLE == ROLE_ONE) {
            $data['service_name'] = $this->input->post('service_name');
            $data['provided_by'] = $this->input->post('provided_by');
            $data['billing'] = $this->input->post('billing');
            $data['cost'] = $this->input->post('cost');
            $data['currency_type'] = $this->input->post('currency_type');
            $data['notes'] = $this->input->post('notes');
            $data['quantity'] = $this->input->post('quantity');

            $result = $this->service_model->add_service($data);
            echo json_encode($result);
        }
    }

    /**
     * insert_multiple_service
     * 
     * function takes multiple service information from view page and parse 
     * it to model class to store it in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function insert_multiple_service() {
        if (USER_ROLE == ROLE_ONE) {
            $inserts = json_decode($this->input->post('services'));
            foreach ($inserts as $item) {
                $data['service_name'] = $item[0];
                $data['provided_by'] = $item[1];
                $data['billing_id'] = $item[2];
                $data['notes'] = $item[3];
                $data['cost'] = $item[4];
                $data['currency_type'] = $item[5];
                $data['received_date'] = $item[6];
                $data['insert_number'] = $item[7];
                $data['quantity'] = $item[8];

                $result = $this->service_model->add_service($data);
            }
            echo json_encode($result);
        }
    }

}

//End of File