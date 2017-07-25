<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model','lm');
		$this->load->helper('security');
	}
	public function index()
	{
		//echo do_hash('123');
		$this->form_validation->set_rules('txtUsername','User Name','required');
		$this->form_validation->set_rules('txtPass','Password','required');
		
		if($this->form_validation->run()==false)
		{
			$data["msg"] = "";
			$this->load->view('template/login',$data);
		}else
		{
			$username = $this->input->post('txtUsername');
			$pass = do_hash($this->input->post('txtPass'));
			$result = $this->lm->validateUser($username);
			if($result==0)
			{
				$data["msg"] = "Incorrect Username";
				$this->load->view('template/login',$data);
			}else
			{
				$result = $this->lm->validatePassword($pass);
				if($result!=0)
				{
					$this->session->userLogin = $username;
					$this->session->site_lang="khmer";
					redirect("main");
				}else
				{
					$data['msg'] = "Incorrect Password!!!";
					$this->load->view("template/login",$data);
				}
			}
		}
	}
}
