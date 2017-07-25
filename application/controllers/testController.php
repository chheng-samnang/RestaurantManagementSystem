<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class testController extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('exrate_model','em');
	}
	function test()
	{
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('test');
		$this->load->view('template/footer');
	}
}