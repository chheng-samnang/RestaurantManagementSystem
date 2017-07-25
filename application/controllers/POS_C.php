<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class POS_C extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("POS_M");
	}

	public function index()
	{   $this->load->library('form_validation');
		$this->load->view('template/header');
		$data['record']=$this->POS_M->index();
		$this->load->view('POS_V',$data);
		$this->load->view('template/footer');
	}

	public function order()
	{
		$this->form_validation->set_rules('order','Table','required');
		if($this->form_validation->run()==TRUE)
		{
			$tab_id = $this->input->post("order");
			$book_id= $this->input->post("bookID");
			$data=$this->POS_M->check_status($tab_id);
			$data1['sta_error']='Table '.$data->tab_name.' was '.$data->sta;

			extract($_POST);
				#btnOrder
	            if(isset($btnOrder)){
	            	$data=$this->POS_M->check_status($tab_id);

	            	if($data->sta!="Waiting")
	            	{
	            		$this->session->bookID = $book_id;
	            		redirect('index.php/order_C/index/'.$tab_id);
	            	}
	            	else{
							$this->load->view('template/header');
							$data1['record']=$this->POS_M->index();
							$this->load->view('POS_V',$data1);
							$this->load->view('template/footer');
	            		}
	            }#end btnOrder
	            #btnChangeTable
	            if(isset($btnChangeTable)){
	            	$data=$this->POS_M->check_status($tab_id);
	            	if($data->sta=="Busy")
	            	{
	            		redirect('index.php/change_table_C/index/'.$tab_id);
	            	}
	            	else{
							$this->load->view('template/header');
							$data1['record']=$this->POS_M->index();
							$this->load->view('POS_V',$data1);
							$this->load->view('template/footer');
	            		}
	            }#end btnChangeTable
	            #btnInvoice
	            if(isset($btnInvoice)){
	            	$data=$this->POS_M->check_status($tab_id);
	            	if($data->sta=="Busy")
	            	{
	            		redirect('index.php/invoice2Controller/index/'.$tab_id);
	            		//echo "Ok";
	            	}
	            	else{
							$this->load->view('template/header');
							$data1['record']=$this->POS_M->index();
							$this->load->view('POS_V',$data1);
							$this->load->view('template/footer');
	            		}
	            }#end btnInvoice
	            #btnReceipt
	            if(isset($btnReceipt)){
	            	$data=$this->POS_M->check_status($tab_id);
	            	if($data->sta=="Waiting")
	            	{
	            		redirect('index.php/receiptController/index/'.$tab_id);
	            	}
	            	else{
							$this->load->view('template/header');
							$data1['record']=$this->POS_M->index();
							$this->load->view('POS_V',$data1);
							$this->load->view('template/footer');
	            		}

	            }#end btnReceipt
	            if(isset($btnBook)){
	            	$data=$this->POS_M->check_status($tab_id);
	            	$data1=$this->POS_M->check_book($tab_id);
	            	if($data->sta=="Book" or $data->sta=="Free")
	            	{
	            		redirect('index.php/bookController/index/'.$tab_id);
	            	}
	            	else{
							$this->load->view('template/header');
							$data1['record']=$this->POS_M->index();
							$this->load->view('POS_V',$data1);
							$this->load->view('template/footer');
	            		}
	            }

		}
		else $this->index();

	}
}
