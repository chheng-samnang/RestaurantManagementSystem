<?php
class Position_model extends CI_Model
{
	private $table = "tbl_position";
	public function __construct(){
		parent::__construct();
	}
	function index(){
		return $this->db->get("$this->table");
	}
	// selete data 
	public function insert(){
		$data = array(
				'pos_name'    =>$this->input->post('position_name'),
				'pos_name_kh' =>$this->input->post('position_kh'),
				'des'         =>$this->input->post('desciption'),

			);
		$this->db->insert("$this->table",$data);
	}// insert data

	public function update_validation($pos_id){
		$this->db->where('pos_id',$pos_id);
		$query=$this->db->get('tbl_position');
		return $query->row();
	}
	public function update($pos_id,$data){
		 $data=array(
		 	'pos_name'=>$this->input->post('position_name'),
            'pos_name_kh'=>$this->input->post('position_name_kh'),
            'des'=>$this->input->post('desciption'),
            'date_updt'=>date('Y-m-d H:i:s',now())
        );
		$this->db->where('pos_id',$pos_id);
		$this->db->update('tbl_position',$data);

	}
	function delete($pos_id){
		$this->db->where( 'pos_id',$pos_id);
		$this->db->delete("$this->table");

	}
	// delete data
}
