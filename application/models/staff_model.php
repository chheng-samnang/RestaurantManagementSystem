<?php

class Staff_model extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();	
	}
	public function loadStaff($id="")
	{
		if($id=="")
		{
			$this->db->select('*');
			$this->db->from('tbl_staff');
			$this->db->join('tbl_position', 'tbl_staff.pos_id = tbl_position.pos_id');
			$query = $this->db->get();			
			return $query;

		}else
		{
			$this->db->select('*');
			$this->db->from('tbl_staff');
			$this->db->join('tbl_position', 'tbl_staff.pos_id = tbl_position.pos_id');
			$this->db->where('staff_id',$id);
			$query = $this->db->get();
			return $query->row();
		}
	}
	public function loadUser()
	{
		$query = $this->db->get('tbl_user');
		return $query->result_array();
	}
	public function getPos()
	{
		$query = $this->db->get('tbl_position');		
		return $query->result_array();
	}
	public function saveStaff()
	{
		$this->input->post("txtDOB");
		$data = array(
						'staff_name'=>$this->input->post('txtStaffName'),
						'staff_name_kh'=>$this->input->post('txtStaffNameKh'),
						'sex'=>$this->input->post('ddlSex'),
						'dob'=>$this->input->post('txtDOB'),
						'pob'=>$this->input->post('txtPOB'),
						'pos_id'=>$this->input->post('ddlPos'),
						'addr'=>$this->input->post('txtAddr'),
						'phone'=>$this->input->post('txtPhone'),
						'email'=>$this->input->post('txtEmail'),
						'fb'=>$this->input->post('txtfb'),
						'status'=>$this->input->post('ddlStatus'),
						'img'=>$this->input->post('txtUpload'),
						'user_code'=>$this->input->post('ddlUser'),
						'user_crea'=>$this->session->userLogin,
						'date_crea'=>date('Y-m-d')
			);
		$this->db->insert('tbl_staff',$data);		
	}
	public function deleteStaff($id)
	{
		$this->db->delete('tbl_staff', array('staff_id' => $id));
	}
	public function updateStaff($id,$upload)
	{
		if($id!="")
		{

			$img = empty($upload)?"":$upload["upload_data"]["file_name"];
			$data = array(
						"staff_name"=>$this->input->post("txtStaffName"),
						"staff_name_kh"=>$this->input->post("txtStaffNameKh"),
						"sex"=>$this->input->post("ddlSex"),
						"dob"=>$this->input->post("txtDOB"),
						"pob"=>$this->input->post("txtPOB"),
						"pos_id"=>$this->input->post("ddlPos"),
						"addr"=>$this->input->post("txtAddr"),
						"phone"=>$this->input->post("txtPhone"),
						"email"=>$this->input->post("txtEmail"),
						"fb"=>$this->input->post("txtfb"),
						"status"=>$this->input->post("ddlStatus"),
						"img"=>$img,
						"user_code"=>$this->input->post("ddlUser"),
						"user_updt"=>$this->session->userLogin,
						"date_updt"=>date("Y-m-d")
				);
			$this->db->where("staff_id",$id);
			$this->db->update("tbl_staff",$data);
		}
	}
}