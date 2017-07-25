
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PermissionController extends CI_Controller
{
	function __construct()
			{
					parent::__construct();
					$this->load->library('session');
					$this->load->library('form_validation');
					$this->load->model('permissionModel');
					$this->load->model('userModel');
					$this->load->library('session');
					//$this->load->validate_user();		
			 }
	function index()
			{
				$user=$_COOKIE["UserLogin"];
				$this->header_life();
				$data['get_permission']=$this->permissionModel->index();
				$this->load->view('permissionView',$data);
				$this->footer();
			}
	function header_life()
	           {
	           	$this->load->view('template/header');
				$this->load->view('template/left');
	           }
	function footer()
	    		{
	    		$this->load->view('template/footer');
	    		}
	function permissionCreate()
	         {	         
				$this->header_life();
				$data['get_user'] = $this->userModel->get_user();
				$this->load->view('permissionCreate',$data);
				$this-> footer();
	         }
	//redirectTo form create permission............

	function permissionCreated()
			 {  
			 	if($this->input->post('txtuser')!="" && $this->input->post('txtform')!="")
			 	{    
			 		$user_id=$this->input->post('txtuser');
			 		 $check=$this->permissionModel->check($user_id);
			 		 
			 		 if(empty($check))
				 		{
						if($this->input->post('cbadd')   ==1){ $checkasdd  ="1"; }else{$checkasdd="0";}
						if($this->input->post('cbdelete')==1){ $checkdelete="1"; }else{$checkdelete="0";}
						if($this->input->post('cbupdate')==1){ $checkupdate="1"; }else{$checkupdate="0";}
				 		$data=array(	
			 	    	'user'     => $this->input->post('txtuser'),
			 	    	'add'      => $this->check=$checkasdd,
			 	    	'edit'     => $this->check=$checkdelete,
			 	    	'delete'   => $this->check=$checkupdate,
			 	    	'form'     => $this->input->post('txtform'),
			 	    	'user_crea'=> $_COOKIE["UserLogin"],
			 	    	'date_crea'=> date('y/m/d'),
			 	    	);
			 	    	$this->permissionModel->permissionCreate($data,$user_id);
						$this->index();
				 		}
				 		else
						{
						$this->header_life();
						$data=array('msg'     => $this->sms="This permission have been created ...... ",
						            'get_user' => $this->userModel->get_user(),);
						$this->load->view('permissionCreate',$data);
						$this->footer();
						}
			 	}
		    }
		  // created permission ............
    function getPermission($perm_id)
	        { 
			$this->header_life();
			$data['get_permission']=$this->permissionModel->getPermission($perm_id);
			$this->load->view('permissionEditView',$data);
			$this->footer();
	        }
	function permissionEdit($user_id)	
			 {   
				if($this->input->post('cbadd')   ==1){ $checkasdd  ="1"; }else{$checkasdd  ="0";}
				if($this->input->post('cbdelete')==1){ $checkdelete="1"; }else{$checkdelete="0";}
				if($this->input->post('cbupdate')==1){ $checkupdate="1"; }else{$checkupdate="0";}
				$data=array(
						'user'     => $this->input   ->post('txtuser_id'),
						'add'      => $this->check   =$checkasdd,
						'edit'     => $this->check   =$checkdelete,
						'delete'   => $this->check   =$checkupdate,
						'form'     => $this->input   ->post('txtform'),
						'user_updt'=> $_COOKIE["UserLogin"],
			 	    	'date_updt'=> date('y/m/d'),
					);
					$this->permissionModel->permissionEdit($data , $user_id);
					$this->index();
			 }
	function permissionDelete($perm_id)
	           {
			    $this->permissionModel->permissionDelete($perm_id);
			    redirect('permissionView');
			   }

}

			 
	
 