<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Order_pos_c extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("orderpos_m","om");
  }

  // public function val()
  // {
  //    $this->form_validation->set_rules('txtTable','Table Name','required');
  //   if ($this->form_validation->run()==TRUE){ return TRUE}else{ return FALSE}
  // }
  public function index()
  {
    $this->form_validation->set_rules('menu','Choose Menu Name','required');
     $this->form_validation->set_rules('txtTable','Choose  Table Name','required');
     $invID = $this->om->generateInvID();
     $exist = $this->om->checkExisting($invID);
    if ($this->form_validation->run()==TRUE && !$exist){
      $jsonData = json_decode($this->input->post('str'));
      $this->om->insertInvoice($jsonData);
      redirect(base_url()."index.php/order_pos_c");

    }else{
       $data["category"] = $this->om->get_category();
      $this->load->view("order_pos",$data);

    }
  }

}

?>
