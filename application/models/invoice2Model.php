<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Invoice2Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function selectOrderHdr($tab_id)
	{
		$query = $this->db->query("SELECT * FROM tbl_order_hdr h INNER JOIN tbl_table t ON h.`tab_id`=t.`tab_id` WHERE h.tab_id='$tab_id' AND paid='0' LIMIT 1");
		return $query->row();
	}
	function selectOrderDet($tab_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_order_det');
		$this->db->join('tbl_menu','tbl_order_det.m_id=tbl_menu.m_id');
		$this->db->join('tbl_order_hdr','tbl_order_det.ord_id=tbl_order_hdr.ord_id');
		$data = array(
						'tab_id'=>$tab_id,
						'status'=>'0',
						'status !='=>'2'
			);
		$this->db->where($data);
		$query = $this->db->get();
		return $query;
	}

	public function checkOrderDet($tab_id)
	{
		$this->db->select('ord_id');
		$cond = array('tab_id'=>$tab_id,'paid'=>'0');
		$this->db->where($cond);
		$query = $this->db->get('tbl_order_hdr');
		$row = $query->row();
		$ord_id = $row->ord_id;

		$cond = array('status'=>'0','ord_id'=>$ord_id);
		$query = $this->db->get_where('tbl_order_det',$cond);
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}else
		{
			return 0;
		}
	}

	function insertInvoice($data,$selected)
	{
		$tab_id = $this->input->post('txtTabID');
		$staff_id = $this->input->post('txtStaffID');
		$x = 0;

		#==========Insert Invoice Header===================

		$field = array(
						'inv_id'=>$this->input->post('txtInvNo'),
						'inv_date'=>date('Y-m-d'),
						'tab_id'=>$tab_id,
						'staff_id'=>$staff_id,
						'user_crea'=>$this->session->userLogin,
						'date_crea'=>date('Y-m-d')
			);
		$this->db->insert('tbl_invoice_hdr',$field);

		#=============if checkbox All is checked==============

		if ($this->input->post('chkAll')==true) {

		#=============Insert all datas into tbl_invoice_det=============

			foreach ($data->result() as $row) {
				$field = array(
									'inv_id'=>$this->input->post('txtInvNo'),
									'm_id'=>$row->m_id,
									'qty'=>$row->qty,
									'cost'=>$row->cost,
									'discount'=>$row->discount,
									'total'=>($row->qty*$row->cost)-$row->discount
						);
					$this->db->insert('tbl_invoice_det',$field);
			}

		#==========After the insert, update table status to waiting===========

			$field = array(
							'sta'=>'Waiting'
				);
			$this->db->where('tab_id',$tab_id);
			$this->db->update('tbl_table',$field);

		#========Update ordered item status to 1 meaning it is being paid===

			foreach ($selected as $row) {
				$field2 = array('status'=>'1');
				$this->db->where('ord_det_id',$row);
				$this->db->update('tbl_order_det',$field2);	
			}
		}

		#===========if Checkboxes are checked individually============

		else
		{
			if(count($selected)==1)
			{
				
					foreach ($selected as $row) 
					{
							$field = $data->result();
							foreach ($data->result() as $x) {
								if($x->ord_det_id==$selected[0])
								{

									$arr = array(
													'inv_id'=>$this->input->post('txtInvNo'),
													'm_id'=>$x->m_id,
													'qty'=>$x->qty,
													'cost'=>$x->cost,
													'discount'=>$x->discount,
													'total'=>($x->qty*$x->cost)-$x->discount
										);
									$this->db->insert('tbl_invoice_det',$arr);

									$this->db->where('tab_id',$tab_id);
									$this->db->update('tbl_table',array('sta'=>'Waiting'));
									$this->db->where('ord_det_id',$selected[0]);
									$this->db->update('tbl_order_det',array('status'=>'1'));
								}	
							}
							
					}					
				

			}else
			{

				foreach ($data->result() as $row) {

					$found = array_search($row->ord_det_id,$selected,true);
					
					if($found!==false)
					{
						$arr = array(
											'inv_id'=>$this->input->post('txtInvNo'),
											'm_id'=>$row->m_id,
											'qty'=>$row->qty,
											'cost'=>$row->cost,
											'discount'=>$row->discount,
											'total'=>($row->qty*$row->cost)-$row->discount
								);
							$this->db->insert('tbl_invoice_det',$arr);

							$this->db->where('ord_det_id',$row->ord_det_id);
							$this->db->update('tbl_order_det',array('status'=>'1'));

							$this->db->where('tab_id',$tab_id);
							$this->db->update('tbl_table',array('sta'=>'Waiting'));
					}
				}
			}
				
			if($this->checkOrderDet($tab_id)==0)
			{
				$field = array(
							'sta'=>'Waiting'
				);
			$this->db->where('tab_id',$tab_id);
			$this->db->update('tbl_table',$field);
			}
		}
	}
}

