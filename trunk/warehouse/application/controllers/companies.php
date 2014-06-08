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
            $this->form_validation->set_rules('company_name', 'إسم الشركة', 'required|trim|max_length[35]');
            $this->form_validation->set_rules('license_number', 'رقم الترخيص', 'trim|max_length[25]');
            $this->form_validation->set_rules('telephone', 'رقم الهاتف', 'trim|max_length[30]');
            $this->form_validation->set_rules('mobile', 'رقم الجوال', 'trim|max_length[30]');
            $this->form_validation->set_rules('address', 'العنوان', 'required|trim|max_length[40]');
            $this->form_validation->set_rules('fax_number', 'رقم الفاكس', 'trim|max_length[30]');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => $errorMsg));
            } else {
                $data['company_name'] = $this->input->post('company_name');
                $data['license_number'] = $this->input->post('license_number');
                $data['telephone'] = $this->input->post('telephone');
                $data['mobile'] = $this->input->post('mobile');
                $data['address'] = $this->input->post('address');
                $data['fax_number'] = $this->input->post('fax_number');

                $result = $this->company_model->add_company($data);
                if ($result)
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة الصنف بنجاح'));
                else
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة تأكد من أن الرقم التسلسلي غير مكرر '));
            }
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
            $this->load->view('webpages/manage_companies');
        } else {
            $this->load->view('webpages/404');
        }
    }

    function get_all_companies() {
        $searchKey = $this->checkSearchKey(isset($_POST['sSearch']) ? $_POST['sSearch'] : '');
        $records_number = $this->company_model->get_companies_count($searchKey);
        $result['aaData'] = $this->company_model->get_all_companies($searchKey, $_POST['iDisplayStart'], $_POST['iDisplayLength']);
        $row = array();
        foreach ($result['aaData'] as $value) {
            $options = '';
            $record = array();
            $record[] = $value['RNUM'];
            $record[] = $value['COMPANY_NAME'];
            $record[] = $value['LICENSE_NUMBER'];
            $record[] = $value['TELEPHONE'];
            $record[] = $value['MOBILE'];
            $record[] = $value['FAX_NUMBER'];
            $record[] = $value['ADDRESS'];
            if (USER_ROLE == ROLE_ONE) {
                $options .= '<a href=update_company/' . $value['COMPANY_ID'] . ' class="btn mini purple"><i class="icon-edit"></i> تعديل</a> ';
                $options .= '<a href="#" onclick="delete_company('.$value['COMPANY_ID'].'?>,this);return false;"  class="btn mini purple"><i class="icon-trash"></i> حـذف</a>';
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
            if ($result)
                echo json_encode(array('status' => true, 'msg' => "تم حذف الشركة بنجاح"));
            else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة أو قد يكون هناك أصناف مدرجة لهذة الشركة'));
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
            $this->form_validation->set_rules('company_name', 'إسم الشركة', 'required|trim|max_length[35]');
            $this->form_validation->set_rules('license_number', 'رقم الترخيص', 'trim|max_length[25]');
            $this->form_validation->set_rules('telephone', 'رقم الهاتف', 'trim|max_length[30]');
            $this->form_validation->set_rules('mobile', 'رقم الجوال', 'trim|max_length[30]');
            $this->form_validation->set_rules('address', 'العنوان', 'required|trim|max_length[40]');
            $this->form_validation->set_rules('fax_number', 'رقم الفاكس', 'trim|max_length[30]');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => $errorMsg));
            } else {
                $data['company_id'] = $this->input->post('company_id');
                $data['company_name'] = $this->input->post('company_name');
                $data['license_number'] = $this->input->post('license_number');
                $data['telephone'] = $this->input->post('telephone');
                $data['mobile'] = $this->input->post('mobile');
                $data['address'] = $this->input->post('address');
                $data['fax_number'] = $this->input->post('fax_number');

                $result = $this->company_model->update_company($data);
                if ($result)
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة الشركة بنجاح'));
                else
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }
    
}

//End of File