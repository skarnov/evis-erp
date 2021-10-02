<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_App extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('evis_login', 'refresh');
        }
    }
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['class'] = 'active';
        $config['base_url'] = base_url() . 'evis_app/index/';
        $config['total_rows'] = $this->db->count_all('tbl_product');
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
        $data['all_stock'] = $this->evis_app_model->select_all_stock();
        $data['shop_due'] = $this->evis_app_model->select_all_shop_due();
        $data['income_amount'] = $this->evis_app_model->select_all_income_amount();
        $data['current_balance'] = $this->evis_app_model->select_current_balance();
        $data['all_task'] = $this->evis_app_model->select_all_task();
        $sql = "SELECT * FROM tbl_delivery AS d, tbl_employee AS e, tbl_sale AS s WHERE d.employee_id=e.employee_id AND d.sale_id=s.sale_id AND delivery_status=0 ORDER BY delivery_id DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        $data['all_delivery'] = $result;
        $data['dashboard'] = $this->load->view('dashboard', $data, true);
        $this->load->view('master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_date_time');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('evis_login');
    }
    
    public function all_notification()
    {
        $data = array();
        $data['title'] = 'All Notification';
        $config['base_url'] = base_url() . 'evis_app/all_notification/';
        $config['total_rows'] = $this->db->count_all('tbl_notification');
        $config['per_page'] = '10';
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
        $data['all_notification'] = $this->evis_app_model->select_all_notification($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('all_notification', $data, true);
        $this->load->view('master', $data);
    }
    
    public function read_notification($notification_id)
    {
        $this->evis_app_model->read_notification_by_id($notification_id);
        redirect('evis_app');
    }
    
    public function delete_notification($notification_id) 
    {
        $this->evis_app_model->delete_notification_by_id($notification_id);
        redirect('evis_app/all_notification');
    }
    
    public function add_admin() 
    {
        $data = array();
        $data['title'] = 'Add Admin';
        $data['admin'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('add_admin', $data, true);
        $this->load->view('master', $data);
    }

    public function save_admin()
    {
        $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|min_length[6]|max_length[250]|matches[conform_password]|xss_clean');
        $this->form_validation->set_rules('conform_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Password Did Not Match';
            $data['new_message'] = $this->evis_app_model->select_new_message();
            $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
            $data['all_notification'] = $this->evis_app_model->select_new_notification();
            $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
            $data['dashboard'] = $this->load->view('add_admin', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $data['admin_status'] = $this->input->post('admin_status', true);
            $this->evis_app_model->save_admin_info($data);
            if ($data['admin_status'] == '1') 
            {
                $sdata = array();
                $sdata['save_admin'] = 'Admin Active';
                $this->session->set_userdata($sdata);
            }
            if ($data['admin_status'] == '0')
            {
                $sdata = array();
                $sdata['save_admin'] = 'Admin Info Saved';
                $this->session->set_userdata($sdata);
            }
            redirect('evis_app/add_admin');
        }
    }

    public function manage_admin()
    {
        $data = array();
        $data['title'] = 'Manage Admin';
        $data['admin_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_app/manage_admin/';
        $config['total_rows'] = $this->db->count_all('tbl_admin');
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
        $data['all_admin'] = $this->evis_app_model->select_all_admin($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_admin', $data, true);
        $this->load->view('master', $data);
    }

    public function deactive_admin($admin_id) 
    {
        $this->evis_app_model->deactive_admin_by_id($admin_id);
        redirect('evis_app/manage_admin');
    }

    public function active_admin($admin_id)
    {
        $this->evis_app_model->active_admin_by_id($admin_id);
        redirect('evis_app/manage_admin');
    }

    public function edit_admin($admin_id) 
    {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['admin'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['admin_info'] = $this->evis_app_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('edit_admin', $data, true);
        $this->load->view('master', $data);
    }

    public function update_admin() 
    {
        $sdata = array();
        $sdata['edit_admin'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        $this->evis_app_model->update_admin_info();
        redirect('evis_app/manage_admin');
    }

    public function delete_admin($admin_id) 
    {
        $this->evis_app_model->delete_admin_by_id($admin_id);
        redirect('evis_app/manage_admin');
    }

    public function add_customer()
    {
        $data = array();
        $data['title'] = 'New Customer';
        $data['customer'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('add_customer', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_customer()
    {
        $this->evis_app_model->save_customer_info();
        $sdata = array();
        $sdata['save_customer'] = 'Customer Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_customer');
    }
    
    public function manage_customer()
    {
        $data = array();
        $data['title'] = 'Manage Customer';
        $data['customer_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_app/manage_customer/';
        $config['total_rows'] = $this->db->count_all('tbl_customer');
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
        $data['all_customer'] = $this->evis_app_model->select_all_customer($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_customer', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_customer($customer_id) 
    {
        $data = array();
        $data['title'] = 'Edit Customer';
        $data['customer'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['customer_info'] = $this->evis_app_model->select_customer_by_id($customer_id);
        $data['dashboard'] = $this->load->view('edit_customer', $data, true);
        $sdata = array();
        $sdata['edit_customer'] = 'Update Customer Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_customer() 
    {
        $this->evis_app_model->update_customer_info();
        redirect('evis_app/manage_customer');
    }
    
    public function delete_customer($customer_id) 
    {
        $this->evis_app_model->delete_customer_by_id($customer_id);
        redirect('evis_app/manage_customer');
    }
    
    public function manage_customer_transaction()
    {
        $data = array();
        $data['title'] = 'Manage Customer Transaction';
        $data['customer_transaction'] = 'active';
        $config['base_url'] = base_url() . 'evis_pos/manage_customer_transaction/';
        $config['total_rows'] = $this->db->count_all('tbl_sale');
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
        $data['all_customer_sale'] = $this->evis_app_model->select_all_customer_sale($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_customer_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_cashbook()
    {
        $data = array();
        $data['title'] = 'Download Cashbook';
        $data['search_cashbook'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('search_cashbook', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_cashbook_report()
    {
        $data = array();
        $data['title'] = 'Cashbook Report';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['search_cashbook'] = 'active';
        $data['cashbook_report_info'] = $this->evis_app_model->select_cashbook_report_info($start,$end,$data);
        $data['total_cashbook'] = $this->evis_app_model->select_total_cashbook($start,$end,$data);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('download_cashbook_report_sheet', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_cashbook_report($start,$end)
    {
        $data = array();
        $data['cashbook_report_info'] = $this->evis_app_model->select_cashbook_report_info($start,$end,$data);
        $data['total_cashbook'] = $this->evis_app_model->select_total_cashbook($start,$end,$data);      
        $data['start'] = $start;
        $data['end'] = $end;
        $this->load->view('download_cashbook_report_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_cashbook_report_form.pdf");
    }

    public function manage_cashbook() 
    {
        $data = array();
        $data['title'] = 'Manage Cashbook';
        $data['cashbook_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_app/manage_cashbook/';
        $config['total_rows'] = $this->db->count_all('tbl_cashbook');
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
        $data['all_cashbook'] = $this->evis_app_model->select_all_cashbook($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_cashbook', $data, true);
        $this->load->view('master', $data);
    }
    
    public function add_income()
    {
        $data = array();
        $data['title'] = 'Add Income';
        $data['income'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_income_category'] = $this->evis_app_model->select_all_income_category();
        $data['dashboard'] = $this->load->view('add_income', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_income()
    {
        $this->form_validation->set_rules('income_category', 'Income Category', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Income Category');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['new_message'] = $this->evis_app_model->select_new_message();
            $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
            $data['all_notification'] = $this->evis_app_model->select_new_notification();
            $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
            $data['all_income_category'] = $this->evis_app_model->select_all_income_category();
            $data['dashboard'] = $this->load->view('add_income', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->evis_app_model->save_income_info();
            $this->evis_app_model->save_cashbook_info();
            $sdata = array();
            $sdata['save_income'] = 'Income Saved';
            $this->session->set_userdata($sdata);
            redirect('evis_app/add_income');
        }
    }
    
    public function manage_income() 
    {
        $data = array();
        $data['title'] = 'Manage Income';
        $data['income_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_app/manage_income/';
        $config['total_rows'] = $this->db->count_all('tbl_income');
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
        $data['all_income'] = $this->evis_app_model->select_all_income($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_income', $data, true);
        $this->load->view('master', $data);
    }
    
    public function income_details($income_id) 
    {
        $data = array();
        $data['title'] = 'Income Details';
        $data['income_manage'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['income_details'] = $this->evis_app_model->select_income_details_by_id($income_id);
        $data['dashboard'] = $this->load->view('income_details', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_income($income_id,$sale_id, $time) 
    {
        $this->load->model('evis_pos_model');
        $this->evis_app_model->delete_income_by_id($income_id);
        $this->evis_pos_model->delete_sale_by_id($sale_id);
        $sql = "DELETE FROM tbl_cashbook WHERE cashbook_entry_time = '$time'";
        $this->db->query($sql);
        redirect('evis_app/manage_income');
    }
    
    public function add_income_category()
    {
        $data = array();
        $data['title'] = 'Add Income Category';
        $data['income_category'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('add_income_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_income_category()
    {
        $this->evis_app_model->save_income_category_info();
        $sdata = array();
        $sdata['save_income_category'] = 'Income Category Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_income_category');
    }
    
    public function manage_income_category() 
    {
        $data = array();
        $data['title'] = 'Manage Income Category';
        $data['income_category_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_app/manage_income_category/';
        $config['total_rows'] = $this->db->count_all('tbl_income_category');
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
        $data['all_income_category'] = $this->evis_app_model->select_income_category($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_income_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_income_category($income_category_id) 
    {
        $data = array();
        $data['title'] = 'Edit Income Category';
        $data['income_category_manage'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['income_category_info'] = $this->evis_app_model->select_income_category_by_id($income_category_id);
        $data['dashboard'] = $this->load->view('edit_income_category', $data, true);
        $sdata = array();
        $sdata['edit_income_category'] = 'Update Income Category Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }
    
    public function update_income_category() 
    {
        $this->evis_app_model->update_income_category_info();
        redirect('evis_app/manage_income_category');
    }
    
    public function delete_income_category($income_category) 
    {
        $this->evis_app_model->delete_income_category_by_id($income_category);
        redirect('evis_app/manage_income_category');
    }
    
    public function add_expense()
    {
        $data = array();
        $data['title'] = 'Add Expense';
        $data['expense'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_expense_category'] = $this->evis_app_model->select_all_expense_category();
        $data['dashboard'] = $this->load->view('add_expense', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_expense()
    {
        $this->form_validation->set_rules('expense_category', 'Expense Category', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Expense Category');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['new_message'] = $this->evis_app_model->select_new_message();
            $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
            $data['all_notification'] = $this->evis_app_model->select_new_notification();
            $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
            $data['all_expense_category'] = $this->evis_app_model->select_all_expense_category();
            $data['dashboard'] = $this->load->view('add_expense', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->evis_app_model->save_expense_info();
            $this->evis_app_model->save_expense_cashbook_info();
            $sdata = array();
            $sdata['save_expense'] = 'Expense Saved';
            $this->session->set_userdata($sdata);
            redirect('evis_app/add_expense');
        }
    }
    
    public function manage_expense() 
    {
        $data = array();
        $data['title'] = 'Manage Expense';
        $data['expense_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_app/manage_expense/';
        $config['total_rows'] = $this->db->count_all('tbl_expense');
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
        $data['all_expense'] = $this->evis_app_model->select_all_expense($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_expense', $data, true);
        $this->load->view('master', $data);
    }
    
    public function expense_details($expense_id) 
    {
        $data = array();
        $data['title'] = 'Expense Details';
        $data['expense_manage'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['expense_details'] = $this->evis_app_model->select_expense_details_by_id($expense_id);
        $data['dashboard'] = $this->load->view('expense_details', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_expense($expense_id,$product_id,$time) 
    {
        $sql = "DELETE FROM tbl_cashbook WHERE cashbook_entry_time = '$time'";
        $this->db->query($sql);
        $this->evis_app_model->delete_expense_by_id($expense_id);
        $this->evis_inventory_model->delete_product_by_id($product_id);
        redirect('evis_app/manage_expense');
    }
    
    public function add_expense_category()
    {
        $data = array();
        $data['title'] = 'Add Expense Category';
        $data['expense_category'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('add_expense_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_expense_category()
    {
        $this->evis_app_model->save_expense_category_info();
        $sdata = array();
        $sdata['message'] = 'Expense Category Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_expense_category');
    }
    
    public function manage_expense_category() 
    {
        $data = array();
        $data['title'] = 'Manage Expense Category';
        $data['expense_category_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_app/manage_expense_category/';
        $config['total_rows'] = $this->db->count_all('tbl_expense_category');
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
        $data['all_expense_category'] = $this->evis_app_model->select_expense_category($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_expense_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_expense_category($expense_category) 
    {
        $data = array();
        $data['title'] = 'Edit Expense Category';
        $data['expense_category_manage'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['expense_category_info'] = $this->evis_app_model->select_expense_category_by_id($expense_category);
        $data['dashboard'] = $this->load->view('edit_expense_category', $data, true);
        $sdata = array();
        $sdata['message'] = 'Update Expense Category Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }
    
    public function update_expense_category() 
    {
        $this->evis_app_model->update_expense_category_info();
        redirect('evis_app/manage_expense_category');
    }
    
    public function delete_expense_category($expense_category) 
    {
        $this->evis_app_model->delete_expense_category_by_id($expense_category);
        redirect('evis_app/manage_expense_category');
    }
    
    public function income_report()
    {
        $data = array();
        $data['title'] = 'Income Report';
        $data['income_report'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('income_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_income_report()
    {
        $data = array();
        $data['title'] = 'Income Report';
        $data['income_report'] = 'active';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['income_report_info'] = $this->evis_app_model->select_income_report_info($start,$end,$data);
        $data['total_income'] = $this->evis_app_model->select_total_income($start,$end,$data);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('download_income_report_sheet', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_income_report($start,$end)
    {
        $data = array();
        $data['income_report_info'] = $this->evis_app_model->select_income_report_info($start,$end);
        $data['total_income'] = $this->evis_app_model->select_total_income($start,$end);       
        $data['start'] = $start;
        $data['end'] = $end;
        $this->load->view('download_income_report_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_income_report_form.pdf");
    }
    
    public function expense_report()
    {
        $data = array();
        $data['title'] = 'Expense Report';
        $data['expense_report'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('expense_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_expense_report()
    {
        $data = array();
        $data['title'] = 'Expense Report';
        $data['expense_report'] = 'active';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['expense_report_info'] = $this->evis_app_model->select_expense_report_info($start,$end,$data);
        $data['total_expense'] = $this->evis_app_model->select_total_expense($start,$end,$data);
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('download_expense_report_sheet', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_expense_report($start,$end)
    {
        $data = array();
        $data['start'] = $start;
        $data['end'] = $end;
        $data['expense_report_info'] = $this->evis_app_model->select_expense_report_info($start,$end,$data);
        $data['total_expense'] = $this->evis_app_model->select_total_expense($start,$end,$data);
        $this->load->view('download_expense_report_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_expense_report_form.pdf");
    }
    
    public function total_report()
    {
        $data = array();
        $data['title'] = 'Total Report';
        $data['total_report'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('total_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_total_report()
    {
        $data = array();
        $data['title'] = 'Income Expense Report';
        $data['total_report'] = 'active';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['income_report_info'] = $this->evis_app_model->select_income_report_info($start,$end,$data);
        $data['expense_report_info'] = $this->evis_app_model->select_expense_report_info($start,$end,$data);
        $data['total_income'] = $this->evis_app_model->select_total_income($start,$end,$data);
        $data['total_expense'] = $this->evis_app_model->select_total_expense($start,$end,$data);
        $data['dashboard'] = $this->load->view('download_total_report_sheet', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_total_report($start,$end)
    {
        $data = array();
        $data['start'] = $start;
        $data['end'] = $end;
        $data['income_report_info'] = $this->evis_app_model->select_income_report_info($start,$end,$data);
        $data['expense_report_info'] = $this->evis_app_model->select_expense_report_info($start,$end,$data);
        $data['total_income'] = $this->evis_app_model->select_total_income($start,$end,$data);
        $data['total_expense'] = $this->evis_app_model->select_total_expense($start,$end,$data);
        $this->load->view('download_total_report_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_total_report_form.pdf");
    }
}