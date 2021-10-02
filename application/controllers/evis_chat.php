<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Chat extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('evis_chat_model');
    }
        
    public function new_chat()
    {
        $data = array();
        $data['title'] = 'New Chat';
        $data['chat'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('chat/new_chat', $data, true);
        $this->load->view('master', $data);
    }
    
    public function all_customer()
    {
        $data = array();
        $data['title'] = 'All Customer';
        $data['chat'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_customer'] = $this->evis_chat_model->select_all_customer();
        $data['dashboard'] = $this->load->view('chat/all_customer', $data, true);
        $this->load->view('master', $data);
    }
    
    public function all_shop()
    {
        $data = array();
        $data['title'] = 'All Customer';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_shop'] = $this->evis_chat_model->select_all_shop();
        $data['dashboard'] = $this->load->view('chat/all_shop', $data, true);
        $this->load->view('master', $data);
    }
    
    public function all_supplier()
    {
        $data = array();
        $data['title'] = 'All Supplier';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_supplier'] = $this->evis_chat_model->select_all_supplier();
        $data['dashboard'] = $this->load->view('chat/all_supplier', $data, true);
        $this->load->view('master', $data);
    }
    
    public function start_chat($customer_id)
    {
        $this->evis_chat_model->make_read_chat($customer_id);
        $data = array();
        $data['title'] = 'New Chat';
        $data['chat'] = 'active';
        $data['customer_id'] = $customer_id;
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['select_customer_chat'] = $this->evis_chat_model->select_customer_chat($customer_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_chat($customer_id);
        $data['dashboard'] = $this->load->view('chat/start_chat', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_chat($customer_id,$admin_message)
    {   
        $data = array();
        $this->evis_chat_model->save_chat_info($customer_id,$admin_message);
        $data['select_customer_chat'] = $this->evis_chat_model->select_customer_chat($customer_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_chat($customer_id);
        echo $this->load->view('chat/customer_information',$data);
    }
    
    public function show_chat($customer_id)
    {   
        $data = array();
        $data['select_customer_chat'] = $this->evis_chat_model->select_customer_chat($customer_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_chat($customer_id);
        echo $this->load->view('chat/customer_information',$data);
    }
    
    public function start_shop_chat($shop_id)
    {
        $this->evis_chat_model->make_read_shop_chat($shop_id);
        $data = array();
        $data['title'] = 'New Chat';
        $data['chat'] = 'active';
        $data['shop_id'] = $shop_id;
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['select_shop_chat'] = $this->evis_chat_model->select_shop_chat($shop_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_chat($shop_id);
        $data['dashboard'] = $this->load->view('chat/start_shop_chat', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_shop_chat($shop_id,$admin_message)
    {   
        $data = array();
        $this->evis_chat_model->save_shop_chat_info($shop_id,$admin_message);
        $data['select_shop_chat'] = $this->evis_chat_model->select_shop_chat($shop_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_shop_chat($shop_id);
        echo $this->load->view('chat/shop_chat_information',$data);
    }
    
    public function show_shop_chat($shop_id)
    {   
        $data = array();
        $data['select_shop_chat'] = $this->evis_chat_model->select_shop_chat($shop_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_shop_chat($shop_id);
        echo $this->load->view('chat/shop_chat_information',$data);
    }
    
    public function delete_customer_chat($customer_id)
    {
        $this->evis_chat_model->delete_customer_chat_by_id($customer_id);
        redirect('evis_chat/new_chat');
    }
    
    public function delete_shop_chat($shop_id)
    {
        $this->evis_chat_model->delete_shop_chat_by_id($shop_id);
        redirect('evis_chat/new_chat');
    }
}