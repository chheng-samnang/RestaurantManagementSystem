<?php

class Menu_C extends CI_Controller
{
    public function __construct()
    {
       parent:: __construct();
       $this->load->model('menu_M');
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
        $data["menu"]=$this->menu_M->index();
        $this->load->view('menu_show_V',$data);
        $this->footer();
    }
    public function add()
    {
        $this->header_left();
        $data['menu']=$this->menu_M->get_cat();
        $this->load->view('menu_add_V',$data);
        $this->footer();
    }

    public function add_set()
    {
        if(isset($_POST["btnSave"]))
        {
          $jsonData = json_decode($this->input->post('str'));
          $this->menu_M->insertMenuSet($jsonData);
          redirect(base_url()."index.php/menu_C/add_set");
        }else {
          $this->header_left();
          $data['menu']=$this->menu_M->get_menu();
          $this->load->view('menu_set',$data);
          $this->footer();
        }
    }
    public function validation_add()
    {
        $this->form_validation->set_rules('txtMenuName','Menu name','required');
        $this->form_validation->set_rules('txtPrice','Price','required|numeric');
        $config['upload_path']='./assets/uploads/';
        $config['allowed_types']='jpg|gif|jpeg|png';
        $this->load->library('upload',$config);
        if($this->form_validation->run()==TRUE)
        {
            if($this->upload->do_upload('file'))
             {
                $file_name=$this->upload->data();
             }
            else $file_name= array('file_name' =>"");
            $this->menu_M->add($file_name);
            redirect('index.php/Menu_C/index');
        }
        else $this->add();
    }
    public function delete($menu_id)
    {
        if(isset($menu_id))
        {
            if(!$this->menu_M->delete($menu_id));
        }
    }
    public function get_to_edit($m_id)
    {
        $this->header_left();
        $data['record']=$this->menu_M->get_to_edit($m_id);
        $data['menu']=$this->menu_M->get_cat();
        $this->load->view('menu_edit_V',$data);
        $this->footer();
    }
    public function save_change($m_id)
    {
        $this->form_validation->set_rules('txtMenuName','Menu name','required');
        $this->form_validation->set_rules('txtPrice','Price','required|numeric');
        $config['upload_path']='./assets/uploads/';
        $config['allowed_types']='jpg|gif|jpeg|png';
        $this->load->library('upload',$config);
        if($this->form_validation->run()==TRUE)
        {
            if($this->upload->do_upload('file'))
             {
                $file_name=$this->upload->data();
             }
            else $file_name= array('file_name' =>"");
            $this->menu_M->save_change($m_id,$file_name);
            redirect('index.php/Menu_C/index');
        }
        else $this->get_to_edit($m_id);
    }
    public function menu_detail($detail_id)
    {
        $this->header_left();
        $data['record']=$this->menu_M->menu_detail($detail_id);
        $this->load->view('menu_detail_V',$data);
        $this->footer();
    }

    public function orderMenu()
    {
      $data['menu']=$this->menu_M->get_menu_order_by_order();
      $this->header_left();
      $this->load->view('order_menu',$data);
      $this->footer();

    }

    public function recipe($id="")
    {
      if($id!=""){
        $this->load->view("template/header");
        $this->load->view("template/left");
        $this->load->view("recipe");
        $this->load->view("template/footer");
      }
    }
}
