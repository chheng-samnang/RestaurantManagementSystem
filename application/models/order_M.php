<?php
	class Order_M extends CI_Model{
		 function __construct() {
						parent::__construct();
						$this->load->helper("security");
						}
		 function index(){
					$this->db->select('*');
					$this->db->from('tbl_category');
					$query = $this->db->get();
					$result = $query->result();
					return $result;
					}

		function insertOrderDetail($data,$bookID="")
		{

			$arr = array(
							'ord_id'=>$this->input->post('txtOrder'),
							'ord_date'=>date('Y-m-d'),
							'tab_id'=>$this->uri->segment(3),
							'staff_id'=>$this->session->userLogin,
							'paid'=>0,
							'user_crea'=>$this->session->userLogin,
							'date_crea'=>date('Y-m-d')
				);
			$this->db->insert('tbl_order_hdr',$arr);

			foreach ($data as $row) {
				$arr = array(
								'ord_id'=>$this->input->post('txtOrder'),
								'm_id'=>$row[0],
								'qty'=>$row[3],
								'cost'=>$row[2],
								'discount'=>$row[4],
								'comment'=>$row[5]
					);
				$this->db->insert('tbl_order_det',$arr);
			}
			$arr = array(
							'sta'=>'Busy'
				);
			$this->db->where("tab_id",$this->uri->segment(3));
			$this->db->update("tbl_table",$arr);

			if($bookID!="")
			{
				$arr1 = array('status'=>'2');
				$this->db->where('book_id',$bookID);
				$this->db->update('tbl_book',$arr1);
			}
		}

		function getOrder($orderID)
		{
			if($orderID!="")
			{
				$query = $this->db->get_where('tbl_order_hdr',array('ord_id'=>$orderID));
				return $query->row();
			}
		}

		function getOrderDet($orderID)
		{
			$this->db->select('*');
			$this->db->from('tbl_order_det');
			$this->db->join('tbl_menu','tbl_order_det.m_id=tbl_menu.m_id');
			$this->db->where('ord_id',$orderID);
			$query = $this->db->get();
			return $query;
		}

		function getInvoice($invID)
		{
			$this->db->select("*");
			$this->db->from("tbl_invoice_hdr");
			$this->db->join("tbl_invoice_det","tbl_invoice_hdr.inv_id=tbl_invoice_det.inv_id");
			$this->db->join("tbl_menu","tbl_invoice_det.m_id=tbl_menu.m_id");
			$this->db->where("tbl_invoice_det.inv_id",$invID);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result();
			}else {
				return array();
			}
		}
}
?>
