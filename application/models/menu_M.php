<?php

class Menu_M extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}
	public function index()
	{
		$this->db->select('m_id,m_name,m_name_kh,cat_name,price,tbl_menu.desc,desc_kh,img,measure,tbl_menu.user_crea,tbl_menu.date_crea,tbl_menu.user_updt,tbl_menu.date_updt');
		$this->db->join('tbl_category','tbl_category.cat_id=tbl_menu.cat_id','left');
		$query=$this->db->get('tbl_menu');
		return $query->result();
	}
	public function get_menu()
	{
		$query = $this->db->get("tbl_menu");
		if($query->num_rows()>0)
		{
			return $query->result();
		}else {
			return array();
		}
	}
	public function get_menu_order_by_order()
	{
		$query = $this->db->query("SELECT * FROM tbl_menu m ORDER BY m.order");
		if($query->num_rows()>0)
		{
			return $query->result();
		}else {
			return array();
		}
	}
	public function get_cat()
	{
		$query=$this->db->get('tbl_category');
		return $query->result();
	}
	public function add($file_name)
	{
		$data=array('m_name'=>$this->input->post('txtMenuName'),
                        'm_name_kh'=>$this->input->post('txtMenuNameKh'),
                        'cat_id'=>$this->input->post('ddlCatId'),
                        'price'=>$this->input->post('txtPrice'),
                        'desc'=>$this->input->post('txtDesc'),
                        'desc_kh'=>$this->input->post('txtDescKh'),
                        'img'=>$file_name['file_name'],
                        'measure'=>$this->input->post('txtMeasure'),
                        'user_crea'=>$this->session->userLogin,
                        'date_crea'=>date('Y-m-d')
                    );
		$this->db->insert('tbl_menu',$data);
	}
	public function get_to_edit($m_id)
	{
		$this->db->where('m_id',$m_id);
		$query=$this->db->get('tbl_menu');
		return $query->row();
	}
	public function save_change($m_id,$file_name)
	{

		if(!$file_name['file_name']=="")
			{
			$data=array('m_name'=>$this->input->post('txtMenuName'),
		            'm_name_kh'=>$this->input->post('txtMenuNameKh'),
		            'cat_id'=>$this->input->post('ddlCatId'),
		            'price'=>$this->input->post('txtPrice'),
		            'desc'=>$this->input->post('txtDesc'),
		            'desc_kh'=>$this->input->post('txtDescKh'),
		            'img'=>$file_name['file_name'],
		            'measure'=>$this->input->post('txtMeasure'),
		            'user_updt'=>$this->session->userLogin,
		            'date_updt'=>date('Y-m-d')
		        );
			#unlink image
	        $this->db->select('img');
	        $this->db->where('m_id',$m_id);
	        $query=$this->db->get('tbl_menu');
	        $img=$query->row();
	        unlink('./images/'.$img->img);
	        $this->db->where('m_id',$m_id);
			$this->db->update('tbl_menu',$data);
			}
		else
		{
			$data=array('m_name'=>$this->input->post('txtMenuName'),
	            'm_name_kh'=>$this->input->post('txtMenuNameKh'),
	            'cat_id'=>$this->input->post('ddlCatId'),
	            'price'=>$this->input->post('txtPrice'),
	            'desc'=>$this->input->post('txtDesc'),
	            'desc_kh'=>$this->input->post('txtDescKh'),
	            #'img'=>$file_name['file_name'],
	            'measure'=>$this->input->post('txtMeasure'),
	            'user_crea'=>$this->session->userLogin,
	            'date_crea'=>date('Y-m-d')
	        );
	        $this->db->where('m_id',$m_id);
	        $this->db->update('tbl_menu',$data);
		}
	}
	public function delete($menu_id)
	{
		$this->db->where('m_id',$menu_id);
		$query=$this->db->get('tbl_menu');
		$img_name=$query->row();
		if($img_name->img!=""){unlink('./images/'.$img_name->img);}
		$this->db->where('m_id',$menu_id);
		$this->db->delete('tbl_menu');
		redirect('index.php/menu_C');
	}
	public function menu_detail($detail_id)
	{
		$this->db->select('m_id,m_name,m_name_kh,cat_name,price,tbl_menu.desc,desc_kh,img,measure,tbl_menu.user_crea,tbl_menu.date_crea,tbl_menu.user_updt,tbl_menu.date_updt');
		$this->db->join('tbl_category','tbl_category.cat_id=tbl_menu.cat_id','left');
		$this->db->where('m_id',$detail_id);
		$query=$this->db->get('tbl_menu');
		return $query->row();
	}

	public function insertMenuSet($json)
	{
		if(!empty($json))
		{
			$this->db->where("key_type","SET");
			$this->db->delete("tbl_sysdata");

			foreach ($json as $key => $value) {
				$data = array(
											"key_type"	=>	"SET",
											"key_code"	=>	date("YmdHis"),
											"key_data"	=>	$value[0],
											"key_desc"	=>	"key_data store m_id"
				);
				$this->db->insert("tbl_sysdata",$data);
			}
		}
	}

}
