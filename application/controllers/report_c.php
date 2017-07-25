<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_c extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("report_model","rm");
    $this->load->model("Orderpos_m","om");
  }

  public function sale_report_daily()
  {
    $date_f = $this->input->post("txtDateF");
    $date_t = $this->input->post("txtDateT");
    $invID = $this->input->post("txtSearch");
    $invID = $invID!=""?$invID:"";
    $date_f = $date_f!=""?$date_f:"";
    $date_t = $date_t!=""?$date_t:"";
    $data["exchange"]=$this->om->Exchange();
    $data["receipt"] = $this->rm->get_receipt($date_f,$date_t,$invID);

  // $data["receipt_detail"] = $this->rm->get_receipt_detail();


    $this->load->view("template/header");
    $this->load->view("template/left");
    $this->load->view("sale_report_daily",$data);
    $this->load->view("template/footer");
  }

  public function sale_report_detail()
  {
      $invoice = $this->rm->get_invoice();

      $data["invoiceNum"] = "";
      foreach ($invoice as $key => $value) {
          $arr[$value->inv_id] = $value->inv_id;
      }

      $data["invoice"] = $arr;
      $this->load->view("template/header");
      $this->load->view("template/left");
      $this->load->view("sale_report_detail",$data);
      $this->load->view("template/footer");
  }
}
