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
    
    public function get_companies_id_name() {
        $result['companies'] = $this->company_model->get_companies_id_name();
        echo json_encode($result);
    }

    public function do_add_company() {
        $data['company_name'] = $this->input->post('company_name');
        $data['license_number'] = $this->input->post('license_number');
        $data['telephone'] = $this->input->post('telephone');
        $data['mobile'] = $this->input->post('mobile');
        $data['address'] = $this->input->post('address');
        $data['fax_number'] = $this->input->post('fax_number');

        $result = $this->company_model->add_company($data);
        echo json_encode($result);
    }
    
    public function manage_companies() {
        $result['companies'] = $this->company_model->get_all_companies();
        $this->load->view('webpages/manage_companies',$result);
    }
    
    public function update_company($company_id){
        $data['company_id'] = $company_id;
        $result['company_info'] = $this->company_model->get_company_byID($data);
        $this->load->view('webpages/update_company',$result);
    }
    
    public function do_delete_company(){
        $data['company_id'] = $this->input->post('company_id');
        $result = $this->company_model->delete_company($data);
        echo json_encode($result);
    }
    
    public function do_update_company(){
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
//End of File