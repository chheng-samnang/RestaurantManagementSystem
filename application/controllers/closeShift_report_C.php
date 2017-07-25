<?php

class CloseShift_report_C extends CI_Controller
{       
    public function __construct()
    {
       parent:: __construct();
       $this->load->model('closeShift_report_M');                   
    }    
    public function index()
    {            
        $this->load->view('template/header');
        $this->load->view('template/left');         
        $data["record"]=$this->closeShift_report_M->index();        
        $this->load->view('closeShift_report_V',$data);
        $this->load->view('template/footer');               
    }
    public function search()
    {
      $this->load->view('template/header');
      $this->load->view('template/left');         
      $data["record"]=$this->closeShift_report_M->search();        
      $this->load->view('closeShift_report_V',$data);
      $this->load->view('template/footer'); 
    }
    public function delete($id)
    {
      $this->closeShift_report_M->delete($id);
      $this->index();
    }
   
}   