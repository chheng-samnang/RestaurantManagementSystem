<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller 
{

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
		$this->load->model('staff_model','sm');
		$this->load->model('userModel','um');
	}
	public function index()
	{
		$data["query"] = $this->sm->loadStaff();

		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('staff',$data);
		$this->load->view('template/footer');
	}
	
	public function addStaff()
	{
		
       	$config['upload_path']          = 'assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

		$options = array(
		'none'	 => 'Choose One',
        'm'      => 'Male',
        'f'      => 'Female'
		);

		$status = array(
		'1'		=>	'Enable',
		'0'		=>	'Disable'
		);

		$user = $this->um->get_user();

		$pos = $this->sm->getPos();
		$data['user'] = $user;
		$data['pos'] = $pos;
		$data['option'] = $options;
		$data['status'] = $status;

		

		$this->form_validation->set_rules('txtStaffName','Staff Name','required');
		$this->form_validation->set_rules('txtDOB','Date of Birth','required');
		if($this->form_validation->run()==false)
		{
			if ( ! $this->upload->do_upload('btnUpload'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	   			$data["error"] = $error;     
	        }
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('add_staff',$data);
			$this->load->view('template/footer');
		}else
		{
			$this->sm->saveStaff();
			redirect("staff");
		}
		
	}
	public function editStaff($id)
	{
		if($id!="")
		{
			$options = array(
			'none'	 => 'Choose One',
	        'm'      => 'Male',
	        'f'      => 'Female'
			);

			$status = array(
			'1'		=>	'Enable',
			'0'		=>	'Disable'
			);

			$pos = $this->sm->getPos();
			$data['pos'] = $pos;
			$data['option'] = $options;
			$data['status'] = $status;

			$config['upload_path']          = 'assets/uploads/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;

	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);

	        $user = $this->um->get_user();
	        $data["user"] = $user;
			$this->form_validation->set_rules('txtStaffName','Staff Name','required');
			$this->form_validation->set_rules('txtDOB','Date of Birth','required');
			if($this->form_validation->run()==false)
			{				
				$query = $this->sm->loadStaff($id);
				$data["row"] = $query;
				$this->load->view("template/header");
				$this->load->view("template/left");
				$this->load->view("edit_staff",$data);
				$this->load->view("template/footer");
			}else
			{				
				if ($this->upload->do_upload('btnUpload'))
                {
                	$data = array('upload_data' => $this->upload->data());
                    $this->sm->updateStaff($id,$data);
                    redirect("staff");                            
                }else
                {
                	$this->sm->updateStaff($id,$data);
                    redirect("staff");
                }
			}
		}
	}
	public function deleteStaff($id)
	{
		if($id!="")
		{
			$this->sm->deleteStaff($id);
			$msg = "This user has been deleted successfully!";
			$data['msg'] = $msg;
			$data['query'] = $this->sm->loadStaff();
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('staff',$data);
			$this->load->view('template/footer');
		}
	}
	public function viewStaff($id)
	{
		if($id!="")
		{
			$data["row"] = $this->sm->loadStaff($id);
			$this->load->view("template/header");
			$this->load->view("template/left");
			$this->load->view("staff_view",$data);
			$this->load->view("template/footer");
		}
	}
}
