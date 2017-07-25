<?php

class Customer_C extends CI_Controller
{       
    public function __construct()
    {
       parent:: __construct();
       $this->load->model('customer_M');                   
    }
    public function header_left()
    {
        $this->load->view('template/header');
        $this->load->view('template/left');
    }
    public function footer(){$this->load->view('template/footer');}
    public function index()
    {            
        $this->header_left();          
        $customer=$this->customer_M->index();
        $data["customer"] = $customer;
        $this->load->view('customer_show_V',$data);
        $this->footer();        
    }
    public function add()
    {       
       $this->header_left();
        $this->load->view('customer_add_V');            
        $this->footer();
    }
    public function validation_add()
    {
        $this->form_validation->set_rules('txtCustomerName','Customer name','required');
        if($this->form_validation->run()==TRUE)
        {             
            $this->customer_M->add();
            extract($_POST);
            if(isset($btnSave)){redirect('index.php/Customer_C/index');}
            if(isset($btnSaveNew)){redirect('index.php/Customer_C/add');}        
        }
        else $this->add();
    }
    public function delete($cus_id)
    {           
        $this->customer_M->delete($cus_id);
        redirect('index.php/Customer_C/index');
    }
    public function edit_validation($cus_id)
    {    
        #declare to change while customer name not value.
        #$this->session->set_userdata('cus_id',$cus_id);

        $this->header_left();
        $data['record']=$this->customer_M->edit_validation($cus_id);
        $this->load->view('customer_edit_V',$data);            
        $this->footer();     
    }
    public function change($cus_id)
    {
         $this->form_validation->set_rules('txtCustomerName','Customer name','required');
        if($this->form_validation->run()==TRUE)
        {                  
            $this->customer_M->change($cus_id);
            redirect('index.php/Customer_C/index');
        }                
        else $this->edit_validation($cus_id);      
    }   
}   