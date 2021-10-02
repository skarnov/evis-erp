<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Erp extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('evis_login', 'refresh');
        }
        $this->load->model('evis_supplier_model');
    }
    
    public function add_product_planning()
    {
        $data = array();
        $data['title'] = 'New Product Planning';
        $data['plan'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('add_product_planning', $data, true);
        $this->load->view('master', $data);
    }

    public function save_product_planning()
    {
        $this->evis_erp_model->save_product_planning_info();
        $sdata = array();
        $sdata['save_product_planning'] = 'Product Planning Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_erp/add_product_planning');
    }
    
    public function manage_product_planning()
    {
        $data = array();
        $data['title'] = 'Manage Product Planning';
        $data['plan_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_product_planning/';
        $config['total_rows'] = $this->db->count_all('tbl_planning');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_planning'] = $this->evis_erp_model->select_all_planning($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_product_planning', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_product_planning($planning_id) 
    {
        $data = array();
        $data['title'] = 'Edit Product Planning';
        $data['plan'] = 'active';
        $data['planning_info'] = $this->evis_erp_model->select_planning_by_id($planning_id);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('edit_product_planning', $data, true);
        $this->load->view('master', $data);
    }

    public function update_product_planning() 
    {
        $sdata = array();
        $sdata['edit_planning'] = 'Update Product Planning Information Successfully';
        $this->session->set_userdata($sdata);
        $this->evis_erp_model->update_planning_info();
        redirect('evis_erp/manage_product_planning');
    }

    public function delete_product_planning($planning_id) 
    {
        $this->evis_erp_model->delete_planning_by_id($planning_id);
        redirect('evis_erp/manage_product_planning');
    }
    
    public function add_manufacturing_product()
    {
        $data = array();
        $data['title'] = 'New Manufacturing Product';
        $data['manufacturing'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('add_manufacturing_product', $data, true);
        $this->load->view('master', $data);
    }

    public function save_manufacturing_product()
    {
        $this->evis_erp_model->save_manufacturing_product_info();
        $sdata = array();
        $sdata['save_manufacturing_product'] = 'Manufacturing Info Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_erp/add_manufacturing_product');
    }
    
    public function manage_manufacturing_product()
    {
        $data = array();
        $data['title'] = 'Manage Manufacturing';
        $data['manufacturing_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_manufacturing_product/';
        $config['total_rows'] = $this->db->count_all('tbl_manufacturing');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_manufacturing'] = $this->evis_erp_model->select_all_manufacturing($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_manufacturing_product', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_manufacturing($manufacturing_id) 
    {
        $data = array();
        $data['title'] = 'Edit Manufacturing';
        $data['manufacturing'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['manufacturing_info'] = $this->evis_erp_model->select_manufacturing_by_id($manufacturing_id);
        $data['dashboard'] = $this->load->view('edit_manufacturing_product', $data, true);
        $this->load->view('master', $data);
    }

    public function update_manufacturing() 
    {
        $sdata = array();
        $sdata['edit_manufacturing'] = 'Update Manufacturing Product Successfully';
        $this->session->set_userdata($sdata);
        $this->evis_erp_model->update_manufacturing_info();
        redirect('evis_erp/manage_manufacturing_product');
    }

    public function delete_manufacturing($manufacturing_id) 
    {
        $this->evis_erp_model->delete_manufacturing_by_id($manufacturing_id);
        redirect('evis_erp/manage_manufacturing_product');
    }
    
    public function add_service()
    {
        $data = array();
        $data['title'] = 'New Service';
        $data['service'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_manufacturing_product'] = $this->evis_erp_model->select_all_manufacturing_product();
        $data['dashboard'] = $this->load->view('add_service', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_service()
    {
        $this->evis_erp_model->save_service_info();
        $sdata = array();
        $sdata['save_service'] = 'Product Service Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_erp/add_service');
    }
    
    public function manage_service()
    {
        $data = array();
        $data['title'] = 'Manage Service';
        $data['service_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_service/';
        $config['total_rows'] = $this->db->count_all('tbl_service');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_service'] = $this->evis_erp_model->select_all_service($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_service', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_service($service_id) 
    {
        $data = array();
        $data['title'] = 'Edit Service';
        $data['service'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_manufacturing_product'] = $this->evis_erp_model->select_all_manufacturing_product();
        $data['service_info'] = $this->evis_erp_model->select_service_by_id($service_id);
        $data['dashboard'] = $this->load->view('edit_service', $data, true);
        $this->load->view('master', $data);
    }

    public function update_service() 
    {
        $sdata = array();
        $sdata['edit_service'] = 'Update Service Product Successfully';
        $this->session->set_userdata($sdata);
        $this->evis_erp_model->update_service_info();
        redirect('evis_erp/manage_service');
    }
    
    public function delete_service($service_id) 
    {
        $this->evis_erp_model->delete_service_by_id($service_id);
        redirect('evis_erp/manage_service');
    }
    
    public function add_campaign()
    {
        $data = array();
        $data['title'] = 'New Campaign';
        $data['campaign'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('add_campaign', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_campaign()
    {
        $this->evis_erp_model->save_campaign_info();
        $sdata = array();
        $sdata['save_campaign'] = 'Campaign Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_erp/add_campaign');
    }

    public function manage_campaign()
    {
        $data = array();
        $data['title'] = 'Manage Campaign';
        $data['campaign_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_campaign/';
        $config['total_rows'] = $this->db->count_all('tbl_campaign');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_campaign'] = $this->evis_erp_model->select_all_campaign($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_campaign', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_campaign($campaign_id) 
    {
        $data = array();
        $data['title'] = 'Edit Campaign';
        $data['campaign'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['campaign_info'] = $this->evis_erp_model->select_campaign_by_id($campaign_id);
        $data['dashboard'] = $this->load->view('edit_campaign', $data, true);
        $sdata = array();
        $sdata['edit_campaign'] = 'Update Campaign Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_campaign() 
    {
        $this->evis_erp_model->update_campaign_info();
        redirect('evis_erp/manage_campaign');
    }
    
    public function delete_campaign($campaign_id) 
    {
        $this->evis_erp_model->delete_campaign_by_id($campaign_id);
        redirect('evis_erp/manage_campaign');
    }

    public function add_promotion()
    {
        $data = array();
        $data['title'] = 'New Promotion';
        $data['promotion'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_product'] = $this->evis_erp_model->select_all_published_product();
        $data['all_campaign'] = $this->evis_erp_model->total_campaign();
        $data['all_employee'] = $this->evis_erp_model->select_all_active_employee();
        $data['dashboard'] = $this->load->view('add_promotion', $data, true);
        $this->load->view('master', $data);
    }
    
    public function show_campaign_information($campaign_id)
    {
        $data = array();
        $data['campaign_info'] = $this->evis_erp_model->select_campaign_by_id($campaign_id);
        $this->load->view('campaign_information', $data);
    }
    
    public function save_promotion()
    {
        $this->evis_erp_model->save_promotion_info();
        $this->evis_erp_model->save_cashbook_info();
        $this->evis_erp_model->update_campaign_due();
        $this->evis_erp_model->save_task_info();
        $sdata = array();
        $sdata['save_promotion'] = 'Product Promotion Done';
        $this->session->set_userdata($sdata);
        redirect('evis_erp/add_promotion');
    }

    public function manage_promotion()
    {
        $data = array();
        $data['title'] = 'Manage Promotion';
        $data['promotion_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_promotion/';
        $config['total_rows'] = $this->db->count_all('tbl_marketing');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_promotion'] = $this->evis_erp_model->select_all_promotion($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_promotion', $data, true);
        $this->load->view('master', $data);
    }
        
    public function delete_promotion($marketing_id) 
    {   
        $sql = "SELECT employee_id FROM tbl_marketing WHERE marketing_id = '$marketing_id'";
        $query_result = $this->db->query($sql);
        $employee_id = $query_result->row()->employee_id;
        
        $sql1 = "SELECT expense_time FROM tbl_expense WHERE marketing_id = '$marketing_id'";
        $query_result1 = $this->db->query($sql1);
        $time = $query_result1->row()->expense_time;
        $this->evis_erp_model->delete_task_by_id($employee_id);
        $this->evis_erp_model->delete_promotion_by_id($marketing_id);
        $this->evis_erp_model->delete_expense_by_id($marketing_id);
        $this->evis_supplier_model->delete_cashbook_by_id($time);        
        redirect('evis_erp/manage_promotion');
    }
}