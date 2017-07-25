<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExrateController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('exrate_model','em');
	}

	public function index()
	{   
		$data['rate'] = $this->em->getExrate();
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('exrate',$data);
		$this->load->view('template/footer');
	}

	function addRate()
	{
		$this->form_validation->set_rules('txtExRate','Exchange Rate','required|numeric');

		if($this->form_validation->run()==false)
		{
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('add_rate');
			$this->load->view('template/footer');	
		}else
		{
			$this->em->insertExrate();
			redirect('index.php/ExrateController');
		}
		
	}

	function removeRate($id)
	{
		if ($id!="") {
			$this->em->remove($id);
			redirect('index.php/ExrateController');
		}
	}
}
