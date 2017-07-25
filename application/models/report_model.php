<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_receipt($date_f="",$date_t="",$key_word="")
  {
    if($date_f==""&&$date_t=="")
    {
      $key_word = trim($key_word);
      if($key_word=="")
      {
          $query = $this->db->query("SELECT r.*,i.`user_crea` AS invUserCrea FROM tbl_receipt r INNER JOIN tbl_invoice_hdr i ON r.inv_id=i.inv_id");
      }else{
          $query = $this->db->query("SELECT r.*,i.`user_crea` AS invUserCrea FROM tbl_receipt r INNER JOIN tbl_invoice_hdr i ON r.inv_id=i.inv_id WHERE r.inv_id like '%".$key_word."%' OR i.user_crea like '%".$key_word."%'");
      }

      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }else {
      if($key_word=="")
      {
          $query = $this->db->query("SELECT r.*,i.`user_crea` AS invUserCrea FROM tbl_receipt r INNER JOIN tbl_invoice_hdr i ON r.inv_id=i.inv_id where rec_date  between '$date_f' and '$date_t'");
      }else{
          $query = $this->db->query("SELECT r.*,i.`user_crea` AS invUserCrea FROM tbl_receipt r INNER JOIN tbl_invoice_hdr i ON r.inv_id=i.inv_id where r.inv_id like '%".$key_word."%' OR i.user_crea like '%".$key_word."%' and rec_date  between '$date_f' and '$date_t'");
      }

      if($query->num_rows()>0)
      {
        return $query->result();
      }else {
        return array();
      }
    }
  }

  public function get_invoice()
  {
      $query = $this->db->query("SELECT distinct inv_id FROM tbl_invoice_det");
      if($query->num_rows()>0){
        return $query->result();
      }else {
        return array();
      }
  }

  public function get_invoice_detail($inv_id)
  {
    $query = $this->db->query("SELECT i.*,m_name,m_name_kh FROM tbl_invoice_det i INNER JOIN tbl_menu m ON i.m_id=m.m_id WHERE inv_id='$inv_id'");
    if($query->num_rows()>0)
    {
      return $query->result();
    }else {
      return array();
    }
  }
}
