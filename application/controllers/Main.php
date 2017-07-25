<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("main_model","mm");
	}
	public function index()
	{   
		$query = $this->mm->get_menu_count_by_category();
		$openingBal = $this->mm->get_opening_balance();
		
		if ($openingBal->num_rows()>0) {
			$data["openingBalance"] = $openingBal->row()->opening_balance;
		}else
		{
			$data["openingBalance"] = 0;
		}
		
		$endingBal = $this->mm->get_ending_balance();

		$data["endingBalance"] = $endingBal->ending_balance;

		$data["expense"] = $this->mm->get_expense();
		
		if($query->num_rows()>0)
		{
			$query->result()[0]->exploded = "true";
			$data["query"] = $query->result();	
		}else
		{
			$data["query"] = array(array("name"=>"None","y"=>0));
		}

		//var_dump($endingBal);
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('main',$data);
		$this->load->view('template/footer');
	}	
}
