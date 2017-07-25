<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Balance extends CI_Controller {
 		 public function __construct()
    {
       parent:: __construct();
       $this->load->model('balance_model');
     }
    public function index(){
    	$this->load->view('template/header');
		$this->load->view('template/left');

        $result = $this->balance_model->selectBalance();
        $data = array('balance' => $result);
		$this->load->view('balance', $data);
        
		$this->load->view('template/footer');
    }
    public function get_balance(){
         $query = $this->balance_model->getBalance();
        if ($query) {
            $data['record'] = $query;
            }
            $this->load->view('template/header');
            $this->load->view('template/left');
            $this->load->view('add_balance',$data);
            $this->load->view('template/footer');  
    }
    // selete balance

    public function insert_balance(){
        $this->form_validation->set_rules('txt_open_balance_us','Select Staff Name','required');
        if ($this->form_validation->run()==TRUE) {
            $this->balance_model->addBalance();

            extract($_POST);
            if (isset($btn_Saveclose)) {$this->index();}
            if (isset($btn_Savenew)) {$this->get_balance();}

            redirect('index.php/balance');


        }else  $this->get_balance();
    }
    // add balance

    public function update_balance($bal_id=""){
        if ($bal_id!="") {
            $this->load->view('template/header');
            $this->load->view('template/left');
            $data['record']=$this->balance_model->update_balance($bal_id);
            $this->load->view('edit_Balance', $data);
            $this->load->view('template/footer'); 
        } 
    }
    public function update($bal_id){
        $this->form_validation->set_rules('txt_open_balance_us','Open Balance US','required');
        if ($this->form_validation->run()==TRUE) 
        {
            $this->balance_model->update($bal_id);
            redirect('index.php/Balance/index');
            
        }else $this->update_balance($bal_id);
    } 
    // update balance 

    public function delete_balance($bal_id=""){
        if($bal_id!=""){
            $this->balance_model->deleteBalance($bal_id);
            $this->index();
        }
    }
    // delete balance 

 }