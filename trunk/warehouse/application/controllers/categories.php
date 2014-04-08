<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class categories extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index() {
        
    }
    
    public function add_category() {
        $result['categories'] = $this->category_model->get_all_categories();
        $this->load->view('webpages/add_category',$result);
    }
    
    public function do_add_category(){
        $data['category_name'] = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['subs'] = $this->input->post('subs');

        $result = $this->category_model->add_category($data);
        echo json_encode($result);
    }
    
    public function do_add_subCategory(){
        $data['category_name'] = $this->input->post('category_name');
        $data['parent_id'] = $this->input->post('parent_id');

        $result = $this->category_model->add_subCategory($data);
        echo json_encode($result);
    }
}

//End of File