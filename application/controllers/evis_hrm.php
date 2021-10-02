<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Evis_Hrm extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('evis_hrm_model');
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('evis_login', 'refresh');
        }
    }
    
    public function add_employee()
    {
        $data = array();
        $data['title'] = 'Add Employee';
        $data['employee'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('hrm/add_employee', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_employee() 
    {
        $this->load->helper('file');
        $data=array();
        $data['employee_name'] = $this->input->post('employee_name', true);
        /** IF THEY DO NOT SELECT A IMAGE **/
        foreach ($_FILES as $eachFile) {
            if ($eachFile['size'] > 0) {
                /** START IMAGE RESIZE **/
                $config['upload_path'] = 'img/employee_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('employee_image')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } else {
                    $fdata = $this->upload->data();
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'img/employee_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '270';
                $config['height'] = '329';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'employee_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
            }
        }
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['employee_join_date'] = $this->input->post('employee_join_date', true);
        $data['employee_designation'] = $this->input->post('employee_designation', true);
        $data['employee_security_number'] = $this->input->post('employee_security_number', true);
        $data['employee_salary'] = $this->input->post('employee_salary', true);
        $data['employee_mobile_number'] = $this->input->post('employee_mobile_number', true);
        $data['employee_office_number'] = $this->input->post('employee_office_number', true);
        $data['employee_education'] = $this->input->post('employee_education', true);
        $data['employee_experience'] = $this->input->post('employee_experience', true);
        $data['employee_resignation_date'] = $this->input->post('employee_resignation_date', true);
        $data['employee_status'] = $this->input->post('employee_status', true);
        $this->evis_hrm_model->save_employee_info($data);
        $sdata = array();
        $sdata['message'] = 'Employee Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_hrm/add_employee');
    }
    
    public function manage_employee()
    {
        $data = array();
        $data['title'] = 'Manage Employee';
        $data['employee_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_hrm/manage_employee/';
        $config['total_rows'] = $this->db->count_all('tbl_employee');
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
        $data['all_employee'] = $this->evis_hrm_model->select_all_employee($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('hrm/manage_employee', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_employee($employee_id) 
    {
        $data = array();
        $data['title'] = 'Download Preview';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['employee_info'] = $this->evis_hrm_model->select_employee_by_id($employee_id);
        $data['dashboard'] = $this->load->view('hrm/download_employee_preview', $data, true);
        $this->load->view('master', $data);
    }

    public function download_employee_form($employee_id)
    {
        $data = array();
        $data['employee_info'] = $this->evis_hrm_model->select_employee_by_id($employee_id);
        $this->load->view('hrm/download_employee_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_employee_form.pdf");
    }
       
    public function edit_employee($employee_id)
    {
        $data = array();
        $data['title'] = 'Edit Employee';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['employee_info'] = $this->evis_hrm_model->select_employee_by_id($employee_id);
        $data['dashboard'] = $this->load->view('hrm/edit_employee', $data, true);
        $sdata = array();
        $sdata['edit_employee'] = 'Update Employee Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_employee() 
    {
        $this->evis_hrm_model->update_employee_info();
        redirect('evis_hrm/manage_employee');
    }

    public function delete_employee($employee_id) 
    {
        $this->evis_hrm_model->delete_employee_by_id($employee_id);
        redirect('evis_hrm/manage_employee');
    }
    
    public function add_salary() 
    {
        $data = array();
        $data['title'] = 'Add Salary';
        $data['salary'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_month'] = $this->evis_app_model->select_all_month();
        $data['all_year'] = $this->evis_app_model->select_all_year();
        $data['all_employee'] = $this->evis_hrm_model->select_employee_list();
        $data['dashboard'] = $this->load->view('hrm/add_salary', $data, true);
        $this->load->view('master', $data);
    }

    public function show_employee_information($employee_id)
    {
        $data = array();
        $data['select_employee'] = $this->evis_hrm_model->select_employee_by_id($employee_id);
        $this->load->view('hrm/employee_information', $data);
    }

    public function save_salary() 
    {
        $this->form_validation->set_rules('employee_id', 'Employee', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Employee');
        $this->form_validation->set_rules('month_id', 'Month', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Month');
        $this->form_validation->set_rules('year_id', 'Year', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Year');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['dashboard'] = $this->load->view('hrm/add_salary', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->evis_hrm_model->save_salary_info();
            $this->evis_hrm_model->update_salary_due();
            $this->evis_hrm_model->save_cashbook_info();
            $sdata = array();
            $sdata['save_salary'] = 'Salary Provided Successfully';
            $this->session->set_userdata($sdata);
            redirect('evis_hrm/add_salary');
        }
    }

    public function manage_salary() 
    {
        $data = array();
        $data['title'] = 'Manage Salary';
        $data['salary_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_hrm/manage_salary/';
        $config['total_rows'] = $this->db->count_all('tbl_salary');
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
        $data['all_salary'] = $this->evis_hrm_model->select_all_salary($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('hrm/manage_salary', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_salary($salary_id) 
    {
        $this->evis_hrm_model->delete_salary_by_id($salary_id);
        $this->evis_hrm_model->delete_expense_salary_by_id($salary_id);
        redirect('evis_hrm/manage_salary');
    }
    
    public function search_salary()
    {
        $data = array();
        $data['title'] = 'Download Salary';
        $data['search_salary'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_month'] = $this->evis_app_model->select_all_month();
        $data['all_year'] = $this->evis_app_model->select_all_year();
        $data['all_employee'] = $this->evis_hrm_model->select_employee_list();
        $data['dashboard'] = $this->load->view('hrm/search_salary', $data, true);
        $this->load->view('master', $data);
    }
   
    public function download_salary_sheet()
    {
        $data = array();
        $data['title'] = 'Download Salary Sheet';
        $data['search_salary'] = 'active';
        $employee_id = $this->input->post('employee_id', true);
        $month_id = $this->input->post('month_id', true);
        $year_id = $this->input->post('year_id', true);      
        $month = $this->evis_hrm_model->select_month($month_id);
        $year = $this->evis_hrm_model->select_year($year_id);
        $month_name=$month->month_name;
        $year_name=$year->year_name;
        $month_id=$month->month_id;
        $year_id=$year->year_id;
        $sdata = array();
        $sdata['month_name'] = $month_name;
        $sdata['year_name'] = $year_name;
        $sdata['month_id'] = $month_id;
        $sdata['year_id'] = $year_id;
        $this->session->set_userdata($sdata);
        $data['employee_info'] = $this->evis_hrm_model->select_employee_by_id($employee_id);
        if ($employee_id == !NULL && $month_id == NULL && $year_id == NULL)
        {
            $data['total_paid'] = $this->evis_hrm_model->total_paid($employee_id);
            $data['total_balance'] = $this->evis_hrm_model->total_balance($employee_id);
            $data['download_salary_sheet'] = $this->evis_hrm_model->download_salary_sheet($employee_id);
        } 
        else 
        {
            $data['total_paid'] = $this->evis_hrm_model->total_paid_month($employee_id, $month_id, $year_id);
            $data['total_balance'] = $this->evis_hrm_model->total_balance_month($employee_id, $month_id, $year_id);
            $data['download_salary_sheet'] = $this->evis_hrm_model->download_salary_sheet_by_month($employee_id, $month_id, $year_id);
        }
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('hrm/download_salary_sheet_preview', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_salary_form($employee_id,$month_id,$year_id)
    {
        $data = array();
        $data['employee_info'] = $this->evis_hrm_model->select_employee_by_id($employee_id);
        $data['total_paid'] = $this->evis_hrm_model->total_paid_month($employee_id, $month_id, $year_id);
        $data['total_balance'] = $this->evis_hrm_model->total_balance_month($employee_id, $month_id, $year_id);
        $data['download_salary_sheet'] = $this->evis_hrm_model->download_salary_sheet_by_month($employee_id, $month_id, $year_id);
        $this->load->view('hrm/download_employee_salary_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_salary_form.pdf");    
    }
        
    public function download_employee_salary_form($employee_id)
    {
        $data = array();
        $data['employee_info'] = $this->evis_hrm_model->select_employee_by_id($employee_id);
        $data['total_paid'] = $this->evis_hrm_model->total_paid($employee_id);
        $data['total_balance'] = $this->evis_hrm_model->total_balance($employee_id);
        $data['download_salary_sheet'] = $this->evis_hrm_model->download_salary_sheet($employee_id);
        $this->load->view('hrm/download_employee_salary_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_employee_salary_form.pdf");    
    }
}