<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CloseShift_C extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		$this->load->model("closeShift_M");	
	}

	public function index()
	{   
		$sta=$this->closeShift_M->index();
		if($sta->sta != "Free")
		{ redirect('POS_C/index/0');}
		else
		{
			$this->load->view('template/header');
			$data['income']=$this->closeShift_M->income();
			$data['balance']=$this->closeShift_M->balance();
			$data['expense']=$this->closeShift_M->expense();			
			$this->load->view('closeShift_V',$data);
			$this->load->view('template/footer');
		}				
	}
	public function closeShift_prints()
	{
		#$this->load->view('template/header');
		$data['income']=$this->closeShift_M->income();
		$data['balance']=$this->closeShift_M->balance();
		$data['expense']=$this->closeShift_M->expense();			
		$this->load->view('closeShift_prints_V',$data);		
		#add to closeShift
		$this->closeShift_M->add_to_closeShift();
		#update 3 table(balance,sysdata,reciept)
		$this->closeShift_M->table3_status();	
		$this->load->view('template/footer');

	}

}
