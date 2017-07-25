<?php
class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function validateUser($username)
	{
		if($username!="")
		{
			$query = $this->db->get_where('tbl_user',array('userCode'=>$username));
			if($query->num_rows()>0)
			{
				return true;
			}else
			{
				return 0;
			}
		}
	}
	public function validatePassword($password)
	{
		if($password!="")
		{

			$query = $this->db->get_where('tbl_user',array('password'=>$password));
			if($query->num_rows()>0)
			{
				return true;
			}else
			{
				return 0;
			}
		}
	}

	public function getUsercode($user)
	{
		$query = $this->db->get_where('tbl_user',array('userName'=>$user));
		return $query->row();
	}
}
?>