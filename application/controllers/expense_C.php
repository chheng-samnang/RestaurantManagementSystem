<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_C extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("expense_M");		
	}

	public function index()
	{
		$this->load->view('template/header');
		$data['record']=$this->expense_M->index();
		$this->load->view('expense_V',$data);
		$this->load->view('template/footer');
	}
	public function add_show()
	{
		$this->load->view('template/header');		
		$this->load->view('expense_add_V');
		$this->load->view('template/footer');
	}
	public function insert()
	{
		$this->form_validation->set_rules('txtName','Expense name','required');		
		if($this->form_validation->run()==TRUE)
		{
			$this->expense_M->insert();
			extract($_POST);
            if(isset($btnSave)){redirect('index.php/expense_C/index');}
            if(isset($btnSaveNew)){redirect('index.php/expense_C/add_show');} 
			$this->index();
		}
		else $this->add_show();		
	}
	public function delete($id)
	{
		$this->expense_M->delete($id);
		$this->index();
	}
	public function edit_show($id)
	{
		$this->load->view('template/header');
		$data['record']=$this->expense_M->edit_validation($id);
		$this->load->view('expense_edit_V',$data);
		$this->load->view('template/footer');
	}
	public function change($id)
    {
         $this->form_validation->set_rules('txtName','Extra name','required');         
        if($this->form_validation->run()==TRUE)
        {                  
            $this->expense_M->change($id);
            redirect('index.php/expense_C/index');
        }                
        else $this->edit_show($id);      
    }   
}