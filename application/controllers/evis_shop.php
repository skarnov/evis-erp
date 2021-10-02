<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Shop extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('evis_shop_model');
    }
    
   public function add_shop()
    {
        $data = array();
        $data['shop'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['title'] = 'New Shop';
        $data['dashboard'] = $this->load->view('shop/add_shop', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_shop()
    {
        $data=array();
        $data['shop_name'] = $this->input->post('shop_name', true);
        /** IF THEY DO NOT SELECT A IMAGE **/
        foreach ($_FILES as $eachFile) {
            if ($eachFile['size'] > 0) {
                /** START IMAGE RESIZE **/
                $config['upload_path'] = 'img/shop_image/';
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
                if (!$this->upload->do_upload('shop_image')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } else {
                    $fdata = $this->upload->data();
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'img/shop_image/';
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
                    $index = 'shop_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
            }
        }
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['shop_address'] = $this->input->post('shop_address', true);
        $data['shop_mobile_number'] = $this->input->post('shop_mobile_number', true);
        $data['shop_email'] = $this->input->post('shop_email', true);
        $data['shop_password'] = $this->input->post('shop_password', true);
        $data['shop_status'] = $this->input->post('shop_status', true);
        $this->evis_shop_model->save_shop_info($data);
        $sdata = array();
        $sdata['save_shop'] = 'Shop Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/add_shop');
    }
    
    public function manage_shop()
    {
        $data = array();
        $data['title'] = 'Manage Shop';
        $data['shop_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_shop/';
        $config['total_rows'] = $this->db->count_all('tbl_shop');
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
        $data['all_shop'] = $this->evis_shop_model->select_all_shop($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('shop/manage_shop', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_shop($shop_id) 
    {
        $data = array();
        $data['title'] = 'Edit Shop';
        $data['shop_manage'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['shop_info'] = $this->evis_shop_model->select_shop_by_id($shop_id);
        $data['dashboard'] = $this->load->view('shop/edit_shop', $data, true);
        $sdata = array();
        $sdata['edit_shop'] = 'Update Shop Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_shop() 
    {
        $this->evis_shop_model->update_shop_info();
        redirect('evis_shop/manage_shop');
    }
    
    public function delete_shop($shop_id) 
    {
        $this->evis_shop_model->delete_shop_by_id($shop_id);
        redirect('evis_shop/manage_shop');
    }
    
    public function show_shop_information($shop_id)
    {
        $data = array();
        $data['shop_info'] = $this->evis_shop_model->select_shop_by_id($shop_id);
        $this->load->view('shop/shop_information', $data);
    }
    
    public function add_transaction()
    {
        $data = array();
        $data['title'] = 'New Transaction';
        $data['shop_transaction'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_shop'] = $this->evis_shop_model->select_all_published_shop();
        $data['dashboard'] = $this->load->view('shop/add_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_transaction()
    {
        $this->evis_shop_model->save_transaction_info();
        $this->evis_shop_model->update_shop_due();
        $this->evis_shop_model->save_cashbook_info();
        $this->evis_shop_model->save_notification_info();
        $sdata = array();
        $sdata['save_shop_transaction'] = 'Transaction Done';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/add_transaction');
    }
    
    public function manage_transaction()
    {
        $data = array();
        $data['title'] = 'Manage Transaction';
        $data['shop_transaction_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_shop/manage_transaction/';
        $config['total_rows'] = $this->db->count_all('tbl_shop_transaction');
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
        $data['all_transaction'] = $this->evis_shop_model->select_all_transaction($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('shop/manage_transaction', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_transaction($transaction_id, $shop_id, $due) 
    {
        $sql = "UPDATE tbl_shop SET shop_due = shop_due - $due WHERE shop_id = '$shop_id'";
        $this->db->query($sql);
        $this->evis_shop_model->delete_transaction_by_id($transaction_id);
        redirect('evis_shop/manage_transaction');
    }
}