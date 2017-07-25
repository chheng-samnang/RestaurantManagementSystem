<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Orderpos_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function get_category()
  {
    $query = $this->db->get("tbl_category");
    if($query->num_rows()>0)
    {
      return $query->result();
    }else {
      return array();
    }
  }

  public function get_menu($cat_id="")
  {
    if($cat_id=="")
    {
      $query = $this->db->get("tbl_menu");
      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }else {
      $query = $this->db->get_where("tbl_menu",array("cat_id"=>$cat_id));
      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }
  }

  public function generateInvID()
  {
    $query = $this->db->query("SELECT IFNULL(MAX(inv_id),0) AS inv_id FROM tbl_invoice_hdr");
    if($query->num_rows()>0 && $query->row()->inv_id!="0")
    {

      $InvPrefix1 = substr($query->row()->inv_id,0,6);
      $InvPrefix2 = date("ymd");
      if($InvPrefix1!==$InvPrefix2)
      {
        return $tmp = $InvPrefix2."-0001";
      }else {
        $tmp = intVal(substr($query->row()->inv_id,strlen($query->row()->inv_id)-4,4));
        $num = str_pad($tmp+1,4,"0",STR_PAD_LEFT);
        return $result = date("ymd")."-".$num;
      }

    }else {

      return date("ymd")."-"."0001";
    }
  }

  public function generateReceiptID()
  {
    $query = $this->db->query("SELECT IFNULL(MAX(rec_no),0) AS inv_id FROM tbl_receipt");
    if($query->num_rows()>0 && $query->row()->inv_id!="0")
    {
      $InvPrefix1 = substr($query->row()->inv_id,0,6);
      $InvPrefix2 = date("ymd");
      if($InvPrefix1!==$InvPrefix2)
      {
        return $tmp = $InvPrefix2."-0001";
      }else {
        $tmp = intVal(substr($query->row()->inv_id,strlen($query->row()->inv_id)-4,4));
        $num = str_pad($tmp+1,4,"0",STR_PAD_LEFT);
        return $result = date("ymd")."-".$num;
      }

    }else {
      return date("ymd")."-"."0001";
    }
  }
  public function checkExisting($id)
  {
    $query = $this->db->query("SELECT COUNT(inv_id) as inv_id FROM tbl_invoice_hdr WHERE inv_id='$id'");
    if($query->num_rows()>0)
    {
      return false;
    }else{
      return true;
    }
  }
  public function insertInvoice($json)
  {
    $invID = $this->generateInvID();
    $date = date("Y-m-d");
    $tbl = $this->input->post("txtTable");
    $userCrea = isset($this->session->userLogin)?$this->session->userLogin:"n/a";
    $data = array(
                  "inv_id"  =>  $invID,
                  "inv_date"  =>  $date,
                  "tab_id"  =>  $tbl,
                  "paid"  =>  "0",
                  "user_crea"  =>  $userCrea,
                  "date_crea"  =>  $date
    );
    $this->db->insert("tbl_invoice_hdr",$data);

    foreach ($json as $key => $value) {
      $data = array(
                    "inv_id"  =>  $invID,
                    "m_id"  =>  $value[0],
                    "qty"  =>  $value[3],
                    "cost"  =>  $value[2],
                    "total"  =>  $value[3]*$value[2]
      );

      $this->db->insert("tbl_invoice_det",$data);
    }

  }

  public function get_invoice_hdr($status="")
  {
    if($status=="")
    {
      $this->db->select("*");
      $this->db->from("tbl_invoice_hdr");
      $this->db->where("paid","0");
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }else {
      $this->db->select("*");
      $this->db->from("tbl_invoice_hdr");
      $this->db->where("paid","1");
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }
  }

  public function get_printed_invoice()
  {
    $this->db->select("*");
    $this->db->from("tbl_invoice_hdr");
    $this->db->where("paid","1");
    $query = $this->db->get();
    if($query->num_rows()>0)
    {
      return $query->result();
    }else {
      return array();
    }
  }

  public function get_invoice($inv_id="")
  {
    if($inv_id=="")
    {
      $query = $this->db->get_where("tbl_invoice_hdr",array("paid"=>"1"));
      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }else {
      $query = $this->db->get_where("tbl_invoice_hdr",array("inv_id"=>$inv_id,"paid"=>"1"));
      if($query->num_rows()>0)
      {
        return $query->row();
      }else {
        return array();
      }
    }
  }

  public function get_menu_by_invID($invID="")
  {
    if($invID!="")
    {
      $this->db->select("*");
      $this->db->from("tbl_invoice_det");
      $this->db->join("tbl_menu","tbl_invoice_det.m_id=tbl_menu.m_id");

      $this->db->where("inv_id",$invID);
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }
  }

  public function updateInvoice($inv_id)
  {
    $data = array(
                  "paid"  =>  "1"
    );
    $this->db->where("inv_id",$inv_id);
    $this->db->update("tbl_invoice_hdr",$data);
  }


  public function InsertReceipt($inv_id)
  {
     $recNo = $this->generateReceiptID();
     $userCrea = isset($this->session->userLogin)?$this->session->userLogin:"n/a";
      $data = array(
        "rec_no"=>$recNo,
        "ttl_usd"=>$this->input->post('txtGrandTtlUsd'),
        "inv_id"=>$this->input->post('txtinv_id'),
        "ttl_riel"=>$this->input->post('txtGrandTtlRiel'),
        "cash_usd"=>$this->input->post('txtCashInUsd'),
        "cash_riel"=>$this->input->post('txtCashInRiel'),
        "exchange_usd"=>$this->input->post('txtExUSD'),
        "exchange_riel"=>$this->input->post('txtExRiel'),
        "status"=>"1",
        "user_crea"=>$userCrea,
        "rec_date"=>date('Y-m-d'),
        "date_crea"=>date('Y-m-d')

        );
      $this->db->insert("tbl_receipt" ,$data);

      $data1 = array(
                  "paid"  =>  "2"
    );
    $this->db->where("inv_id",$inv_id);
    $this->db->update("tbl_invoice_hdr",$data1);
  }

  public function Exchange()
  {
    $query = $this->db->query("SELECT key_data FROM tbl_sysdata WHERE key_type='exrate' ORDER BY key_code DESC LIMIT 1");
    return $query->row();
  }

  public function insert_menu_detail($data)
  {
    if(!empty($data))
    {

        $invID = $data["ddlInvoice"];
        $this->db->where("inv_id",$invID);
        $this->db->delete("tbl_invoice_det");

        $i = 0;
        $n = (count($data)-3)/4;

        for($i=0;$i<$n;$i++)
        {
          $arr = array(
                        "inv_id"  =>  $invID,
                        "m_id"  =>  $data["txtMID$i"],
                        "qty"  =>  $data["txtQty$i"],
                        "cost"  =>  $data["txtPrice$i"],
                        "total"  => $data["txtTotal$i"]
          );

          $this->db->insert("tbl_invoice_det",$arr);
        }

        $value = array("paid"=>"0");
        $this->db->where("inv_id",$invID);
        $this->db->update("tbl_invoice_hdr",$value);
        
    }
  }
}
