<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invoice extends CI_Controller{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('invioce_model');
	}
	public function index($id){
        if($id!=""){
        	$this->load->view('template/style');
            $invoiec_header = $this->invioce_model->getInvoiceHeader($id);
            $data["exchange"] = $this->invioce_model->getExchange(); 
            $data["invoice"] = $this->invioce_model->getInvoiceDetail($id);
            $data["invoiec_header"] = $invoiec_header; // Order detail
            //$data["select_inv_header"] = $this->invioce_model->selectInvoiceHeader();
            $this->load->view('print_invioce',$data);
        	$this->load->view('template/footer');

            if (isset($_POST["btn_print"])) {
                 //echo "<script>alert('".$this->uri->segment(1)."');</script>";
                $inv = $this->invioce_model->getInvoiceDetail($id);
                $select = $this->input->post('chk');
                $this->invioce_model->insetInvioceDetail($inv, $select);
                redirect('index.php/Print_invoice_c/index/'.$this->uri->segment(3));
            }
        }  
    }
    public function printInvoice($id, $id1){
        $data["invoiceheader"] = $this->invioce_model->InvoiceHeader($id);
        $data["invoicedetail"] = $this->invioce_model->InvoiceDetail($id1);
        $this->load->view('template/style');
        $this->load->view('invioce', $data);
   }
}