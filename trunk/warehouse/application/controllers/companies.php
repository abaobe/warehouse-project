<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companies extends CI_Controller {

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
        $this->load->model('company_model');

        define("USER_ROLE", $this->auth->get_user_role());
    }

    public function index() {
        
    }

    /**
     * add_company 
     * 
     * function used to load view to dispaly add form
     * 
     * @access public
     * @return load view
     */
    public function add_company() {
        if (USER_ROLE == ROLE_ONE) {
            $this->load->view('webpages/add_company');
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * get_companies_id_name 
     * 
     * function used to get companies ids and names
     * and return json of these data
     * 
     * @access public
     * @return json
     */
    public function get_companies_id_name() {
        if (USER_ROLE == ROLE_ONE) {
            $result['companies'] = $this->company_model->get_companies_id_name();
            echo json_encode($result);
        }
    }

    /**
     * do_add_company
     * 
     * function takes company information from view page and parse 
     * it to model class to store it in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_add_company() {
        if (USER_ROLE == ROLE_ONE) {
            $data['company_name'] = $this->input->post('company_name');
            $data['license_number'] = $this->input->post('license_number');
            $data['telephone'] = $this->input->post('telephone');
            $data['mobile'] = $this->input->post('mobile');
            $data['address'] = $this->input->post('address');
            $data['fax_number'] = $this->input->post('fax_number');

            $result = $this->company_model->add_company($data);
            echo json_encode($result);
        }
    }

    /**
     * manage_companies 
     * 
     * function used to get companies by calling get_all_companies function
     * in model class and parsing these information to loaded view
     * 
     * @access public
     * @return load view
     */
    public function manage_companies() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['companies'] = $this->company_model->get_all_companies();
            $this->load->view('webpages/manage_companies', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * update_company
     * 
     * function will get company information from database depends 
     * on company id was sent from json and parse these in formation to loaded view
     * 
     * @access public
     * @return load view
     */
    public function update_company($company_id) {
        if (USER_ROLE == ROLE_ONE) {
            $data['company_id'] = $company_id;
            $result['company_info'] = $this->company_model->get_company_byID($data);
            $this->load->view('webpages/update_company', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_delete_company
     * 
     * function takes company id from json request and parse 
     * it to delete_company in company_model class to delete 
     * specific company from database and return transacton status
     * 
     * @access public
     * @return json
     */
    public function do_delete_company() {
        if (USER_ROLE == ROLE_ONE) {
            $data['company_id'] = $this->input->post('company_id');
            $result = $this->company_model->delete_company($data);
            echo json_encode($result);
        }
    }

    /**
     * do_update_company
     * 
     * function takes company information from view page and parse 
     * it to model class to update specific record in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_update_company() {
        if (USER_ROLE == ROLE_ONE) {
            $data['company_id'] = $this->input->post('company_id');
            $data['company_name'] = $this->input->post('company_name');
            $data['license_number'] = $this->input->post('license_number');
            $data['telephone'] = $this->input->post('telephone');
            $data['mobile'] = $this->input->post('mobile');
            $data['address'] = $this->input->post('address');
            $data['fax_number'] = $this->input->post('fax_number');

            $result = $this->company_model->update_company($data);
            echo json_encode($result);
        }
    }

}

//End of File