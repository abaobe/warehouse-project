<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('department_model');
    }

    public function index() {
        
    }

    public function add_user() {
        $result['roles'] = $this->user_model->get_all_roles();
        $result['departments'] = $this->department_model->get_departments_id_name();
        $this->load->view('webpages/add_user', $result);
    }

    public function do_add_user() {
        $status = "";
        $msg = "";
        $file_element_name = 'user_picture';

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        $config['max_size'] = 1024;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        } else {
            $picture = $this->upload->data();
            $data['first_name'] = $this->input->post('first_name');
            $data['middle_name'] = $this->input->post('middle_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['employee_number'] = $this->input->post('employee_number');
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password') . $this->input->post('username'));
            $data['phone_number'] = $this->input->post('phone_number');
            $data['mobile_number'] = $this->input->post('mobile_number');
            $data['department_id'] = $this->input->post('department_id');
            $data['user_role'] = $this->input->post('user_role');
            $data['email_address'] = $this->input->post('email_address');
            $data['user_picture'] = $picture['file_name'];
            $data['email_address'] = $this->input->post('email_address');
            $data['account_status'] = $this->input->post('account_status');

            $result = $this->user_model->do_add_user($data);
            if ($result) {
                $status = "success";
                $msg = "File successfully uploaded";
                echo json_encode($result);
            } else {
                unlink($picture['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
                echo json_encode($result);
            }
        }
        @unlink($_FILES[$file_element_name]);
//        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function users_management() {
        $fields = '"USER_ID","FIRST_NAME","MIDDLE_NAME","LAST_NAME","EMPLOYEE_NUMBER","ROLE_NAME","PHONE_NUMBER","MOBILE_NUMBER","ACCOUNT_STATUS","DEPARTMENT_NAME"';
        $result['users'] = $this->user_model->get_users($fields);
        $this->load->view('webpages/users_management', $result);
    }

    public function get_user() {
        $user_id = $this->input->post('user_id');
        $result['info'] = $this->user_model->get_user_byID($user_id);
        $this->load->view('webpages/show_user', $result);
    }

    public function update_user($user_id) {
        $result['roles'] = $this->user_model->get_all_roles();
        $result['info'] = $this->user_model->get_user_byID($user_id);
        $result['departments'] = $this->department_model->get_departments_id_name();
        $this->load->view('webpages/update_user', $result);
    }

    public function do_update_user() {
        $new_pic = $this->input->post('user_picture');
        if ($new_pic != NULL) {
            $status = "";
            $msg = "";
            $file_element_name = 'user_picture';

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt';
            $config['max_size'] = 1024;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $picture = $this->upload->data();
                $data['user_id'] = $this->input->post('user_id');
                $data['first_name'] = $this->input->post('first_name');
                $data['middle_name'] = $this->input->post('middle_name');
                $data['last_name'] = $this->input->post('last_name');
                $data['employee_number'] = $this->input->post('employee_number');
                $data['username'] = $this->input->post('username');
                $data['password'] = md5($this->input->post('password') . $this->input->post('username'));
                $data['phone_number'] = $this->input->post('phone_number');
                $data['mobile_number'] = $this->input->post('mobile_number');
                $data['department_id'] = $this->input->post('department_id');
                $data['user_role'] = $this->input->post('user_role');
                $data['email_address'] = $this->input->post('email_address');
                if ($new_pic == NULL)
                    $data['user_picture'] = $this->input->post('old_picture');
                else
                    $data['user_picture'] = $picture['file_name'];
                $data['email_address'] = $this->input->post('email_address');
                $data['account_status'] = $this->input->post('account_status');

                $result = $this->user_model->do_update_user($data);
                if ($result) {
                    $status = "success";
                    $msg = "File successfully uploaded";
                    unlink('./uploads/'.$this->input->post('old_picture'));
                    echo json_encode($result);
                } else {
                    unlink($picture['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                    echo json_encode($result);
                }
            }
            @unlink($_FILES[$file_element_name]);
            //        echo json_encode(array('status' => $status, 'msg' => $msg));
        } else {
            $data['user_id'] = $this->input->post('user_id');
            $data['first_name'] = $this->input->post('first_name');
            $data['middle_name'] = $this->input->post('middle_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['employee_number'] = $this->input->post('employee_number');
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password') . $this->input->post('username'));
            $data['phone_number'] = $this->input->post('phone_number');
            $data['mobile_number'] = $this->input->post('mobile_number');
            $data['department_id'] = $this->input->post('department_id');
            $data['user_role'] = $this->input->post('user_role');
            $data['email_address'] = $this->input->post('email_address');
            if ($this->input->post('user_picture') == NULL)
                $data['user_picture'] = $this->input->post('old_picture');
            else
                $data['user_picture'] = $picture['file_name'];
            $data['email_address'] = $this->input->post('email_address');
            $data['account_status'] = $this->input->post('account_status');

            $result = $this->user_model->do_update_user($data);
            if ($result) {
                $status = "success";
                $msg = "File successfully uploaded";
                echo json_encode($result);
            } else {
                unlink($picture['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
                echo json_encode($result);
            }
        }
    }
    
    public function do_delete_user() {
        $data['user_id'] = $this->input->post('user_id');
        $result = $this->user_model->delete_user($data);
        echo json_encode($result);
    }

}
//End of File