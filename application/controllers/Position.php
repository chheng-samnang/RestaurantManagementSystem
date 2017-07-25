<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller{
	 public function __construct()
    {
       parent:: __construct();
       $this->load->model('position_model'); 
       
    }
	public function index()
	{
		$this->load->view('template/header'); // header
		$this->load->view('template/left');// left

		$this->load->model('position_model');
		$result = $this->position_model->index();
		$data = array('positionlist'=> $result); // selete data
		$this->load->view('position', $data);

		$this->load->view('template/footer');// Footer
	}
	public function add_position(){
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('add_position');
		$this->load->view('template/footer');
		
	}
	
	public function insert(){
		$this->form_validation->set_rules('position_name','Position Name','required');
		if ($this->form_validation->run()==TRUE) {
				$data = array(
				'pos_name'    =>$this->input->post('position_name'),
				'pos_name_kh' =>$this->input->post('position_kh'),
				'des'         =>$this->input->post('desciption'),
				);
			$this->load->model('position_model');
		 	$result = $this->position_model->insert($data);
		 	$this->index();
		}else $this->add_position();
	}
	// Insert data 
	public function update_validation($pos_id){
		$this->load->view('template/header');
        $this->load->view('template/left');
        $data['record']=$this->position_model->update_validation($pos_id); 
        $this->load->view('editposition', $data);           
        $this->load->view('template/footer');  
	}
	public function update($pos_id){
		$this->form_validation->set_rules('position_name','Position Name','required');
        if($this->form_validation->run()==TRUE)
        {
      
            $this->position_model->update($pos_id);
            redirect('index.php/Position/index');
        }
        else $this->update_validation($pos_id);
	}
	// Update data
	public function delete($pos_id){
		$this->position_model->delete($pos_id);

		$this->index();

		redirect('index.php/Position/index');

	}
	// Delete data


}// Class