<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class ReceiptController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('receiptModel','rm');
		
	}

	function index($tab_id)
	{
		$data['exchange'] = $this->rm->getExchangeRate();
		$grandTotalUsd = $this->rm->getGrandTtl($tab_id,'USD',isset($data['exchange']->key_data)?$data['exchange']->key_data:'4000');
		$grandTotalKhr = $this->rm->getGrandTtl($tab_id,'KHR',isset($data['exchange']->key_data)?$data['exchange']->key_data:'4000');
		$data['grandTtlUsd'] = $grandTotalUsd;
		$data['grandTtlKhr'] = $grandTotalKhr;

		$this->form_validation->set_rules('txtCashInUsd','Cash In USD','required');
		$this->form_validation->set_rules('txtCashInKhr','Cash In KHR','required');
		
		if($this->form_validation->run()===false)
		{
			$this->load->view('template/header');
			$this->load->view('print_receipt',$data);
			$this->load->view('template/footer');
		}else
		{
			$invoiceID = $this->rm->getInvoiceID($tab_id);
			$this->rm->insertReceipt($invoiceID,$tab_id);
			redirect('index.php/pos_C');		
		}
		
	}
}