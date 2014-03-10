<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->model('department_model');
    }

    public function index() {
        $this->load->view('webpages/login');
    }

    public function add_product() {
        $result['categories'] = $this->category_model->get_all_categories();
        $this->load->view('webpages/add_new_product', $result);
    }

    public function show_all_products() {
        $result['products'] = $this->product_model->get_all_products();
        $this->load->view('webpages/show_all_products', $result);
    }

    public function do_add_product() {
        $data['product_name'] = $this->input->post('product_name');
        $data['product_number'] = $this->input->post('product_number');
        $data['product_type'] = $this->input->post('product_type');
        $data['notes'] = $this->input->post('notes');
        $data['category_id'] = $this->input->post('category_id');
        $data['width'] = $this->input->post('width');
        $data['height'] = $this->input->post('height');
        $data['h_length'] = $this->input->post('h_length');
        $data['re_demand_border'] = $this->input->post('re_demand_border');
        $data['primary_unit_name'] = $this->input->post('primary_unit_name');
        $data['secondary_unit_name'] = $this->input->post('secondary_unit_name');
        $data['primary_unit_quantity'] = $this->input->post('primary_unit_quantity');
        $data['secondary_unit_quantity'] = $this->input->post('secondary_unit_quantity');
        $data['status'] = $this->input->post('status');

        $result = $this->product_model->add_new_product($data);
        echo json_encode($result);
    }

    public function update_product($product_id) {
        $result['categories'] = $this->category_model->get_all_categories();
        $result['product_info'] = $this->product_model->get_product_by_id($product_id);
        $this->load->view('webpages/update_product', $result);
    }

    public function do_update_product() {
        $data['product_id'] = $this->input->post('product_id');
        $data['product_name'] = $this->input->post('product_name');
        $data['product_number'] = $this->input->post('product_number');
        $data['product_type'] = $this->input->post('product_type');
        $data['notes'] = $this->input->post('notes');
        $data['category_id'] = $this->input->post('category_id');
        $data['width'] = $this->input->post('width');
        $data['height'] = $this->input->post('height');
        $data['h_length'] = $this->input->post('h_length');
        $data['re_demand_border'] = $this->input->post('re_demand_border');
        $data['primary_unit_name'] = $this->input->post('primary_unit_name');
        $data['secondary_unit_name'] = $this->input->post('secondary_unit_name');
        $data['primary_unit_quantity'] = $this->input->post('primary_unit_quantity');
        $data['secondary_unit_quantity'] = $this->input->post('secondary_unit_quantity');

        $result = $this->product_model->update_product($data);
        echo json_encode($result);
    }

    function do_delete_product() {
        $product_id = $this->input->post('product_id');
        $result = $this->product_model->delete_product($product_id);
        echo json_encode($product_id);
    }

    public function dynamic_product_search() {
        $key = $this->input->get('term');
        $result['prod'] = $this->product_model->dynamic_product_search($key);
        $data = array();
        foreach ($result['prod'] as $value) {
            $data[] = array(
                'label' => $value['PRODUCT_NAME'],
                'value' => $value['PRODUCT_ID']
            );
        }
        echo json_encode($data);
        flush();
    }

    function product_unit_names() {
        $product_id = $this->input->post('product_id');
        $result = $this->product_model->get_product_unit_names($product_id);
        echo json_encode($result);
    }

    public function insert_products() {
        $this->load->view('webpages/insert_products');
    }

    public function do_insert_product() {
        $data['product_id'] = $this->input->post('product_id');
        $data['received_from'] = $this->input->post('received_from');
        $data['billing_id'] = $this->input->post('billing_id');
        $data['notes'] = $this->input->post('notes');
        $data['unit_type'] = $this->input->post('unit_type');
        $data['quantity'] = $this->input->post('quantity');
        $data['unit_price'] = $this->input->post('unit_price');
        $data['currency_type'] = $this->input->post('currency_type');

        $result = $this->product_model->insert_product($data);
        echo json_encode($result);
    }

    public function supplies_order() {
        $result['departments'] = $this->department_model->get_departments_names();
        $this->load->view('webpages/supplies_order', $result);
    }

    public function do_supply_order() {
        $supplies = json_decode($this->input->post('supplies_data'));
        foreach ($supplies as $data) {
            $result = $this->product_model->supplies_order($data);
        }
        echo json_encode($result);
    }

    function get_order_number() {
        $result = $this->product_model->get_order_number();
        echo json_encode($result);
    }

    function get_order_status() {
        $order_number = $this->input->post('order_number');
        $result = $this->product_model->get_order_status($order_number);
        echo json_encode($result);
    }

    public function show_ordered_supplies() {
        $result['orders'] = $this->product_model->get_supplies_id();
        $this->load->view('webpages/show_ordered_supplies', $result);
    }

    public function disburse_supplies() {
        $data['order_number'] = $this->input->post('order_number');
        $result = $this->product_model->get_ordered_supplies_byNumber($data['order_number']);
        $data['supplies'] = $result;
        $this->load->view('webpages/disburse_supplies', $data);
    }

    function do_refuse_order() {
        $order_number = $this->input->post('order_number');
        $result = $this->product_model->refuse_order($order_number);
        echo json_encode($order_number);
    }

    public function do_disburse_supplies() {
        $data['order_supplies_id'] = $this->input->post('order_number');
        $data['quantity_disbursed'] = $this->input->post('quantity_disbursed');
        $data['unit_type'] = $this->input->post('unit_type');
        $data['notes'] = $this->input->post('notes');

        $result = $this->product_model->disburse_supplies($data);
        echo json_encode($result);
    }

    public function do_all_disburse_supplies() {
        $data['order_number'] = $this->input->post('order_number');
        $data['quantity_disbursed'] = $this->input->post('quantity_disbursed');
        $data['unit_type'] = $this->input->post('unit_type');
        $data['notes'] = $this->input->post('notes');
        $index = $this->input->post('index');
        $size = $this->input->post('size');

        $result = $this->product_model->disburse_supplies($data);
        if ($index == $size) {
            echo json_encode($result);
        }
    }

    public function inventory_supplies() {
        $result['categories'] = $this->category_model->get_all_categories();
        $this->load->view('webpages/inventory_supplies', $result);
    }

    public function show_all_borrowing() {
        $result['borrowing'] = $this->product_model->get_all_borrowing();
        $this->load->view('webpages/show_all_borrowing', $result);
    }

    public function return_borrowing() {
        $data['department_name'] = $this->input->post('department_name');
        $data['borrowing'] = $this->product_model->get_borrowing_by_department_name($data['department_name']);
        $this->load->view('webpages/return_borrowing', $data);
    }

    public function do_return_borrowing() {
        $data['borrowing_id'] = $this->input->post('borrowing_id');
        $data['quantity_returned'] = $this->input->post('quantity_returned');
        $data['unit_type'] = $this->input->post('unit_type');
        $data['status_returned'] = $this->input->post('status_returned');
        $data['notes'] = $this->input->post('notes');
        $result=  $this->product_model->return_borrowing($data);
        echo json_encode($result);
    }

}

/* End of file product.php */