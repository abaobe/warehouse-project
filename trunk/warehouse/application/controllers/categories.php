<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class categories extends CI_Controller {

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
        $this->load->model('category_model');
        define("USER_ROLE", $this->auth->get_user_role());
    }

    public function index() {
        
    }

    /**
     * add_category 
     * 
     * function used to get categories and parsing these information
     * to loaded view to dispaly add form
     * 
     * @access public
     * @return load view
     */
    public function add_category() {
        if (USER_ROLE == ROLE_ONE) {
            $result['categories'] = $this->category_model->get_categories_id_name();
            $this->load->view('webpages/add_category', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * manage_categories 
     * 
     * function used to get categories by calling get_all_categories function
     * in model class and parsing these information to loaded view
     * 
     * @access public
     * @return load view
     */
    public function manage_categories() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['categories'] = $this->category_model->get_all_categories();
            $this->load->view('webpages/manage_categories', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_add_category
     * 
     * function takes category information from view page and parse 
     * it to add_category function in model class to store it into database
     * and return json have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_add_category() {
        if (USER_ROLE == ROLE_ONE) {
            $data['category_name'] = $this->input->post('category_name');
            $data['category_description'] = $this->input->post('category_description');
            $data['subs'] = $this->input->post('subs');

            $result = $this->category_model->add_category($data);
            echo json_encode($result);
        }
    }

    /**
     * update_category
     * 
     * function will get category information from database depends 
     * on category id was sent from json and parse these in formation  
     * to loaded view
     * 
     * @access public
     * @return load view
     */
    public function update_category($category_id) {
        if (USER_ROLE == ROLE_ONE) {
            $result['categories'] = $this->category_model->get_categories_id_name();
            $data['category_id'] = $category_id;
            $result['category_info'] = $this->category_model->get_category_byID($data);
            $this->load->view('webpages/update_category', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_update_category
     * 
     * function takes category information from view page and parse 
     * it to model class to update specific record in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_update_category() {
        if (USER_ROLE == ROLE_ONE) {
            $data['category_id'] = $this->input->post('category_id');
            $data['category_name'] = $this->input->post('category_name');
            $data['category_description'] = $this->input->post('category_description');
            $data['parent_id'] = $this->input->post('parent_id');

            $result = $this->category_model->update_category($data);
            echo json_encode($result);
        }
    }

    /**
     * do_delete_category
     * 
     * function takes category id from json request and parse 
     * it to delete_category in category_model class to delete 
     * specific category from database and return transacton status
     * 
     * @access public
     * @return json
     */
    public function do_delete_category() {
        if (USER_ROLE == ROLE_ONE) {
            $data['category_id'] = $this->input->post('category_id');
            $result = $this->category_model->delete_category($data);
            echo json_encode($result);
        }
    }

    /**
     * do_add_subCategory
     * 
     * function takes sub category information from view page and parse 
     * it to add_subCategory function in model class to store it into database
     * and return json have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_add_subCategory() {
        if (USER_ROLE == ROLE_ONE) {
            $data['category_name'] = $this->input->post('category_name');
            $data['parent_id'] = $this->input->post('parent_id');

            $result = $this->category_model->add_subCategory($data);
            echo json_encode($result);
        }
    }

}

//End of File