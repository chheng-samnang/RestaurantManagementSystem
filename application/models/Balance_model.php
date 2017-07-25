<?php
class Balance_model extends CI_Model
{
	private $table = "tbl_balance";
	public function __construct(){
		parent::__construct();
		 $this->session->set_userdata('userName');
	}
	public function getBalance(){
		
		$query = $this->db->get('tbl_staff');
		return $query->result_array();
	}
	public function getExRate()
	{
		$query = $this->db->query("select key_data from tbl_sysdata where key_type='exrate' order by key_code desc limit 1");
		return $query;
	}
	public function selectBalance(){
		$this->db->select('tbl_balance.*,staff_name');
		$this->db->from('tbl_balance');
		$this->db->join('tbl_staff','tbl_balance.staff_id=tbl_staff.user_code');
		$query = $this->db->get();
		return $query;
	}
	public function addBalance(){
		$exchangeRate = $this->getExRate();
		
		$data = array(
            'staff_id'=>$this->input->post('txtstaff_name'),
            'open_bal_usd'=>$this->input->post('txt_open_balance_us'),
            'open_bal_riel'=>$this->input->post('txt_open_balance_r'),
            'exchange_rate'=>$exchangeRate->result()[0]->key_data,
            'user_crea'=>$this->session->userLogin,
            'date_crea'=>date('Y-m-d')
        );
		$this->db->insert("$this->table", $data);
	}
	public function update_balance($bal_id){
		$this->db->where('bal_id',$bal_id);
		$query=$this->db->get("$this->table");
		return $query->row();
	}
	public function update($bal_id, $data){
		 $data=array(
                'open_bal_usd'=>$this->input->post('txt_open_balance_us'),
                'open_bal_riel'=>$this->input->post('txt_open_balance_r'),
                'user_updt'=>$this->session->userLogin,
                'date_update'=>date('Y-m-d')
            );
		$this->db->where('bal_id', $bal_id);
		$this->db->update("$this->table", $data);
	}
	public function deleteBalance($bal_id){
		$this->db->where('bal_id', $bal_id);
		$this->db->delete("$this->table");
	}
}