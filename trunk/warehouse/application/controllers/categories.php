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
            $this->load->view('webpages/manage_categories');
        } else {
            $this->load->view('webpages/404');
        }
    }
    
    function get_all_categories() {
        $searchKey = $this->checkSearchKey(isset($_POST['sSearch']) ? $_POST['sSearch'] : '');
        $records_number = $this->category_model->get_categories_count($searchKey);
        $result['aaData'] = $this->category_model->get_all_categories($searchKey, $_POST['iDisplayStart'], $_POST['iDisplayLength']);
        $row = array();
        foreach ($result['aaData'] as $value) {
            $options = '';
            $record = array();
            $record[] = $value['RNUM'];
            $record[] = $value['CATEGORY_NAME'];
            $record[] = $value['PARENT_NAME'];
            $record[] = $value['CATEGORY_DESCRIPTION'];
            $record[] = $value['CATEGORY_ID'];
            $record[] = $value['PRODUCTS_NUMBER'];
            if (USER_ROLE == ROLE_ONE) {
                $options .= '<a href=update_category/' . $value['CATEGORY_ID'].' class="btn mini purple"><i class="icon-edit"></i> تعديل</a> ';
                $options .= '<a href="#" onclick="delete_category('.$value['CATEGORY_ID'].',this);return false;"  class="btn mini purple"><i class="icon-trash"></i> حـذف</a>';
            }
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function checkSearchKey($searchKey = '') {
        if ($searchKey != '') {
            return $seachKey = $searchKey;
        } else {
            return $seachKey = '';
        }
    }

    function createOutput($sEcho, $records_number, $aaData = array()) {
        $output = array(
            "sEcho" => $sEcho,
            "iTotalRecords" => $records_number,
            "iTotalDisplayRecords" => $records_number,
            "aaData" => $aaData
        );
        return $output;
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
            $this->form_validation->set_rules('category_name', 'إسم الفئة', 'required|trim|max_length[50]');
            $this->form_validation->set_rules('category_description', 'وصف الفئة', 'trim|max_length[100]');
            $this->form_validation->set_rules('subs', 'الفئات الفرعية', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => $errorMsg));
            } else {
                $data['category_name'] = $this->input->post('category_name');
                $data['category_description'] = $this->input->post('category_description');
                $data['subs'] = $this->input->post('subs');

                $result = $this->category_model->add_category($data);
                if ($result)
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة الفئة بنجاح'));
                else
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
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
            $this->form_validation->set_rules('category_name', 'إسم الفئة', 'required|trim|max_length[50]');
            $this->form_validation->set_rules('category_description', 'وصف الفئة', 'trim|max_length[100]');
            $this->form_validation->set_rules('parent_id', 'الفئة الرئيسية', 'required|trim|numeric');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => $errorMsg));
            } else {
                $data['category_id'] = $this->input->post('category_id');
                $data['category_name'] = $this->input->post('category_name');
                $data['category_description'] = $this->input->post('category_description');
                $data['parent_id'] = $this->input->post('parent_id');

                $result = $this->category_model->update_category($data);
                if ($result)
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة الفئة بنجاح'));
                else
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
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
            if ($result)
                echo json_encode(array('status' => true, 'msg' => "تم حذف الفئة بنجاح"));
            else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة أو قد يكون هناك أصناف مدرجة لهذة الفئة'));
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
            $this->form_validation->set_rules('category_name', 'إسم الفئة', 'required|trim|max_length[50]');
            $this->form_validation->set_rules('parent_id', 'الفئة الرئيسية', 'required|trim|numeric');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => $errorMsg));
            } else {
                $data['category_name'] = $this->input->post('category_name');
                $data['parent_id'] = $this->input->post('parent_id');

                $result = $this->category_model->add_subCategory($data);
                if ($result)
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة الفئة بنجاح'));
                else
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

}

//End of File