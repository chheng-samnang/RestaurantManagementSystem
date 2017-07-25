<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Invoice_pos extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("Orderpos_m","om");
  }

  function index($inv_id="")
  {
    if($inv_id=="")
    {
      $arr = array();
      $arr1 = array();

      $data["invoice"] = $this->om->get_invoice_hdr();
      foreach ($data["invoice"] as $key => $value) {
            $arr[] = $this->om->get_menu_by_invID($value->inv_id);
      }
      $data["menu"] = $arr;

      $data["receipt"] = $this->om->get_invoice_hdr("1");

      foreach ($data["receipt"] as $key => $value) {
        $arr1[] = $this->om->get_menu_by_invID($value->inv_id);
      }
      $data["exchange"]=$this->om->Exchange();
      $data["menu_rec"] = $arr1;
      $data["invID"] = $this->om->generateReceiptID();
      $this->load->view("template/header");
      $this->load->view("template/left");
      $this->load->view("invoice_pos",$data);
      $this->load->view("template/footer");
    }else {
      $this->om->updateInvoice($inv_id);
      redirect(base_url()."index.php/invoice_pos");
    }
  }



function printReceipt($inv_id="")
  {

    if($inv_id=="")
    {
      $arr = array();
      $data["invoice"] = $this->om->get_invoice_hdr();
      foreach ($data["invoice"] as $key => $value) {
            $arr[] = $this->om->get_menu_by_invID($value->inv_id);
      }
      $data["menu"] = $arr;

      $data["receipt"] = $this->om->get_invoice_hdr("1");

      foreach ($data["receipt"] as $key => $value) {
        $arr[] = $this->om->get_menu_by_invID($value->inv_id);
      }
      $data["exchange"]=$this->om->Exchange();
      $data["menu_rec"] = $arr;
      $this->load->view("template/header");
      $this->load->view("template/left");
      $this->load->view("invoice_pos",$data);
      $this->load->view("template/footer");
    }else {
       $this->om->InsertReceipt($inv_id);
       redirect(base_url()."index.php/invoice_pos");
    }
  }

  public function editInvoice()
  {
    $menu = $this->om->get_menu();
    $arr1 = array();
    foreach ($menu as $key => $value) {
      // $arr1[$value->m_name] = $value->m_name;
      $arr1[$value->m_id] = $value->m_name;
    }
    $invoice = $this->om->get_invoice();
    $arr = array();
    foreach ($invoice as $key => $value) {
      $arr[$value->inv_id] = $value->inv_id;
    }
    $data["menu"] = $arr1;
    $data["invoice"] = $arr;
    if(isset($_POST["btnSubmit"]))
    {
        $this->om->insert_menu_detail($_POST);
        redirect(base_url()."invoice_pos");
    }else {
      $this->load->view("template/header");
      $this->load->view("template/left");
      $this->load->view("edit_invoice",$data);
      $this->load->view("template/footer");
    }
  }

  public function reprintInvoice()
  {
    $arr = array();
    $arr1 = array();
    $data["invoice"] = $this->om->get_printed_invoice();
    foreach ($data["invoice"] as $key => $value) {
          $arr[] = $this->om->get_menu_by_invID($value->inv_id);
    }
    $data["menu"] = $arr;

    $data["receipt"] = $this->om->get_invoice_hdr("1");

    foreach ($data["receipt"] as $key => $value) {
      $arr1[] = $this->om->get_menu_by_invID($value->inv_id);
    }
    $data["exchange"]=$this->om->Exchange();
    $data["menu_rec"] = $arr1;
    $data["invID"] = $this->om->generateReceiptID();

    $this->load->view("template/header");
    $this->load->view("template/left");
    $this->load->view("reprintInvoice",$data);
    $this->load->view("template/footer");
  }

  public function add_new_order()
  {
    $id = $this->uri->segment(2);
    $inv_id = $this->uri->segment(3);
    $this->om->add_new_order($id, $inv_id);
  }
}
