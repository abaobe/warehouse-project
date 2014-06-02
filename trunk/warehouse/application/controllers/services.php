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
        $this->load->model('company_model');

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
            $result['companies'] = $this->company_model->get_companies_id_name();
            $this->load->view('webpages/add_service', $result);
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
            $this->form_validation->set_rules('service_name', 'إسم الخدمة', 'required|trim|max_length[40]');
            $this->form_validation->set_rules('provided_by', 'الجهة التي قدمت الخدمة', 'required|trim');
            $this->form_validation->set_rules('billing', 'رقم الفاتورة', 'trim|max_length[20]');
            $this->form_validation->set_rules('cost', 'تكلفة الخدمة', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('currency_type', 'تحديد العملة', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('notes', 'ملاحظات', 'trim|max_length[100]');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => $errorMsg));
            } else {
                $data['service_name'] = $this->input->post('service_name');
                $data['provided_by'] = $this->input->post('provided_by');
                $data['billing'] = $this->input->post('billing');
                $data['cost'] = $this->input->post('cost');
                $data['currency_type'] = $this->input->post('currency_type');
                $data['notes'] = $this->input->post('notes');
                $data['quantity'] = $this->input->post('quantity');

                $result = $this->service_model->add_service($data);
                if ($result)
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة الخدمة بنجاح'));
                else
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة '));
            }
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
            $vouchers_ids = ",";
            $flag = false;
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
                if ($result != -1) {
                    $vouchers_ids .= $result . ",";
                    $flag = true;
                } else if ($result == -1) {
                    $flag = false;
                    $result2 = $this->service_model->delete_many_services($vouchers_ids);
                }
                if ($flag != true)
                    break;
            }
            if ($flag) {
                echo json_encode(array('status' => true, 'msg' => $result."تم إدخال البيانات بنجاح"));
            } else {
                echo json_encode(array('status' => false, 'msg' => $result2."لم يتم إدخال البيانات هناك خطأ في البيانات المدخلة"));
            }
        }
    }
}
//End of File