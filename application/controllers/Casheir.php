<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
class Casheir extends CI_Controller {
	public function __construct()
    {
       parent:: __construct();
       $this->load->model('Casheir_model');
    }
    public function index(){
    	$this->load->view('template/header');
      $record = $this->Casheir_model->index();
      $data["record"] = $record;  
      $this->load->view('casheir', $data);
      $this->load->view('template/footer'); 
    }
}