<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Evis_Shop_Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $shop_id = $this->session->userdata('shop_id');
        if ($shop_id != NULL)
        {
            redirect('evis_shop_admin', 'refresh');
        }
    }
    
    public function index()
    {
        $this->load->view('shop_login');
    }
    
    public function shop_login_check()
    {
        $data = array();
        $data['shop_email'] = $this->input->post('shop_email', true);
        $data['shop_password'] = $this->input->post('shop_password', true);
        $result = $this->evis_login_model->shop_login_check($data);        
        $sdata = array();
        if ($result != NULL)
        {
            $sdata['shop_id'] = $result->shop_id;
            $sdata['shop_name'] = $result->shop_name;
            $sdata['shop_date_time'] = $result->shop_date_time;
            $this->session->set_userdata($sdata);
            redirect('evis_app');
        } 
        if ($result == NULL)
        {
            $sdata['exception'] = 'Your login information invalid!';
            $this->session->set_userdata($sdata);
            redirect('evis_shop_login');
        }
    }
}