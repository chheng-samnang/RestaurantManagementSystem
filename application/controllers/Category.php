<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
		 public function __construct()
    {
       parent:: __construct();
       $this->load->model('category_model'); 
       $this->session->set_userdata('user', 1);
    }
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/left');

		$this->load->model('category_model');
		$result = $this->category_model->index();
		$data = array('categorylist'=> $result);
		$this->load->view('category', $data);
		
		$this->load->view('template/footer');
	}
	public function add_category(){
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('add_category');
		$this->load->view('template/footer');
	}
	public function insert(){
		$this->form_validation->set_rules('category_name','Category Name','required');
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'cat_name'   =>$this->input->post('category_name'),
				'cat_name_kh'=>$this->input->post('category_kh'),
				'desc'       =>$this->input->post('desciption'),
				'user_crea'  =>$this->session->userLogin,
				'date_crea'	 =>date('Y-m-d')
				);
			$this->load->model('category_model');
			$result = $this->category_model->insert($data);
			redirect('index.php/Category/index');
			//extract($_POST);
			//if (isset($btn_Saveclose)){redirect('index.php/Category/index');}
			//if (isset($btn_Savenew)){$this->add_category();}
			
		}else
			$this->add_category();
	}
	public function update_category($cat_id=""){
		if($cat_id!="")
		{
			$this->load->view('template/header');
	        $this->load->view('template/left');
	        $data['record'] = $this->category_model->update_validation($cat_id);
	        $this->load->view('editcategory', $data);           
	        $this->load->view('template/footer');  
		}			
				
	}
	public function update($cat_id){
		$this->form_validation->set_rules('txtcategory_name','Category Name','required');
		if ($this->form_validation->run()==TRUE) {
			
			$this->category_model->update($cat_id);
			redirect('index.php/Category/index');

		}else $this->update_category($cat_id);
	}
	public function delete($cat_id=""){
		if($cat_id!=""){
			$this->category_model->delete($cat_id);

			$this->index();

			redirect('index.php/Category/index');

		}
	}
}
