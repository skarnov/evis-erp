<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Evis_Customer extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id != NULL)
        {
            redirect('evis_ecommerce', 'refresh');
        }
    }
    
    public function index()
    {
        redirect('evis_ecommerce/login');
    }
    
    public function user_login_check()
    {
        $data = array();
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $result = $this->evis_login_model->user_login_check($data);        
        $sdata = array();
        if ($result != NULL)
        {
            $sdata['customer_id'] = $result->customer_id;
            $sdata['customer_name'] = $result->customer_name;
            $this->session->set_userdata($sdata);
            redirect('evis_ecommerce');
        } 
        if ($result == NULL)
        {
            $sdata['exception'] = 'Your login information invalid!';
            $this->session->set_userdata($sdata);
            redirect('evis_ecommerce/login');
        }
    }
}