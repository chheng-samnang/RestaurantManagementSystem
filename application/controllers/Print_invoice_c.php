<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Print_invoice_c extends CI_Controller{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('invioce_model');

	}
		public function index($id)
		{
			if ($id!="") {
			
				$data["invoiceheader"] = $this->invioce_model->InvoiceHeader($id);
			    $data["invoicedetail"] = $this->invioce_model->InvoiceDetail($id);
			    $this->load->view('template/style');
			    $this->load->view('invioce', $data);
				
			}
		}

}