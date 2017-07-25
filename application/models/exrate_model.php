<?php
	/**
	* 
	*/
	class Exrate_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();			
		}

		function getExrate()
		{
				$query = $this->db->get_where('tbl_sysdata',array('key_type'=>'exrate'));
				return $query;
		}
		function insertExrate()
		{
			$rate = $this->input->post('txtExRate');
			$data = array(
							'key_type'=>'exrate',
							'key_code'=>date('YmdHis'),
							'key_data'=>$this->input->post('txtExRate'),
							'user_crea'=>$this->session->userLogin,
							'date_crea'=>date('Y-m-d')							
				);
			$this->db->insert('tbl_sysdata',$data);
		}
		function remove($id)
		{
			$this->db->delete('tbl_sysdata',array('key_code'=>$id));
		}
	}
?>