<?php
	class UserModel extends CI_Model{
		 function __construct() {
						parent::__construct();
						$this->load->helper("security");
						}
		 function index(){
			 
					}
		 function get_user()
				 {
					$this->db->select('*');
					$this->db->from('tbl_user');
					$query = $this->db->get();
					$result = $query->result();
					return $result;	 	
				 }
			   //select all user to view
		 function user_login($user,$password)
				 {    
					$this->db->where('userName', $user);
					$this->db->where('password',$password);
					return $this->db->get('tbl_user')->result_array();
				 }//_______________User_login____________
		 function check($user_code)
		 			{
		 			 $this->db->where('userCode' , $user_code);
					$result = $this->db->get('tbl_user');
					return $result->result_array(); 	
		 			}
		 function check_user($user_id)
		 			{
		 			$this->db->where('user_id', $user_id);
					$result = $this->db->get('tbl_user');
					return $result->result_array(); 	
		 			}
		 function user_create(){
		 				$userLogin = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
		 				$data = array(
		 						'userCode'=>$this->input->post('txtUserCode'),
		 						'userName'=>$this->input->post('txtUsername'),
		 						'password'=>do_hash($this->input->post('txtPassword')),
		 						'des'=>$this->input->post('txtDesc'),
		 						'status'=>$this->input->post('ddlStatus'),
		 						'user_crea'=>$userLogin,
		 						'date_crea'=>date('Y-m-d')
		 					);
			         	$this->db->insert('tbl_user',$data);
					}
				 //create new user.............
		function updatePassword($id)
		{
			$this->db->where('user_id',$id);
			$data = array(
							'password'=>do_hash($this->input->post('txtNewPassword'))
					);
			$this->db->update('tbl_user',$data);
		}
		function get_user_edit($user_id)
		         {
					$this->db->where('user_id',$user_id);
					$result = $this->db->get('tbl_user');
					return $result->row();
		        }
		       //get user from database to show on vrew form......
		 function user_edit($user_id)
		 		{
					$this->db->where('user_id',$user_id);
					$data = array(
									'userCode'=>$this->input->post('txtUsercode'),
									'userName'=>$this->input->post('txtUsername'),
									'des'=>$this->input->post('txtDesc'),
									'status'=>$this->input->post('ddlStatus'),
									'user_updt'=>$this->session->userLogin,
									'date_updt'=>date('Y-m-d')
						);
					$result = $this->db->update('tbl_user',$data);
			    }
			    //edit user ...........
		function get_passwd($user_id)
				{   
					$this->db->where('user_id',$user_id);
					$result = $this->db->get('tbl_user');
					return $result->result_array();
				}
				//get password to edit
	    function change_passwd($user_id,$user_passwd)
	             { 
	              $this->db->where('user_id',$user_id);
	              $this->db->where('password',$user_passwd);
	           	return $this->db->get('tbl_user')->result_array();
	             }
	             //check password and user id
	    function updat_passwd($data,$user_id)
	    		{	$this->db->where('user_id',$user_id);
					$result = $this->db->update('tbl_user',$data);
			    	return $result;
	    		}
	    	 //insert to database after edited...........
	}
?>
