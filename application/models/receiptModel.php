<?php
	/**
	* 
	*/
	class ReceiptModel extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('invoice2Model','im');
		}
		function getExchangeRate()
		{
			$query = $this->db->query("SELECT key_data FROM tbl_sysdata WHERE key_type='exrate' ORDER BY key_code DESC LIMIT 1");
			if($query->num_rows()>0)
			{
				return $query->row();	
			}else
			{
				return 0;
			}
			
		}
		function getGrandTtl($tab_id,$currency,$exchange)
		{
				$query = $this->db->query("SELECT SUM(total) as total FROM tbl_invoice_hdr h INNER JOIN tbl_invoice_det d ON h.inv_id=d.inv_id WHERE tab_id='$tab_id' AND paid='0'");
				if($query->num_rows()>0)
				{
					if($currency=='USD')
					{
						return $query->row()->total;
					}else
					{
						$grandTtlKhr = $query->row()->total*$exchange;
						$val = substr($grandTtlKhr,strlen($grandTtlKhr)-2,2);
						$val = $grandTtlKhr+$val;
						$x = substr($val,strlen($val)-2,2);
						$x = 100 - $x;
						$val = $val+$x;
						return $val;
						//return $grandTtlKhr;
					}
				}else
				{
					return 0;
				}
		}
		function getInvoiceID($tab_id)
		{
			$this->db->select('inv_id');
			$query = $this->db->get_where('tbl_invoice_hdr',array('tab_id'=>$tab_id,'paid'=>'0'));
			return $query->row();
		}
		
		function insertReceipt($invoiceID,$tab_id)
		{
			$data = array(
							'rec_no'=>$this->input->post('txtReceiptNo'),
							'rec_date'=>date('Y-m-d'),
							'inv_id'=>$invoiceID->inv_id,
							'ttl_usd'=>$this->input->post('txtGrandTtlUsd'),
							'ttl_riel'=>$this->input->post('txtGrandTtlKhr'),
							'cash_usd'=>$this->input->post('txtCashInUsd'),
							'cash_riel'=>$this->input->post('txtCashInKhr'),
							'exchange_usd'=>$this->input->post('txtExchangeUsd'),
							'exchange_riel'=>$this->input->post('txtExchangeKhr'),
							'ex_rate'=>$this->input->post('txtExRate'),
							'user_crea'=>$this->session->userLogin,
							'date_crea'=>date('Y-m-d')
				);
			$this->db->insert('tbl_receipt',$data);
			
			$data = array('paid'=>'1');
			$this->db->where('paid','0');
			$this->db->update('tbl_invoice_hdr',$data);
			if($this->im->checkOrderDet($tab_id)==0)
			{
				
				$this->db->where('paid','0');
				$this->db->update('tbl_order_hdr',$data);

				$this->db->where('tab_id',$tab_id);
				$this->db->update('tbl_table',array('sta'=>'Free'));
			}else
			{

				$this->db->where('tab_id',$tab_id);
				$this->db->update('tbl_table',array('sta'=>'Busy'));
			}
		}
	}
?>