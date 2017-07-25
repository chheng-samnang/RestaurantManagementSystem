<?php
class Invioce_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		 $this->session->set_userdata('userName');
	}

	public function getInvoiceHeader($id){
		$this->db->SELECT("h.ord_id, h.tab_id, t.tab_name , h.user_crea, h.ord_date");
		$this->db->FROM('tbl_order_hdr h');
		$this->db->JOIN('tbl_table t', 'ON h.tab_id = t.tab_id');
		$this->db->WHERE('h.tab_id', $id );
		
		$this->db->WHERE('paid',0);
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result();

	}
	public function getInvoiceDetail($id){
		
		$this->db->SELECT('*');
		$this->db->FROM('tbl_order_hdr h');
		$this->db->JOIN('tbl_order_det d' ,'ON h.ord_id=d.ord_id');
		$this->db->JOIN('tbl_menu m', 'm.m_id = d.m_id');
		//$this->db->JOIN('tbl_table', 'tbl_table.tab_id = h.tab_id');
		
		$this->db->WHERE('tab_id', $id);
		$this->db->WHERE('d.paid',0);
		//echo $id;
		$query = $this->db->get();
		return $query;
	} 

	// public function  selectInvoiceHeader(){
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_invoice_hdr');
		
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	return $query;
	// }
	public function getExchange(){
		$this->db->select('*');
		$this->db->from('tbl_sysdata');
		$this->db->where('key_type','exrate');
		$this->db->order_by("key_code", "DESC");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}
	public function insetInvioceDetail($data, $selected)
	{
		$tab_id = $this->input->post('txtTabID');
		$field = array(
					'inv_date'=>date('Y-m-d'),
					'tab_id'=>$tab_id,
					'staff_id'=>$this->session->userLogin,
					'user_crea'=>$this->session->userLogin,
					'date_crea'=>date('Y-m-d')
			);
		$this->db->insert('tbl_invoice_hdr', $field);
		if ($this->input->post('chkAll')==true) {
			foreach ($data->result() as $row) {
				$field = array(
							
							'm_id'=>$row->m_id,
							'qty'=>$row->qty,
							'cost'=>$row->cost,
							'discount'=>$row->discount,
							'total'=>($row->qty * $row->cost)-$row->discount
					);
				$this->db->insert('tbl_invoice_det',$field);
				
			}
			$field = array(
					'sta'=>'Waiting'
					);
			$this->db->where('tab_id',$tab_id);
			$this->db->update('tbl_table', $field);

			foreach ($selected as $row) {
				$field2 = array('paid'=>'1');
				$this->db->where('ord_det_id',$row);
				$this->db->update('tbl_order_det',$field2);	
			}
		}
		else
		{
			foreach ($data->result() as $row) 
			{
				$found = array_search($row->ord_det_id, $selected);
				if ($found!== false) {
					$field = array(
							
							'm_id'=>$row->m_id,
							'qty'=>$row->qty,
							'cost'=>$row->cost,
							'discount'=>$row->discount,
							'total'=>($row->qty * $row->cost)-$row->discount
					);
				$this->db->insert('tbl_invoice_det',$field);
				$field2 = array('paid'=>'1');
				$this->db->where('ord_det_id',$row->ord_det_id);
				$this->db->update('tbl_order_det', $field2);
				}
			}
		}
	}
	public function InvoiceHeader($id)
	{
		$this->db->select("h.inv_date, t.tab_name, h.staff_id");
		$this->db->from('tbl_invoice_hdr h');
		$this->db->join('tbl_table t', 'ON h.tab_id = t.tab_id');
		$this->db->where('h.tab_id', $id);
		$this->db->limit(1);

		$query = $this->db->get();
		return $query->result();
	}
	public function InvoiceDetail($id1){
		$this->db->select("d.inv_id, d.qty, d.cost, d.discount, d.total, m.m_name");
		$this->db->from('tbl_invoice_det as d');
		$this->db->join('tbl_menu as m', 'ON d.m_id = m.m_id');
		$this->db->where('d.m_id');
		//echo $id1;
		$query = $this->db->get();
		return $query->result();
	}
}
 //$this->db->query("SELECT * FROM tbl_sysdata WHERE key_type='exrate' ORDER BY key_code DESC LIMIT 1");