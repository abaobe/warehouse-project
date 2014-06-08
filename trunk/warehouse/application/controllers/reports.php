<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('company_model');
    }

    public function index() {
        
    }

    public function input() {


        $this->load->view('reports/input');
    }

    public function insert_products() {
        $inserts['products'] = json_decode($this->input->get_post('insert_orders'));
        for ($index = 0; $index < count($inserts['products']); $index++) {
            $inserts['products'][$index][10] = $this->product_model->get_product_by_id($inserts['products'][$index][0]);
            $inserts['products'][$index][11] = $this->company_model->get_companyName_by_id($inserts['products'][$index][1]);
        }


        $inserts['services'] = json_decode($this->input->get_post('services'));
        $this->load->view('reports/print_inserted_products', $inserts);
        echo json_encode($inserts['products'][0]);
        //substr($inserts[0][0], 0,strpos($inserts[0][0],'--'));
        //substr($inserts[0][0], strpos($inserts[0][0], '--')+2);
    }

    public function do_print_insert_products() {
        $this->load->view('reports/print_inserted_products');
        $data_print = json_decode($this->input->post('data_html'));
        $aaa = $this->input->post('aaa');
        $this->load->library('MPDF57/mpdf');
        $mpdf = new mPDF('ar', 'A4', '', '', 0, 0, 0, 0, 0, 0);
        $mpdf->SetDirectionality('rtl');
        // $mpdf->SetAutoFont();
        //$mpdf = new mPDF();
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        //$stylesheet = file_get_contents('resource/assets/temp/bootstrap.min.css'); // external css
        $stylesheet = file_get_contents('resource/css/custom_style.css'); // external css

        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML('$data_print' . $data_print, 2);
        //ob_end_clean();
        $mpdf->Output();
        echo json_encode($aaa);
    }

    public function receive() {

        $this->load->view('reports/receive');
    }

    public function card() {
        $this->load->view('reports/card');
    }

    public function output() {

        $inserts['disbursed'] = json_decode($this->input->get_post('disbursed'));
        $this->load->view('reports/output', $inserts);
    }
    
    public function vouchers_output() {
        $order_number=  $this->input->get_post('order_number');
        $voucher['products']=  $this->product_model->get_voucher_output_by_order_number($order_number);
        //echo json_encode($voucher['products']);
        $this->load->view('reports/voucher_output', $voucher);
    }

    public function borrow() {
        $borrowing['products'] = json_decode($this->input->get_post('borrows'));
        for ($index = 0; $index < count($borrowing['products']); $index++) {
            $borrowing['products'][$index][7] = $this->product_model->get_ordered_supplies_byNumber($borrowing['products'][$index][4]);
            //$borrowing['products'][$index][6] = $this->product_model->get_staticProduct_status($borrowing['products'][$index][3]);
        }
        $this->load->view('reports/borrow', $borrowing);
    }
    
    public function vouchers_borrowing() {
        $order_number=  $this->input->get_post('order_number');
        $voucher['products']=  $this->product_model->get_voucher_borroing_by_order_number($order_number);
        //echo json_encode($voucher['products']);
        $this->load->view('reports/voucher_borrowing', $voucher);
    }

    public function back() {
        $back['product_status'] = $this->input->get_post('product_status');
        $back['voucher_id_borrowing'] = $this->input->get_post('voucher_id');
        $back['department_name'] = $this->input->get_post('department_name');
        $back['main_department'] = $this->input->get_post('main_department');
        $back['product_info'] = $this->product_model->get_static_product_by_voucherId_borrowing($back['voucher_id_borrowing']);
        //echo json_encode($back['main_department']);
        $this->load->view('reports/back',$back);
    }
    
    public function vouchers_backing() {
        $voucher_id=  $this->input->get_post('voucher_id');
        $voucher['products']=  $this->product_model->get_voucher_backing_by_voudcher_id($voucher_id);
        //echo json_encode($voucher['products']);
        $this->load->view('reports/voucher_backing', $voucher);
    }

    public function corrupted() {
        $dam_prod=json_decode($this->input->get_post('vouchers'));
        $damage_products['products']=array();
        $damage_products['monitor_ways']=json_decode($this->input->get_post('monitor_ways'));
        $i=0;
        foreach ($dam_prod as $value) {
            if ($value!=NULL) {
                $damage_products['products'][$i]=  $this->product_model->get_product_info_by_inserted_voucherId($value);
                $i++;
            }
        }
        $this->load->view('reports/corrupted',$damage_products);
    }
    
    public function vouchers_corrupted() {
        $order_id=  $this->input->get_post('order_id');
        $voucher['products']=  $this->product_model->get_voucher_corrupted_by_order_id($order_id);
        //echo json_encode($voucher['products']);
        $this->load->view('reports/voucher_corrupted', $voucher);
    }
    
    

}

//end controller