<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

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
        $this->load->model('product_model');
        $this->load->model('department_model');
        $this->load->model('company_model');

        define("USER_ROLE", $this->auth->get_user_role());
    }

    public function index() {
        $this->main_page();
    }

    /**
     * main_page 
     * 
     * function will display the dashboard
     * and load the index view
     * 
     * @access public
     * @return load view
     */
    public function main_page() {
        $this->load->view('webpages/index');
    }

    /**
     * add product 
     * 
     * function used to get categories and next order number and parsing
     * these information to loaded view to dispaly add form
     * 
     * @access public
     * @return load view
     */
    public function add_product() {
        if (USER_ROLE == ROLE_ONE) {
            $result['next_product_number'] = $this->product_model->next_product_number();
            $result['categories'] = $this->category_model->get_categories_id_name();
            $this->load->view('webpages/add_new_product', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * show all products 
     * 
     * function used to get product information from database
     * and send it's data to view to feach it into data-table
     * 
     * @access public
     * @return load view
     */
    public function show_all_products() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['products'] = $this->product_model->get_all_products();
            $this->load->view('webpages/show_all_products', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * show static products 
     * 
     * function used to get just static product information from database
     * and send it's data to view to feach it into data-table
     * 
     * @access public
     * @return load view
     */
    public function show_static_products() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['products'] = $this->product_model->get_static_products();
            $this->load->view('webpages/show_static_products', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * inserted_static_product
     * 
     * function get the inserted static vouchers depends on product Id
     * and parse this data to loaded view
     * 
     * @access public
     * @return load view
     */
    public function inserted_static_prod($product_id) {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['product_info'] = $this->product_model->get_inserted_static_prod($product_id, 'all');
            $this->load->view('webpages/manage_static_product', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * inserted_temporary_product
     * 
     * function get the inserted temporary vouchers depends on product Id
     * and parse this data to loaded view
     * 
     * @access public
     * @return load view
     */
    public function inserted_temp_prod($product_id) {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['product_info'] = $this->product_model->get_inserted_temp_prod($product_id);
            $this->load->view('webpages/manage_temp_product', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_add_product
     * 
     * function takes product information from view page and parse 
     * it to model class to store it in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_add_product() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
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
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * update_product
     * 
     * function will get product information from database depends 
     * on product id was sent from json and parse these in formation  
     * to loaded view
     * 
     * @access public
     * @return load view
     */
    public function update_product($product_id) {
        if (USER_ROLE == ROLE_ONE) {
            $result['categories'] = $this->category_model->get_categories_id_name();
            $result['product_info'] = $this->product_model->get_product_by_id($product_id);
            $this->load->view('webpages/update_product', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * update_ststaic_product
     * 
     * function get information about specific static product
     *  depend on voucher id and parse it to specic view responsible for display data 
     * 
     * @access public
     * @return load view
     */
    public function update_static_product($voucher_id) {
        if (USER_ROLE == ROLE_ONE) {
            $result['companies'] = $this->company_model->get_companies_id_name();
            $result['product_info'] = $this->product_model->get_static_product_by_voucherId($voucher_id);
            $this->load->view('webpages/update_static_inserted', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * update_temp_product
     * 
     * function get information about specific temporary product
     *  depend by id and parse it to specic view responsible for display data 
     * 
     * @access public
     * @return load view
     */
    public function update_temp_product($voucher_id) {
        if (USER_ROLE == ROLE_ONE) {
            $result['product_info'] = $this->product_model->get_temp_product_by_voucherId($voucher_id);
            $this->load->view('webpages/update_temp_inserted', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_update_ststaic_product
     * 
     * function takes static product information from view page and parse 
     * it to model class to update specific record in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_update_inserted_static_product() {
        if (USER_ROLE == ROLE_ONE) {
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
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_update_inserted_temp_product
     * 
     * function takes temporary product information from view page and parse 
     * it to model class to update specific record in database and return json 
     * have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_update_inserted_temp_product() {
        if (USER_ROLE == ROLE_ONE) {
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
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_update_product
     * 
     * function takes product information from view page and parse 
     * it to update_product in product_model class to update specific 
     * record in database and return json have transaction status
     * 
     * @access public
     * @return json
     */
    public function do_update_product() {
        if (USER_ROLE == ROLE_ONE) {
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
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_delete_product
     * 
     * function takes product id from json request and parse 
     * it to delete_product in product_model class to delete 
     * specific product from database and return transacton status
     * 
     * @access public
     * @return json
     */
    function do_delete_product() {
        if (USER_ROLE == ROLE_ONE) {
            $product_id = $this->input->post('product_id');
            $result = $this->product_model->delete_product($product_id);
            echo json_encode($result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_delete_inserted_product
     * 
     * function takes inserted voucher id from json request and parse 
     * it to delete_product in product_model class to delete 
     * specific product from database and return transacton status
     * 
     * @access public
     * @return json
     */
    function do_delete_inserted_product() {
        if (USER_ROLE == ROLE_ONE) {
            $voucher_id = $this->input->post('voucher_id');
            $result = $this->product_model->delete_inserted_product($voucher_id);
            echo json_encode($result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * dynamic_product_search
     * 
     * function takes keys and parse it to dynamic_product_search 
     * in product_model to get information about the keys
     * 
     * @access public
     * @return json
     */
    public function dynamic_product_search() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO || USER_ROLE == ROLE_THREE) {
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
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * product_unit_names
     * 
     * function takes product id and return units names  
     * 
     * @access public
     * @return json
     */
    function product_unit_names() {
        $product_id = $this->input->post('product_id');
        $result = $this->product_model->get_product_unit_names($product_id);
        echo json_encode($result);
    }

    /**
     * insert_products
     * 
     * function takes get companies and products information
     * and parse it to add form
     * 
     * @access public
     * @return load view
     */
    public function insert_products() {
        if (USER_ROLE == ROLE_ONE) {
            $result['companies'] = $this->company_model->get_companies_id_name();
            $result['products'] = $this->product_model->get_products_id_name('temp');
            $this->load->view('webpages/insert_products', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_insert_products
     * 
     * function takes information that added into user form
     * from json and call insert_product function in product_model
     * will return transaction status
     * 
     * @access public
     * @return json
     */
    public function do_insert_product() {
        if (USER_ROLE == ROLE_ONE) {
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
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * insert_static_product
     * 
     * function get category and products information
     * and pase these information to loaded view 
     * 
     * @access public
     * @return load view
     */
    public function insert_static_product() {
        if (USER_ROLE == ROLE_ONE) {
            $result['companies'] = $this->company_model->get_companies_id_name();
            $result['products'] = $this->product_model->get_products_id_name('static');
            $this->load->view('webpages/insert_static_product', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_insert_static_product
     * 
     * function takes information that added into user form
     * from json and call insert_static_product function in 
     * product_model will return transaction status
     * 
     * @access public
     * @return json
     */
    public function do_insert_static_product() {
        if (USER_ROLE == ROLE_ONE) {
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
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * supplies_order
     * 
     * function will get products inftomation and parse its to 
     * loaded view
     * 
     * @access public
     * @return load view
     */
    public function supplies_order() {
        if (USER_ROLE == ROLE_THREE) {
            $result['products'] = $this->product_model->get_temp_products();
            $this->load->view('webpages/supplies_order', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_supply_order
     * 
     * function have the response from stores manager to accept or refuse 
     * the orders that asked from departments..this function for temporaries
     * 
     * @access public
     * @return json
     */
    public function do_supply_order() {
        if (USER_ROLE == ROLE_THREE) {
            $supplies = json_decode($this->input->post('supplies_data'));
            foreach ($supplies as $data) {
                $result = $this->product_model->supplies_order($data);
            }
            echo json_encode($result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * do_static_supply_order
     * 
     * function have the response from stores manager to accept or refuse 
     * the orders that asked from departments...for static products
     * 
     * @access public
     * @return json
     */
    public function do_static_supply_order() {
        if (USER_ROLE == ROLE_THREE) {
            $supplies = json_decode($this->input->post('supplies_data'));
            foreach ($supplies as $data) {
                $result = $this->product_model->static_supplies_order($data);
            }
            echo json_encode($result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * static_supplies_order
     * 
     * function will get the ordered supplies that the acquired by
     * departments managers from calling get_temp_products in product
     * model and load view with these infromation
     * 
     * @access public
     * @return load view
     */
    public function static_supplies_order() {
        if (USER_ROLE == ROLE_THREE) {
            $result['departments'] = $this->department_model->get_departments_id_name();
            $result['products'] = $this->product_model->get_static_products();
            $this->load->view('webpages/static_supplies_order', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * get_order_number
     * 
     * function will get the next order number by calling get_order_number
     * in the model class and return json have this number
     * 
     * @access public
     * @return json
     */
    function get_order_number() {
        $result = $this->product_model->get_order_number();
        echo json_encode($result);
    }

    /**
     * get_insert_number
     * 
     * function will get the next order number by calling get_insert_number
     * in the model class and return json have this number
     * 
     * @access public
     * @return json
     */
    function get_insert_number() {
        $result = $this->product_model->get_insert_number();
        echo json_encode($result);
    }

//    function get_order_status() {
//        $order_number = $this->input->post('order_number');
//        $result = $this->product_model->get_order_status($order_number);
//        echo json_encode($result);
//    }

    /**
     * show_ordered_supplies
     * 
     * function will get the ordered supplies that the acquired by
     * departments managers from calling get_ordered_supplies in product
     * model and load view with these infromation
     * 
     * @access public
     * @return load view
     */
    public function show_ordered_supplies() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['orders'] = $this->product_model->get_ordered_supplies();
            $this->load->view('webpages/show_ordered_supplies', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * manage_temp_orders
     * 
     * function will get the ordered supplies that the acquired by
     * departments managers from calling get_ordered_supplies_byNumber
     *  in product model and load view with these infromation
     * 
     * @access public
     * @return load view
     */
    public function manage_temp_orders($order_number) {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $data['order_number'] = str_replace('-', '/', $order_number);
            $data['supplies'] = $this->product_model->get_ordered_supplies_byNumber($data['order_number']);
            $this->load->view('webpages/manage_temp_orders', $data);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * manage_static_orders
     * 
     * function will get the ordered supplies that the acquired by
     * departments managers from calling get_ordered_supplies_byNumber
     *  in product model and load view with these infromation
     * 
     * @access public
     * @return load view
     */
    public function manage_static_orders($order_number) {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $data['order_number'] = str_replace('-', '/', $order_number);
            $data['supplies'] = $this->product_model->get_ordered_supplies_byNumber($data['order_number']);
            $this->load->view('webpages/manage_static_orders', $data);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * spec_inserted_info
     * 
     * function will get specific inftomation about spicific inserted product
     * and will return json of transaction status
     * 
     * @access public
     * @return json
     */
    public function spec_inserted_info() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $product_id = $this->input->post('product_id');
            $result['product_info'] = $this->product_model->get_inserted_static_prod($product_id, 'part');
            echo $this->load->view('webpages/spec_inserted_static', $result);
        }
    }

    /**
     * do_refuse_order
     * 
     * function to refuse order asked by department manager
     * and will return json of transaction status
     * 
     * @access public
     * @return json
     */
    function do_refuse_order() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $order_number = $this->input->post('order_number');
            $result = $this->product_model->refuse_order($order_number);
            echo json_encode($result);
        }
    }

    /**
     * disburse_temp_supplies
     * 
     * function to accept and provid the departments with acquired products
     * and takes order number as parameters and return tarnsaction status
     * 
     * @access public
     * @return json
     */
    public function disburse_temp_supplies() {
        if (USER_ROLE == ROLE_ONE) {
            $disbursed = json_decode($this->input->post('disbursed'));
            foreach ($disbursed as $data) {
                $result = $this->product_model->disburse_temp_supplies($data);
            }
            echo json_encode($result);
        }
    }

    /**
     * disburse_static_supplies
     * 
     * function to accept and provid the departments with acquired products
     * and takes order number as parameters and return tarnsaction status
     * 
     * @access public
     * @return json
     */
    public function disburse_static_supplies() {
        if (USER_ROLE == ROLE_ONE) {
            $disbursed = json_decode($this->input->post('disbursed'));
            foreach ($disbursed as $data) {
                $result = $this->product_model->disburse_static_supplies($data);
            }
            echo json_encode($result);
        }
    }

    /**
     * department_borrowing
     * 
     * function will get all the products that borrowed by department id
     * 
     * @access public
     * @return load view
     */
    public function department_borrowing() {
        if (USER_ROLE == ROLE_THREE) {
            $data['department_id'] = $this->session->userdata('department_id');
            $result['borrowing'] = $this->product_model->department_borrowing($data);
            $this->load->view('webpages/department_borrowing', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * return_borrowing
     * 
     * function used to return product to repository depend on voudher id
     * and return transaction status
     * 
     * @access public
     * @return json
     */
    public function return_borrowing() {
        if (USER_ROLE == ROLE_THREE) {
            $data['voucher_id'] = $this->input->post('voucher_id');
            $result = $this->product_model->return_borrowing($data);
            echo json_encode($result);
        }
    }

    /**
     * audit_returns
     * 
     * function get all borrowed and returned product from departments
     * will call get_returned_products function from model
     * 
     * @access public
     * @return load view
     */
    public function audit_returns() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['returns'] = $this->product_model->get_returned_products();
            $this->load->view('webpages/audit_returns', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * damage_products
     * 
     * function get all damaged and stock products to test it
     * 
     * @access public
     * @return load view
     */
    public function damage_products() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $result['products'] = $this->product_model->get_products_for_damage();
            $this->load->view('webpages/damage_product', $result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * accept_damage
     * 
     * function to accept and disable this product 
     * will take voucher id and monitor ways
     * 
     * @access public
     * @return json
     */
    public function accept_damage() {
        if (USER_ROLE == ROLE_ONE) {
            $data['vouchers'] = $this->input->post('vouchers');
            $data['monitor_ways'] = $this->input->post('monitor_ways');
            $result = $this->product_model->accept_damge($data);
            echo json_encode($result);
        }
    }

    /**
     * changeProdStatus
     * 
     * function call changeProdStatus to update product status
     * this depend on voudher id and return transaction status
     * 
     * @access public
     * @return json
     */
    public function changeProdStatus() {
        if (USER_ROLE == ROLE_ONE) {
            $data['product_status'] = $this->input->post('product_status');
            $data['voucher_id'] = $this->input->post('voucher_id');
            $result = $this->product_model->changeProdStatus($data);
            echo json_encode($result);
        }
    }

    /**
     * extend_date
     * 
     * function call extend_date function to update reserve date
     * this depend on voudher id and return transaction status
     * 
     * @access public
     * @return json
     */
    public function extend_date() {
        if (USER_ROLE == ROLE_ONE) {
            $data['new_return_date'] = $this->input->post('new_return_date');
            $data['voucher_id'] = $this->input->post('voucher_id');
            $result = $this->product_model->extend_date($data);
            echo json_encode($result);
        }
    }

    /**
     * borrowing_info
     * 
     * function get information about borrowed product and call get_borrowing_byID
     * function depend on voucher id and return json of product info.
     * 
     * @access public
     * @return json
     */
    public function borrowing_info() {
        if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
            $data['voucher_id'] = $this->input->post('voucher_id');
            $result = $this->product_model->get_borrowing_byID($data['voucher_id']);
            echo json_encode($result);
        } else {
            $this->load->view('webpages/404');
        }
    }

//    public function inventory_supplies() {
//    if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) {
//        $result['categories'] = $this->category_model->get_categories_id_name();
//        $this->load->view('webpages/inventory_supplies', $result);
//    } else {
//            $this->load->view('webpages/404');
//        }
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
//    
//    function get_ProductsBy_CatID() {
//        $data['category_id'] = $this->input->post('category_id');
//        $data['prodType'] = $this->input->post('prodType');
//        $result = $this->product_model->get_ProductsBy_CatID($data);
//
//        echo json_encode($result);
//    }

    /**
     * disburse_servicing 
     * 
     * function used to disburse the services that was asked
     * from selling voucher depend on voucher id,reasons,
     * company id and return json
     * 
     * @access public
     * @return json
     */
    function disburse_servicing() {
        if (USER_ROLE == ROLE_ONE) {
            $data['voucher_id'] = $this->input->post('voucher_id');
            $data['reasons'] = $this->input->post('reasons');
            $data['company_id'] = $this->input->post('company_id');
            $result = $this->product_model->disburse_servicing($data);
            echo json_encode($result);
        } else {
            $this->load->view('webpages/404');
        }
    }

    /**
     * getNotification 
     * 
     * function used to get the orders unreadable from call  
     * getNotification function in model class and push it
     * to notify view
     * 
     * @access public
     * @return json
     */
    function getNotification() {
        if (USER_ROLE == ROLE_ONE) {
            $result['notify_orders'] = $this->product_model->getNotification();
            echo json_encode($result['notify_orders']);
        } else {
            $this->load->view('webpages/404');
        }
    }
    
    function getNotificationsNumber() {
        if (USER_ROLE == ROLE_ONE) {
            $result['NotificationsNumber'] = $this->product_model->getNotificationsNumber();
            echo json_encode($result['NotificationsNumber']);
        } else {
            $this->load->view('webpages/404');
        }
    }

}

/* End of file product.php */