<?php

class Table_C extends CI_Controller
{       
    public function __construct()
    {
       parent:: __construct();
       $this->load->model('table_M');                
    }
    public function header_left()
    {
        $this->load->view('template/header');
        $this->load->view('template/left');
    }
    public function footer()
    {
        $this->load->view('template/footer');
    }
    public function index()
    {   
        $this->header_left();            
        $data["table"]=$this->table_M->index();        
        $this->load->view('table_show_V',$data);
        $this->footer();        
    }
    public function add()
    {       
        $this->header_left();        
        $this->load->view('table_add_V');            
        $this->footer();
    }
    public function validation_add()
    {
        $this->form_validation->set_rules('txtTableName','Table name','required');
        $this->form_validation->set_rules('txtSeats','Seats','required|numeric');                    
        if($this->form_validation->run()==TRUE)
        {                                                          
            $this->table_M->add();          
            extract($_POST);
            if(isset($btnSave)){redirect('index.php/table_C/index');}
            if(isset($btnSaveNew)){redirect('index.php/table_C/add');}                                        
        }          
        else $this->add();    
    }   
    public function delete($tab_id)
    {           
        if(isset($tab_id))
        {                            
            $this->table_M->delete($tab_id);
            redirect('index.php/table_C/index');            
        }       
    }
    public function get_to_edit($tab_id)
    {       
        $this->header_left();
        $data['record']=$this->table_M->get_to_edit($tab_id);       
        $this->load->view('table_edit_V',$data);            
        $this->footer();        
    }
    public function save_change($tab_id)    
    {
        $this->form_validation->set_rules('txtTableName','Table name','required');
        $this->form_validation->set_rules('txtSeats','Seats','required|numeric');                    
        if($this->form_validation->run()==TRUE)
        {                                                          
            $this->table_M->save_change($tab_id);
            redirect('index.php/table_C/index');                                                          
        }             
        else $this->get_to_edit($tab_id);        
    }   
}    