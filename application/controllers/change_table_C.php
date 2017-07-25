<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_table_C extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("change_table_M");
	}
	public function index($id)
	{   	
		$this->session->set_userdata('id',$id);	
		$this->load->library('form_validation');
		$this->load->view('template/header');		
		$data['record']=$this->change_table_M->index();
		$data['table_id']=$id;			
		$this->load->view('change_table_V',$data);
		$this->load->view('template/footer');
	}

	public function update()
	{		
		$this->form_validation->set_rules('new_tab_id','Table','required');
		if($this->form_validation->run()==TRUE)
		{
			$this->change_table_M->update();
			redirect('POS_C');								            	
		}
		else $this->index($this->session->userdata('id'));				
		
	}
}
