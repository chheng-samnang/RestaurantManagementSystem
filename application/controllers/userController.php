<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller {
	function __construct(){
					parent::__construct();
					$this->load->library('session');
					$this->load->library('form_validation');
					$this->load->model('userModel','um');
					
			 }
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/left');
		$data['get_user'] = $this->um->get_user();
		$this->load->view('userView',$data);
		$this->load->view('template/footer');

	}
	function user_create()
	{
	   $this->form_validation->set_rules('txtUserCode','User Code','required');
	   $this->form_validation->set_rules('txtUsername','Username','required');
	   $this->form_validation->set_rules('txtPassword','Password','required');
	   $this->form_validation->set_rules('txtConfirm','Confirm Password','required|matches[txtPassword]');

	   if($this->form_validation->run()==false)
	   {
	   		$this->load->view('template/header');
		    $this->load->view('template/left');
		    $this->load->view('userCreateView');
		    $this->load->view('template/footer');	
	   }else
	   {
	   		$this->um->user_create();
	   		redirect('index.php/userController');
	   }
	   
	}
	function change_password($id)
	{
		if($id!="")
		{	
			$this->form_validation->set_rules('txtNewPassword','New Password','required');
			$this->form_validation->set_rules('txtConfirm','Confirm New Password','required|matches[txtNewPassword]');

			if($this->form_validation->run()==false)
			{
				$data['query'] = $this->um->get_user_edit($id);
				$this->load->view('template/header');
			    $this->load->view('template/left');
			    $this->load->view('change_password',$data);
			    $this->load->view('template/footer');	
			}else
			{
				$this->um->updatePassword($id);
				redirect('index.php/userController');
			}
			
		}
	}
	function get_user()
	{  
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('userCreateView');
		$this->load->view('template/footer');
   }
 function get_user_edit($user_id)
    {
    	if($user_id!="")
    	{
    		$this->form_validation->set_rules('txtUsercode','User Code','required');
    		$this->form_validation->set_rules('txtUsername','Username','required');
    		if($this->form_validation->run()==false)
    		{
    			$data['status'] = array('1'=>'Enable','0'=>'Disable');
	    		$data['query'] = $this->um->get_user_edit($user_id);
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('userEditView',$data);
				$this->load->view('template/footer');	
    		}else
    		{
    			$this->um->user_edit($user_id);
    			redirect('index.php/userController');
    		}
    	}
	}
function user_delete($user_id){
	    $this->userModel->user_delete($user_id);
		$this->get_user();
	}
	function logout()
	{
		session_destroy();
		redirect("index.php/login");	
	}
}
