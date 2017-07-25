<?php
	/**
	* 
	*/
	class Main_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();			
		}

		function get_menu_count_by_category()
		{
			$query = $this->db->query("SELECT cat_name AS name,(100/(SELECT SUM(qty) FROM tbl_invoice_det d INNER JOIN tbl_invoice_hdr h ON d.`inv_id`=h.`inv_id` WHERE date_crea = SUBSTRING(NOW(),1,10)))*SUM(qty) AS y FROM tbl_invoice_det d INNER JOIN tbl_menu m ON d.`m_id`=m.`m_id` INNER JOIN tbl_invoice_hdr h ON h.inv_id=d.`inv_id` INNER JOIN tbl_category c ON m.cat_id=c.cat_id WHERE h.`date_crea`=SUBSTRING(NOW(),1,10) GROUP BY m.`cat_id`,h.`date_crea`");
			return $query;
		}

		function get_opening_balance()
		{
			$query = $this->db->query("SELECT open_bal_usd + (open_bal_riel/exchange_rate) AS opening_balance FROM tbl_balance WHERE date_crea=SUBSTRING(NOW(),1,10) and staff_id='".$this->session->userLogin."'");
			if($query->num_rows()>0)
			{
				return $query;
			}else
			{				
				return $query;
			}
		}

		function get_ending_balance()
		{
			$query = $this->db->query("SELECT IFNULL(SUM(ttl_usd),0) AS ending_balance FROM tbl_receipt WHERE date_crea=SUBSTRING(NOW(),1,10)");
			if($query->num_rows()>0)
			{
				return $query->row();
			}else
			{
				return $query;
			}
		}

		function get_expense()
		{
			$query = $this->db->query("SELECT IFNULL(SUM(key_data2)+SUM(key_desc)/(SELECT key_data FROM tbl_sysdata WHERE key_type='exrate' ORDER BY key_code DESC LIMIT 1),0) AS expense FROM tbl_sysdata WHERE key_type='expense' AND date_crea=SUBSTRING(NOW(),1,10)");
			if($query->num_rows()>0)
			{
				return $query->row();
			}else
			{
				return 0;
			}
		}
	}
?>