<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice2Controller extends CI_Controller
{
	var $selectedInvDet = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('invoice2Model','im');
		$this->load->model("order_m","om");
	}

	public function index($tab_id)
	{
		if ($tab_id!="")
		{
				$data['invHdr'] = $this->im->selectOrderHdr($tab_id);
				$data['invDet'] = $this->im->selectOrderDet($tab_id);
				$data['invNo'] = date('YmdHis');
				$invNO = $this->input->post("txtInvNo");
				$this->selectedInvDet = $data['invDet'];

			if (isset($_POST['btnPrint']))
			{
				$invDet = $this->im->selectOrderDet($tab_id);
				$selected = $this->input->post('chk');

				$this->im->insertInvoice($invDet,$selected);
				redirect(base_url()."index.php/print_order_controller/preview_invoice/".$this->input->post('txtInvNo'));
			}else {
				$this->load->view('template/header');
				$this->load->view('invoice2',$data);
				$this->load->view('template/footer');
			}

		}
	}
}
