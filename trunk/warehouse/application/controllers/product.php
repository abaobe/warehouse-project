<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->model('department_model');
        $this->load->model('company_model');
    }

    public function index() {
        $this->load->view('webpages/login');
    }

    public function main_page() {
        $this->load->view('webpages/index');
    }

    public function add_product() {
        $result['next_product_number'] = $this->product_model->next_product_number();
        $result['categories'] = $this->category_model->get_categories_id_name();
        $this->load->view('webpages/add_new_product', $result);
    }

    public function show_all_products() {
        $result['products'] = $this->product_model->get_all_products();
        $this->load->view('webpages/show_all_products', $result);
    }

    public function show_static_products() {
        $result['products'] = $this->product_model->get_static_products();
        $this->load->view('webpages/show_static_products', $result);
    }

    public function inserted_static_prod($product_id) {
        $result['product_info'] = $this->product_model->get_inserted_static_prod($product_id, 'all');
        $this->load->view('webpages/manage_static_product', $result);
    }

    public function inserted_temp_prod($product_id) {
        $result['product_info'] = $this->product_model->get_inserted_temp_prod($product_id);
        $this->load->view('webpages/manage_temp_product', $result);
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
        $data['quantity_status'] = $this->input->post('quantity_status');

        $result = $this->product_model->add_new_product($data);
        echo json_encode($result);
    }

    public function update_product($product_id) {
        $result['categories'] = $this->category_model->get_categories_id_name();
        $result['product_info'] = $this->product_model->get_product_by_id($product_id);
        $this->load->view('webpages/update_product', $result);
    }

    //this function for update static product in voucher_insert and static_product tables
    public function update_static_product($voucher_id) {
        $result['companies'] = $this->company_model->get_companies_id_name();
        $result['product_info'] = $this->product_model->get_static_product_by_voucherId($voucher_id);
        $this->load->view('webpages/update_static_inserted', $result);
    }

    public function update_temp_product($voucher_id) {
        $result['product_info'] = $this->product_model->get_temp_product_by_voucherId($voucher_id);
        $this->load->view('webpages/update_temp_inserted', $result);
    }

    public function do_update_inserted_static_product() {
        $data['voucher_id'] = $this->input->post('voucher_id');
        $data['received_from'] = $this->input->post('received_from');
        $data['billing_id'] = $this->input->post('billing_id');
        $data['notes'] = $this->input->post('notes');
        $data['quantity'] = $this->input->post('quantity');
        $data['unit_type'] = $this->input->post('unit_type');
        $data['unit_price'] = $this->input->post('unit_price');
        $data['currency_type'] = $this->input->post('currency_type');
        $data['product_status'] = $this->input->post('product_status');
        $data['product_nature'] = $this->input->post('product_nature');
        $data['supply_type'] = $this->input->post('supply_type');
        $data['expire_date'] = $this->input->post('expire_date');
        $data['serial_number'] = $this->input->post('serial_number');
        $result = $this->product_model->update_inserted_static_product($data);

        echo json_encode($result);
    }

    public function do_update_inserted_temp_product() {
        $data['voucher_id'] = $this->input->post('voucher_id');
        $data['received_from'] = $this->input->post('received_from');
        $data['billing_id'] = $this->input->post('billing_id');
        $data['notes'] = $this->input->post('notes');
        $data['quantity'] = $this->input->post('quantity');
        $data['unit_type'] = $this->input->post('unit_type');
        $data['unit_price'] = $this->input->post('unit_price');
        $data['currency_type'] = $this->input->post('currency_type');
        $result = $this->product_model->update_inserted_temp_product($data);

        echo json_encode($result);
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
        $data['quantity_status'] = $this->input->post('quantity_status');

        $result = $this->product_model->update_product($data);
        echo json_encode($result);
    }

    function do_delete_product() {
        $product_id = $this->input->post('product_id');
        $result = $this->product_model->delete_product($product_id);
        echo json_encode($result);
    }

    function do_delete_inserted_product() {
        $voucher_id = $this->input->post('voucher_id');
        $result = $this->product_model->delete_inserted_product($voucher_id);
        echo json_encode($result);
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
        $result['companies'] = $this->company_model->get_companies_id_name();
        $result['products'] = $this->product_model->get_products_id_name('temp');
        $this->load->view('webpages/insert_products', $result);
    }

    public function do_insert_product() {
        $inserts = json_decode($this->input->post('insert_orders'));
        foreach ($inserts as $item) {
            $data['product_id'] = $item[0];
            $data['received_from'] = $item[1];
            $data['billing_id'] = $item[2];
            $data['notes'] = $item[3];
            $data['quantity'] = $item[4];
            $data['unit_type'] = $item[5];
            $data['unit_price'] = $item[6];
            $data['currency_type'] = $item[7];
            $data['received_date'] = $item[8];
            $data['insert_number'] = $item[9];
            $result = $this->product_model->insert_product($data);
        }
        echo json_encode($result);
    }

    public function insert_static_product() {
        $result['companies'] = $this->company_model->get_companies_id_name();
        $result['products'] = $this->product_model->get_products_id_name('static');
        $this->load->view('webpages/insert_static_product', $result);
    }

    public function do_insert_static_product() {
        $data['product_id'] = $this->input->post('product_id');
        $data['received_from'] = $this->input->post('received_from');
        $data['billing_id'] = $this->input->post('billing_id');
        $data['notes'] = $this->input->post('notes');
        $data['quantity'] = $this->input->post('quantity');
        $data['unit_type'] = $this->input->post('unit_type');
        $data['unit_price'] = $this->input->post('unit_price');
        $data['currency_type'] = $this->input->post('currency_type');
        $data['product_status'] = $this->input->post('product_status');
        $data['product_nature'] = $this->input->post('product_nature');
        $data['supply_type'] = $this->input->post('supply_type');
        $data['expire_date'] = $this->input->post('expire_date');
        $data['serial_number'] = $this->input->post('serial_number');
        $data['insert_number'] = $this->input->post('insert_number');
        $result = $this->product_model->insert_static_product($data);

        echo json_encode($result);
    }

    public function supplies_order() {
//        $result['categories'] = $this->category_model->get_categories_id_name();
//        $result['departments'] = $this->department_model->get_departments_id_name();
        $result['products'] = $this->product_model->get_temp_products();
        $this->load->view('webpages/supplies_order', $result);
    }

    public function do_supply_order() {
        $supplies = json_decode($this->input->post('supplies_data'));
        foreach ($supplies as $data) {
            $result = $this->product_model->supplies_order($data);
        }
        echo json_encode($result);
    }

    public function do_static_supply_order() {
        $supplies = json_decode($this->input->post('supplies_data'));
        foreach ($supplies as $data) {
            $result = $this->product_model->static_supplies_order($data);
        }
        echo json_encode($result);
    }

    public function static_supplies_order() {
//        $result['categories'] = $this->category_model->get_categories_id_name();
        $result['departments'] = $this->department_model->get_departments_id_name();
        $result['products'] = $this->product_model->get_static_products();
        $this->load->view('webpages/static_supplies_order', $result);
    }

    function get_order_number() {
        $result = $this->product_model->get_order_number();
        echo json_encode($result);
    }

    function get_insert_number() {
        $result = $this->product_model->get_insert_number();
        echo json_encode($result);
    }

//    function get_order_status() {
//        $order_number = $this->input->post('order_number');
//        $result = $this->product_model->get_order_status($order_number);
//        echo json_encode($result);
//    }

    public function show_ordered_supplies() {
        $result['orders'] = $this->product_model->get_ordered_supplies();
        $this->load->view('webpages/show_ordered_supplies', $result);
    }

    public function manage_temp_orders($order_number) {
        $data['order_number'] = str_replace('-', '/', $order_number);
        $data['supplies'] = $this->product_model->get_ordered_supplies_byNumber($data['order_number']);
        $this->load->view('webpages/manage_temp_orders', $data);
    }

    public function manage_static_orders($order_number) {
        $data['order_number'] = str_replace('-', '/', $order_number);
        $data['supplies'] = $this->product_model->get_ordered_supplies_byNumber($data['order_number']);
        $this->load->view('webpages/manage_static_orders', $data);
    }

    public function spec_inserted_info() {
        $product_id = $this->input->post('product_id');
        $result['product_info'] = $this->product_model->get_inserted_static_prod($product_id, 'part');
        echo $this->load->view('webpages/spec_inserted_static', $result);
    }

    function do_refuse_order() {
        $order_number = $this->input->post('order_number');
        $result = $this->product_model->refuse_order($order_number);
        echo json_encode($result);
    }

    public function disburse_temp_supplies() {
        $disbursed = json_decode($this->input->post('disbursed'));
        foreach ($disbursed as $data) {
            $result = $this->product_model->disburse_temp_supplies($data);
        }
        echo json_encode($result);
    }

    public function disburse_static_supplies() {
        $disbursed = json_decode($this->input->post('disbursed'));
        foreach ($disbursed as $data) {
            $result = $this->product_model->disburse_static_supplies($data);
        }
        echo json_encode($result);
    }

    public function department_borrowing() {
        $data['department_id'] = 2; // this value will gives from session.
        $result['borrowing'] = $this->product_model->department_borrowing($data);
        $this->load->view('webpages/department_borrowing', $result);
    }

    public function return_borrowing() {
        $data['voucher_id'] = $this->input->post('voucher_id');
        $result = $this->product_model->return_borrowing($data);
        echo json_encode($result);
    }

    public function audit_returns() {
        $result['returns'] = $this->product_model->get_returned_products();
        $this->load->view('webpages/audit_returns', $result);
    }

    public function damage_products() {
        $result['products'] = $this->product_model->get_products_for_damage();
        $this->load->view('webpages/damage_product', $result);
    }

    public function accept_damage() {
        $data['vouchers'] = $this->input->post('vouchers');
        $data['monitor_ways'] = $this->input->post('monitor_ways');
        $result = $this->product_model->accept_damge($data);
        echo json_encode($result);
    }

    public function changeProdStatus() {
        $data['product_status'] = $this->input->post('product_status');
        $data['voucher_id'] = $this->input->post('voucher_id');
        $result = $this->product_model->changeProdStatus($data);
        echo json_encode($result);
    }

    public function extend_date() {
        $data['new_return_date'] = $this->input->post('new_return_date');
        $data['voucher_id'] = $this->input->post('voucher_id');
        $result = $this->product_model->extend_date($data);
        echo json_encode($result);
    }

    public function borrowing_info() {
        $data['voucher_id'] = $this->input->post('voucher_id');
        $result = $this->product_model->get_borrowing_byID($data['voucher_id']);
        echo json_encode($result);
    }

//    public function inventory_supplies() {
//        $result['categories'] = $this->category_model->get_categories_id_name();
//        $this->load->view('webpages/inventory_supplies', $result);
//    }
//    public function show_all_borrowing() {
//        $data['department_id'] = 1;
//        $result['borrowing'] = $this->product_model->get_all_borrowing();
//        $this->load->view('webpages/show_all_borrowing', $result);
//    }
//
//    public function return_borrowing() {
//        $data['department_name'] = $this->input->post('department_name');
//        $data['borrowing'] = $this->product_model->get_borrowing_by_department_name($data['department_name']);
//        $this->load->view('webpages/return_borrowing', $data);
//    }
//
//    public function do_return_borrowing() {
//        $data['borrowing_id'] = $this->input->post('borrowing_id');
//        $data['quantity_returned'] = $this->input->post('quantity_returned');
//        $data['unit_type'] = $this->input->post('unit_type');
//        $data['status_returned'] = $this->input->post('status_returned');
//        $data['notes'] = $this->input->post('notes');
//        $result = $this->product_model->return_borrowing($data);
//        echo json_encode($result);
//    }
    function get_ProductsBy_CatID() {
        $data['category_id'] = $this->input->post('category_id');
        $data['prodType'] = $this->input->post('prodType');
        $result = $this->product_model->get_ProductsBy_CatID($data);

        echo json_encode($result);
    }

    function disburse_servicing() {
        $data['voucher_id'] = $this->input->post('voucher_id');
        $data['reasons'] = $this->input->post('reasons');
        $data['company_id'] = $this->input->post('company_id');
        $result = $this->product_model->disburse_servicing($data);
        echo json_encode($result);
    }

}

/* End of file product.php */