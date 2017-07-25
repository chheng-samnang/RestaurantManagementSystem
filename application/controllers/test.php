<?php
	/**
	* 
	*/
	class Test extends CI_Controller
	{
		var $pageHeader,$panelTitle,$cancelString;
		function __construct()
		{
			parent::__construct();
			
		}

		function index()
		{
			$this->load->view("test");
		}
	}
?>