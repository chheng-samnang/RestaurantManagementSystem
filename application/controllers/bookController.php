<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bookController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("book_M");
	}
	public function index($id)
	{           			
		$this->load->view('template/header');		
		$data['record']=$this->book_M->index($id);
        $data['table_id']=$id;        			
		$this->load->view('book_V',$data);
		$this->load->view('template/footer');
	}
	public function add($id)
	{   	
		$this->session->set_userdata('id',$id);						
		$this->load->view('template/header');		
		$data['id']=$id;				
		$this->load->view('book_add_V',$data);
		$this->load->view('template/footer');
	}
	public function validation_add()
    {
        $this->form_validation->set_rules('txtCustomerName','Customer name','required');
        $this->form_validation->set_rules('txtPhone','Phone number','required');
        $this->form_validation->set_rules('txtPeople','People Amount number','required');
        $this->form_validation->set_rules('txtTime','Time book','required');            
        if($this->form_validation->run()==TRUE)
        {                                           
           $data['error']=$this->book_M->add();
           if($data['error']==true)
           {
             $this->session->set_userdata('error',$data['error']);    
           }                                                                                                                                 
        }
        else $this->add($this->session->userdata('id'));
    } 
    public function edit($id)
    {
    	$this->session->set_userdata('id',$id);						
		$this->load->view('template/header');
		$data['record']=$this->book_M->edit($id);
        $data['record1']=$this->book_M->select_table_free();								
		$this->load->view('book_edit_V',$data);
		$this->load->view('template/footer');
    }
    public function edit_validation($id)
    {    	
    	$this->session->set_userdata('tab_id',$id);
    	$this->form_validation->set_rules('txtCustomerName','Customer name','required');
        $this->form_validation->set_rules('txtPhone','Phone number','required');
        $this->form_validation->set_rules('txtPeople','People Amount number','required');
        $this->form_validation->set_rules('txtTime','Time book','required');
        if($this->form_validation->run()==TRUE)
        {             
           $this->book_M->edit_validation($this->session->userdata('tab_id'));             
        }
        else $this->edit($this->session->userdata('id'));	
    } 
    public function delete($id)
    {
    	$this->book_M->delete($id);    	
    }	
}
