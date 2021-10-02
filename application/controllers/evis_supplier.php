<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Supplier extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('evis_supplier_model');
    }
    
    public function add_supplier()
    {
        $data = array();
        $data['title'] = 'New Supplier';
        $data['supplier'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('supplier/add_supplier', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_supplier()
    {
        $data=array();
        $data['supplier_name'] = $this->input->post('supplier_name', true);
        $data['agent_name'] = $this->input->post('agent_name', true);
        $data['supplier_email'] = $this->input->post('supplier_email', true);
        $data['supplier_mobile'] = $this->input->post('supplier_mobile', true);
        /** IF THEY DO NOT SELECT A IMAGE **/
        foreach ($_FILES as $eachFile) {
            if ($eachFile['size'] > 0) {
                /** START IMAGE RESIZE **/
                $config['upload_path'] = 'img/supplier_image/';
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
                if (!$this->upload->do_upload('supplier_image')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } else {
                    $fdata = $this->upload->data();
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'img/supplier_image/';
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
                    $index = 'supplier_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
            }
        }
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['supplier_address'] = $this->input->post('supplier_address', true);
        $data['supplier_note'] = $this->input->post('supplier_note', true);
        $data['supplier_status'] = $this->input->post('supplier_status', true);
        $this->evis_supplier_model->save_supplier_info($data);
        $sdata = array();
        $sdata['save_supplier'] = 'Supplier Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_supplier/add_supplier');
    }
    
    public function manage_supplier()
    {
        $data = array();
        $data['title'] = 'Manage Supplier';
        $data['supplier_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_supplier/';
        $config['total_rows'] = $this->db->count_all('tbl_supplier');
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
        $data['all_supplier'] = $this->evis_supplier_model->select_all_supplier($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('supplier/manage_supplier', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_supplier($supplier_id) 
    {
        $data = array();
        $data['title'] = 'Edit Supplier';
        $data['supplier'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['supplier_info'] = $this->evis_supplier_model->select_supplier_by_id($supplier_id);
        $data['dashboard'] = $this->load->view('supplier/edit_supplier', $data, true);
        $this->load->view('master', $data);
    }

    public function update_supplier() 
    {
        $sdata = array();
        $sdata['edit_supplier'] = 'Update Supplier Product Successfully';
        $this->session->set_userdata($sdata);
        $this->evis_supplier_model->update_supplier_info();
        redirect('evis_supplier/manage_supplier');
    }
    
    public function delete_supplier($supplier_id) 
    {
        $this->evis_supplier_model->delete_supplier_by_id($supplier_id);
        redirect('evis_supplier/manage_supplier');
    }
    
    public function show_supplier_information($supplier_id)
    {
        $data = array();
        $data['supplier_info'] = $this->evis_supplier_model->select_supplier_by_id($supplier_id);
        $this->load->view('supplier/supplier_information', $data);
    }
    
    public function add_transaction()
    {
        $data = array();
        $data['title'] = 'New Transaction';
        $data['supplier_transaction'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_supplier'] = $this->evis_inventory_model->select_all_published_supplier();
        $data['dashboard'] = $this->load->view('supplier/add_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_transaction()
    {
        $this->evis_supplier_model->save_transaction_info();
        $this->evis_supplier_model->update_supplier_due();
        $this->evis_supplier_model->save_cashbook_info();
        $this->evis_supplier_model->save_notification_info();
        $sdata = array();
        $sdata['save_supplier_transaction'] = 'Transaction Done';
        $this->session->set_userdata($sdata);
        redirect('evis_supplier/add_transaction');
    }
    
    public function manage_transaction()
    {
        $data = array();
        $data['title'] = 'Manage Transaction';
        $data['supplier_transaction_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_supplier/manage_transaction/';
        $config['total_rows'] = $this->db->count_all('tbl_supplier_transaction');
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
        $data['all_transaction'] = $this->evis_supplier_model->select_all_transaction($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('supplier/manage_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_transaction($transaction_id, $time) 
    {
        $this->evis_supplier_model->delete_transaction_by_id($transaction_id);
        $this->evis_supplier_model->delete_expense_by_id($transaction_id); 
        $time = str_replace('%20', ' ', $time);
        $this->evis_supplier_model->delete_cashbook_by_id($time);
        $this->evis_supplier_model->delete_notification_by_id($time);
        redirect('evis_supplier/manage_transaction');
    }
}