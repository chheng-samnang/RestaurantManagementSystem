<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_order_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_M','om');
	}

	function index($orderID="")
	{
		if($orderID!="")
		{
			$data['hdr'] = $this->om->getOrder($orderID);
			$data['det'] = $this->om->getOrderDet($orderID);
			$this->load->view('template/style');
			$this->load->view('order_preview',$data);
		}else
		{
			$this->load->view('template/style');
			$this->load->view('order_preview');
		}

	}

	function preview_invoice($inv_id="")
	{
		if($inv_id!="")
		{
			$data["invoice"] = $this->om->getInvoice($inv_id);
			$this->load->view('template/style');
			$this->load->view('invoice_preview',$data);
		}else {
			$this->load->view('template/style');
			$this->load->view('invoice_preview');
		}

	}
}
