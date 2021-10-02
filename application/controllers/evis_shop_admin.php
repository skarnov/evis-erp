<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Shop_Admin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $shop_id = $this->session->userdata('shop_id');
        if ($shop_id == NULL) 
        {
            redirect('evis_shop_login', 'refresh');
        }
        $this->load->model('evis_shop_model');
    }
    
    public function index()
    {
        $shop_id=$this->session->userdata('shop_id');
        $data = array();
        $data['title'] = 'Shop Dashboard';
        $data['select_shop_chat'] = $this->evis_shop_model->select_shop_chat($shop_id);
        $data['select_admin_chat'] = $this->evis_shop_model->select_admin_chat($shop_id);
        $data['dashboard'] = $this->load->view('shop/dashboard', $data, true);
        $this->load->view('shop/master', $data);
    }
    
    public function save_chat($shop_id,$shop_message)
    {   
        $data = array();
        $this->evis_shop_model->save_chat_info($shop_id,$shop_message);
        $data['select_shop_chat'] = $this->evis_shop_model->select_shop_chat($shop_id);
        $data['select_admin_chat'] = $this->evis_shop_model->select_admin_chat($shop_id);
        echo $this->load->view('shop/shop_chat_information',$data);
    }
    
    public function show_chat($shop_id)
    {   
        $data = array();
        $data['select_shop_chat'] = $this->evis_shop_model->select_shop_chat($shop_id);
        $data['select_admin_chat'] = $this->evis_shop_model->select_admin_chat($shop_id);
        echo $this->load->view('shop/shop_chat_information',$data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('shop_id');
        $this->session->unset_userdata('shop_name');
        $this->session->unset_userdata('shop_date_time');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('evis_shop_login');
    }   
}