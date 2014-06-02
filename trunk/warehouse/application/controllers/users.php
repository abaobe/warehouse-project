<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

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
        $this->load->model('user_model');
        $this->load->model('department_model');
        define("USER_ROLE", $this->auth->get_user_role());
    }

    public function index() {
        $this->login();
    }

    function login() {
        $this->load->view('webpages/login');
    }

    /**
     * do_login
     * 
     * function takes username and password from login form
     * and will check if these inf. is valid or not by calling 
     * doLogin function in model
     * 
     * @access public
     * @return json
     */
    function do_login() {
        $this->form_validation->set_rules('username', 'إسم المستخدم', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'كلمة المرور', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => 'false', 'msg' => $errorMsg));
        } else {
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
            $info = $this->user_model->do_login($data);
            if (count($info) && $info[0]['ACCOUNT_STATUS'] == 'active') {
                $this->auth->fill_session($info[0]);
                echo json_encode(array('status' => 'true', 'msg' => 'تم تسجيل الدخول بنجاح'));
            } else if (count($info) == 1 && $info[0]['ACCOUNT_STATUS'] == 'inactive') {
                echo json_encode(array('status' => 'blocked', 'msg' => 'عذراً حسابك مقفل يجب عليك مراجعة المسؤول'));
            } else if (count($info) < 1) {
                echo json_encode(array('status' => 'false', 'msg' => 'خطأ في إسم المستخدم أو كلمة المرور'));
            }
        }
    }

    /**
     * loginout
     * 
     * function call logout function to destroy the user session
     * 
     * @access public
     * @return void
     */
    function logout() {
        $this->auth->logout();
    }

    /**
     * add_user 
     * 
     * function used to get roles infromation and get departments id,names
     * and parsing these information to loaded view to dispaly add form
     * 
     * @access public
     * @return load view
     */
    function add_user() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_FOUR) {
            $result['roles'] = $this->user_model->get_all_roles();
            $result['departments'] = $this->department_model->get_departments_id_name();
            $this->load->view('webpages/add_user', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_add_user
     * 
     * function takes user information from view page and parse 
     * it to model class to store it in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    function do_add_user() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_FOUR) {
            $this->form_validation->set_rules('first_name', 'الإسم الأول', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('middle_name', 'الإسم الثاني', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('last_name', 'الإسم العائلة', 'required|trim|max_length[25]');
            $this->form_validation->set_rules('employee_number', 'الرقم الوظيفي', 'required|trim|max_length[30]|numeric');
            $this->form_validation->set_rules('username', 'إسم المستخدم', 'required|trim|max_length[50]'); //|numeric
            $this->form_validation->set_rules('password', 'كلمة المرور', 'required|trim|max_length[50]|matches[repassword]'); //|min_length[6]
            $this->form_validation->set_rules('repassword', 'كلمة المرور المعادة', 'required|trim|max_length[50]');
            $this->form_validation->set_rules('phone_number', 'رقم الهاتف', 'trim|max_length[20]');
            $this->form_validation->set_rules('mobile_number', 'رقم الهاتف المحمول', 'trim|max_length[20]');
            $this->form_validation->set_rules('department_id', 'الدائرة التي ينتمي إليها', 'required|trim');
            $this->form_validation->set_rules('user_role', 'صلاحية المستخدم', 'required|trim');
            $this->form_validation->set_rules('email_address', 'البريد الإلكتروني', 'required|trim|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => htmlentities($errorMsg)));
            } else {
                $status = "";
                $msg = "";
                $file_element_name = 'user_picture';
                $imageName = $this->uploadImage($file_element_name);
                $this->generateThumb(35, 35);
                @unlink($_FILES[$file_element_name]);

                $data['first_name'] = $this->input->post('first_name');
                $data['middle_name'] = $this->input->post('middle_name');
                $data['last_name'] = $this->input->post('last_name');
                $data['employee_number'] = $this->input->post('employee_number');
                $data['username'] = $this->input->post('username');
                $data['password'] = md5($this->input->post('password'));
                $data['phone_number'] = $this->input->post('phone_number');
                $data['mobile_number'] = $this->input->post('mobile_number');
                $data['department_id'] = $this->input->post('department_id');
                $data['user_role'] = $this->input->post('user_role');
                $data['email_address'] = $this->input->post('email_address');
                $data['user_picture'] = ($imageName != 'false') ? $imageName : '';
                $data['account_status'] = $this->input->post('account_status');

                $result = $this->user_model->do_add_user($data);
                if ($result) {
                    //$status = "success";$msg = "File successfully uploaded";
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة المستخدم بنجاح'));
                } else {
                    //$status = "error";$msg = "Something went wrong when saving the file, please try again.";
                    unlink('./uploads/' . $imageName);
                    unlink('./uploads/thumbs/' . $imageName);
                    echo json_encode(array('status' => false, 'msg' => htmlentities('هناك خطأ في البيانات المدخلة')));
                }
            }
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * generateThumb
     * 
     * function will resize the actual image and store it into project folder
     * 
     * @access public
     * @return void
     */
    function generateThumb($width = 35, $height = 35) {
        $config['new_image'] = './uploads/thumbs/' . $this->upload->file_name;
        $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $height;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    /**
     * uploadImage
     * 
     * function will take the actual image and store it into project folder
     * 
     * @access public
     * @return void
     */
    function uploadImage($file_element_name) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_element_name)) {
            $msg = $this->upload->display_errors('', '');
            return 'false';
        } else {
            $picture = $this->upload->data();
            return $picture['file_name'];
        }
    }

    /**
     * users_management 
     * 
     * function used to get users by calling get_users function
     * in model class and parsing these information to loaded view
     * 
     * @access public
     * @return load view
     */
    public function users_management() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO || USER_ROLE == ROLE_FOUR) {
            $fields = '"USER_ID","FIRST_NAME","MIDDLE_NAME","LAST_NAME","EMPLOYEE_NUMBER","ROLE_NAME","PHONE_NUMBER","MOBILE_NUMBER","ACCOUNT_STATUS","DEPARTMENT_NAME"';
            $result['users'] = $this->user_model->get_users($fields);
            $this->load->view('webpages/users_management', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * get_user 
     * 
     * function used to get user inforamtion by calling get_user_byID
     * in model class and parsing these information to loaded view
     * 
     * @access public
     * @return load view
     */
    public function get_user() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO || USER_ROLE == ROLE_FOUR) {
            $user_id = $this->input->post('user_id');
            $result['info'] = $this->user_model->get_user_byID($user_id);
            $this->load->view('webpages/show_user', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * update_user
     * 
     * function will get user information from database depends 
     * on user id was sent from json and get roles inforamtion
     * parse these in formation  to loaded view
     * 
     * @access public
     * @return load view
     */
    public function update_user($user_id) {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_FOUR) {
            $result['roles'] = $this->user_model->get_all_roles();
            $result['info'] = $this->user_model->get_user_byID($user_id);
            $result['departments'] = $this->department_model->get_departments_id_name();
            $this->load->view('webpages/update_user', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_update_user
     * 
     * function takes user information from view page and parse 
     * it to model class to update specific record in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_update_user() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_FOUR) {
            $this->form_validation->set_rules('first_name', 'الإسم الأول', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('middle_name', 'الإسم الثاني', 'required|trim|max_length[20]');
            $this->form_validation->set_rules('last_name', 'الإسم العائلة', 'required|trim|max_length[25]');
            $this->form_validation->set_rules('employee_number', 'الرقم الوظيفي', 'required|trim|max_length[30]|numeric');
            $this->form_validation->set_rules('username', 'إسم المستخدم', 'required|trim|max_length[50]'); //|numeric
            $this->form_validation->set_rules('password', 'كلمة المرور', 'required|trim|max_length[50]|matches[repassword]'); //|min_length[6]
            $this->form_validation->set_rules('repassword', 'كلمة المرور المعادة', 'required|trim|max_length[50]');
            $this->form_validation->set_rules('phone_number', 'رقم الهاتف', 'trim|max_length[20]');
            $this->form_validation->set_rules('mobile_number', 'رقم الهاتف المحمول', 'trim|max_length[20]');
            $this->form_validation->set_rules('department_id', 'الدائرة التي ينتمي إليها', 'required|trim');
            $this->form_validation->set_rules('user_role', 'صلاحية المستخدم', 'required|trim');
            $this->form_validation->set_rules('email_address', 'البريد الإلكتروني', 'required|trim|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $errorMsg = validation_errors();
                echo json_encode(array('status' => false, 'msg' => htmlentities($errorMsg)));
            } else {
                $new_pic = $this->input->post('user_picture');
                $status = "";
                $msg = "";
                if ($new_pic != NULL) {
                    $file_element_name = 'user_picture';
                    $imageName = $this->uploadImage($file_element_name);
                    $this->generateThumb(35, 35);
                }
                $data['user_id'] = $this->input->post('user_id');
                $data['first_name'] = $this->input->post('first_name');
                $data['middle_name'] = $this->input->post('middle_name');
                $data['last_name'] = $this->input->post('last_name');
                $data['employee_number'] = $this->input->post('employee_number');
                $data['username'] = $this->input->post('username');
                $data['password'] = md5($this->input->post('password'));
                $data['phone_number'] = $this->input->post('phone_number');
                $data['mobile_number'] = $this->input->post('mobile_number');
                $data['department_id'] = $this->input->post('department_id');
                $data['user_role'] = $this->input->post('user_role');
                $data['email_address'] = $this->input->post('email_address');
                if ($new_pic == NULL)
                    $data['user_picture'] = $this->input->post('old_picture');
                else
                    $data['user_picture'] = ($imageName != 'false') ? $imageName : '';
                $data['email_address'] = $this->input->post('email_address');
                $data['account_status'] = $this->input->post('account_status');

                $result = $this->user_model->do_update_user($data);
                if ($result) {
                    if ($new_pic != NULL) {
                        unlink('./uploads/' . $this->input->post('old_picture'));
                        unlink('./uploads/thumbs/' . $this->input->post('old_picture'));
                    }
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة المستخدم بنجاح'));
                } else {
                    unlink('./uploads/' . $imageName);
                    unlink('./uploads/thumbs/' . $imageName);
                    echo json_encode(array('status' => false, 'msg' => htmlentities('هناك خطأ في البيانات المدخلة')));
                }
            }
        }
    }

    /**
     * do_delete_user
     * 
     * function takes user id from json request and parse 
     * it to delete_user in user_model class to delete 
     * specific user from database and return transacton status
     * 
     * @access public
     * @return json
     */
    public function do_delete_user() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_FOUR) {
            $data['user_id'] = $this->input->post('user_id');
            $result = $this->user_model->delete_user($data);
            if ($result)
                echo json_encode(array('status' => true, 'msg' => "تم حذف المستخدم بنجاح"));
            else
                echo json_encode(array('status' => false, 'msg' => ' هناك خطأ في البيانات المدخلة'));
        } else {
            $this->load->view('webpages/404');
        }
    }

    function users_statistics() {
        $result['info'] = $this->user_model->users_statistics();
        echo json_encode($result);
    }

}
//End of File