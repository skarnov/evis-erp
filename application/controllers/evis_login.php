<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Evis_Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id != NULL)
        {
            redirect('evis_app', 'refresh');
        }
    }
    
    public function index()
    {
        $this->load->view('admin_login');
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
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('evis_ecommerce/login');
    }

    public function check_admin_login()
    {
        $data = array();
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|min_length[6]|max_length[250]|xss_clean');
        if($this->form_validation->run() == False)
        {
            $this->load->view('admin_login');
        }
        else
        {
            $result = $this->evis_app_model->admin_login_check($data);
            $sdata = array();
            if ($result)
            {
                $sdata['admin_id'] = $result->admin_id;
                $sdata['admin_name'] = $result->admin_name;
                $sdata['admin_level'] = $result->admin_level;
                $sdata['admin_date_time'] = $result->admin_date_time;
                $this->session->set_userdata($sdata);
                redirect('evis_app');
            } 
            else
            {
                $sdata['exception'] = 'Your Email / Password Invalide !';
                $this->session->set_userdata($sdata);
                redirect('evis_login');
            }
        }
    }
    
    public function forgot_password() 
    {
        $this->load->view('forgot_password');
    }
    
    public function reset_password()
    {
        $this->load->library('email');
        $this->load->model('mailer_model');
        $data = $this->input->post('admin_email', true);
        $result = $this->evis_app_model->check_password($data);
        $password = $result->admin_password;
        if ($password) {
            $mdata = array();
            $mdata['from_address'] = 'arnob@evistechnology.com';
            $mdata['admin_full_name'] = 'Sheikh Arnov';
            $mdata['to_address'] = $data;
            $mdata['subject'] = 'Evis Forget Password';
            $mdata['admin_password'] = $password;
            $this->mailer_model->forget_password($mdata, 'forget_password_email');
            redirect('evis_login/forgot_password');
        } else {
            echo 'Your password is not exists our Database';
            redirect('evis_login/forgot_password');
        }
    }
}