<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	class permissionModel extends CI_Model
	{
		function __construct(){
						parent::__construct();
						}
		function index(){
							$this->db->select('*');
							$this->db->from('tbl_permission');
							$query = $this->db->get();
							$result = $query->result();
							return $result;	
							//$this->db->select('*');
							//$this->db->from('tbl_permission');
							//$this->db->where('user_id');
							//$this->db->join('tbl_user','tbl_permission.user_crea=tbl_user.user_id');
				            //$query = $this->db->get();
							//var_dump($query);
							//return $query; 	
					     } 
		function check($user_id)
		 			{
		 			$this->db->where('user' , $user_id);
					$result = $this->db->get('tbl_permission');
					return $result->result_array(); 	
		 			}
		function permissionCreate($data,$user_id)
					{ 
						$result=$this->db->where('user',$user_id);
						if(!empty($result)=="")
						{

						}
						$result = $this->db->get('tbl_permission');
						$this->db->insert('tbl_permission',$data);
		              }
	    function getPermission($perm_id)
    		{
			$this->db->where('perm_id',$perm_id);
			$result = $this->db->get('tbl_permission');
			return $result->result_array();
    		}
    	function permissionEdit($data,$user_id)
    			{
    				$this->db->where('user',$user_id);
					$result = $this->db->update('tbl_permission',$data);
			    	return $result;
    			}
    	function permissionDelete($perm_id){
			   $this->db->where('perm_id',$perm_id);
			   $this->db->delete('tbl_permission');
			   die();
			   }
	}
?>
</body>
</html>