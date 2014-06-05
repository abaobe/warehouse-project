<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Departments extends CI_Controller {

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
        $this->load->model('department_model');

        define("USER_ROLE", $this->auth->get_user_role());
    }

    public function index() {
        
    }

//    public function inventory_supplies() {
//        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
//            $result['departments'] = $this->department_model->get_departments_id_name();
//            $this->load->view('webpages/inventory_supplies', $result);
//        } else {
//            $this->load->view('webpages/404');
//        }
//    }
//    
//    public function get_department_inventory() {
//        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
//            $data['department_id'] = $this->input->post('department_id');
//            $data['start_date'] = $this->input->post('start_date');
//            $data['end_date'] = $this->input->post('end_date');
//            $result['inventory'] = $this->department_model->get_department_inventory($data);
//            echo json_encode($result);
//        }
//    }

    /**
     * manage_departments 
     * 
     * function used to get departments by calling get_all_departments function
     * in model class and parsing these information to loaded view
     * 
     * @access public
     * @return load view
     */
    public function manage_departments() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $this->load->view('webpages/manage_departments');
        } else {
            $this->load->view('webpages/404');
        }
    }

    function get_all_departments() {
        $searchKey = $this->checkSearchKey(isset($_POST['sSearch']) ? $_POST['sSearch'] : '');
        $records_number = $this->department_model->get_departments_count($searchKey);
        $result['aaData'] = $this->department_model->get_all_departments($searchKey, $_POST['iDisplayStart'], $_POST['iDisplayLength']);
        $row = array();
        foreach ($result['aaData'] as $value) {
            $options = '';
            $record = array();
            $record[] = $value['RNUM'];
            $record[] = $value['ROOT_NAME'];
            $record[] = $value['DOWN1_NAME'];
            $record[] = '<a href="#" onclick="show_user(' . $value['USER_ID'] . ');" data-reveal-id="myModal">' . $value['FIRST_NAME'] . ' ' . $value['MIDDLE_NAME'] . ' ' . $value['LAST_NAME'] . '</a>';
            if ($value['DOWN1_ADDRESS'] != NULL)
                $record[] = $value['DOWN1_ADDRESS'];
            else if ($value['ROOT_ADDRESS'] != NULL)
                $record[] = $value['ROOT_ADDRESS'];

            $record[] = $value['MOBILE'];
            $record[] = $value['PHONE'];
            $record[] = $value['FAX'];
            $record[] = substr($value['NOTES'], 0,20).'...';
            if (USER_ROLE == ROLE_ONE) {
                $options .= '<a href=departments/update_department/' . $value['DOWN1_ID'] . ' class="btn mini purple"><i class="icon-edit"></i>  تعديل</a> ';
                $options .= '<a href="#" onclick="delete_department(' . $value['DOWN1_ID'] . ',this);return false;"  class="btn mini purple"><i class="icon-trash"></i> حـذف</a>';
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
     * update_department
     * 
     * function will get department information from database depends 
     * on department id was sent from json and parse these in formation to loaded view
     * 
     * @access public
     * @return load view
     */
    public function update_department($department_id) {
        if (USER_ROLE == ROLE_ONE) {
            $result['department_info'] = $this->department_model->get_department_ById($department_id);
            $result['departments'] = $this->department_model->get_departments_id_name();
            $this->load->view('webpages/update_department', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_delete_department
     * 
     * function takes department id from json request and parse 
     * it to delete_department in department_model class to delete 
     * specific department from database and return transacton status
     * 
     * @access public
     * @return json
     */
    public function do_delete_department() {
        if (USER_ROLE == ROLE_ONE) {
            $data['department_id'] = $this->input->post('department_id');
            $result = $this->department_model->delete_department($data);
            if ($result)
                echo json_encode(array('status' => true, 'msg' => "تم الحذف  بنجاح"));
            else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة أو قد يكون هناك أصناف مدرجة لهذة الدائرة'));
        }
    }

    /**
     * add_department 
     * 
     * function used to get departments and parsing these information
     * to loaded view to dispaly add form
     * 
     * @access public
     * @return load view
     */
    public function add_department() {
        if (USER_ROLE == ROLE_ONE) {
            $result['departments'] = $this->department_model->get_departments_id_name();
            $this->load->view('webpages/add_department', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_add_department
     * 
     * function takes department information from view page and parse 
     * it to model class to store it in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_add_department() {
        if (USER_ROLE == ROLE_ONE) {
            $this->form_validation->set_rules('department_name', 'إسم الإدارة', 'required|trim|max_length[70]');
            $this->form_validation->set_rules('address', 'العنوان', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('phone', 'رقم الهاتف', 'trim|max_length[30]');
            $this->form_validation->set_rules('mobile', 'رقم الجوال', 'trim|max_length[30]');
            $this->form_validation->set_rules('notes', 'ملاحظات', 'trim|max_length[100]');
            $this->form_validation->set_rules('fax', 'رقم الفاكس', 'trim|max_length[30]');
            $this->form_validation->set_rules('parent_id', 'إسم الإدارة', 'required|trim|numeric');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => $errorMsg));
            } else {
                $data['department_name'] = $this->input->post('department_name');
                $data['address'] = $this->input->post('address');
                $data['phone'] = $this->input->post('phone');
                $data['notes'] = $this->input->post('notes');
                $data['mobile'] = $this->input->post('mobile');
                $data['fax'] = $this->input->post('fax');
                $data['parent_id'] = $this->input->post('parent_id');

                $result = $this->department_model->add_department($data);
                if ($result)
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة البيانات بنجاح'));
                else
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_update_department
     * 
     * function takes department information from view page and parse 
     * it to model class to update specific record in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_update_department() {
        if (USER_ROLE == ROLE_ONE) {
            $this->form_validation->set_rules('department_name', 'إسم الإدارة', 'required|trim|max_length[70]');
            $this->form_validation->set_rules('address', 'العنوان', 'required|trim|max_length[100]');
            $this->form_validation->set_rules('phone', 'رقم الهاتف', 'trim|max_length[30]');
            $this->form_validation->set_rules('mobile', 'رقم الجوال', 'trim|max_length[30]');
            $this->form_validation->set_rules('notes', 'ملاحظات', 'trim|max_length[100]');
            $this->form_validation->set_rules('fax', 'رقم الفاكس', 'trim|max_length[30]');
            $this->form_validation->set_rules('parent_id', 'إسم الإدارة', 'required|trim|numeric');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => $errorMsg));
            } else {
                $data['department_id'] = $this->input->post('department_id');
                $data['department_name'] = $this->input->post('department_name');
                $data['address'] = $this->input->post('address');
                $data['phone'] = $this->input->post('phone');
                $data['notes'] = $this->input->post('notes');
                $data['mobile'] = $this->input->post('mobile');
                $data['fax'] = $this->input->post('fax');
                $data['parent_id'] = $this->input->post('parent_id');

                $result = $this->department_model->update_department($data);

                if ($result)
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة البيانات بنجاح'));
                else
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

}

/* End of file departments.php */    