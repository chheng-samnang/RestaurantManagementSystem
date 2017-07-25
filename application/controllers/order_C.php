<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_C extends CI_Controller {
    function __construct(){
					parent::__construct();
					$this->load->library('session');
					$this->load->library('form_validation');
					$this->load->model('order_M','um');
			 }
	public function index($tab="")
	{   
		if($tab!="")
		{
			if(isset($_POST['btnPrint']))
			{			
				$orderID = $this->input->post('txtOrder');
				$jsonData = json_decode($this->input->post('str'));
				$this->um->insertOrderDetail($jsonData,$this->session->bookID);
				redirect('index.php/print_order_controller/index/'.$orderID);
			}
			$data['query'] = $this->um->index();	
			$this->load->view('template/header');
			$this->load->view('form_order2',$data);
		}else
		{
			$this->load->view('template/header');
			$this->load->view('form_order2');	
		}
	}	
}
