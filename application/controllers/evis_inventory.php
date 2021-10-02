<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Inventory extends CI_Controller {
        
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('evis_login', 'refresh');
        }
    }
    
    public function add_category()
    {
        $data = array();
        $data['title'] = 'New Category';
        $data['category'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('inventory/add_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_category()
    {
        $this->evis_inventory_model->save_category_info();
        $sdata = array();
        $sdata['save_category'] = 'Category Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_category');
    }
    
    public function manage_category()
    {
        $data = array();
        $data['title'] = 'Manage Category';
        $data['category_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_category/';
        $config['total_rows'] = $this->db->count_all('tbl_category');
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
        $data['all_category'] = $this->evis_inventory_model->select_all_category($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('inventory/manage_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_category($category_id) 
    {
        $data = array();
        $data['title'] = 'Edit Category';
        $data['category'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['category_info'] = $this->evis_inventory_model->select_category_by_id($category_id);
        $data['dashboard'] = $this->load->view('inventory/edit_category', $data, true);
        $sdata = array();
        $sdata['edit_category'] = 'Update Category Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_category() 
    {
        $this->evis_inventory_model->update_category_info();
        redirect('evis_inventory/manage_category');
    }
    
    public function delete_category($category_id) 
    {
        $this->evis_inventory_model->delete_category_by_id($category_id);
        redirect('evis_inventory/manage_category');
    }

    public function add_subcategory()
    {
        $data = array();
        $data['title'] = 'New Subcategory';
        $data['subcategory'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['dashboard'] = $this->load->view('inventory/add_subcategory', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_subcategory()
    {
        $this->evis_inventory_model->save_subcategory_info();
        $sdata = array();
        $sdata['save_subcategory'] = 'Subcategory Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_subcategory');
    }
   
    public function manage_subcategory()
    {
        $data = array();
        $data['title'] = 'Manage Subcategory';
        $data['subcategory_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_inventory/manage_subcategory/';
        $config['total_rows'] = $this->db->count_all('tbl_subcategory');
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
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_subcategory($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('inventory/manage_subcategory', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_subcategory($subcategory_id) 
    {
        $data = array();
        $data['title'] = 'Edit Subcategory';
        $data['subcategory'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['subcategory_info'] = $this->evis_inventory_model->select_subcategory_by_id($subcategory_id);
        $data['dashboard'] = $this->load->view('inventory/edit_subcategory', $data, true);
        $sdata = array();
        $sdata['edit_subcategory'] = 'Update Subcategory Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_subcategory() 
    {
        $this->evis_inventory_model->update_subcategory_info();
        redirect('evis_inventory/manage_subcategory');
    }
    
    public function delete_subcategory($subcategory_id) 
    {
        $this->evis_inventory_model->delete_subcategory_by_id($subcategory_id);
        redirect('evis_inventory/manage_subcategory');
    }

    public function add_manufacturer()
    {
        $data = array();
        $data['title'] = 'New Manufacturer';
        $data['manufacturer'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('inventory/add_manufacturer', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_manufacturer()
    {
        $this->evis_inventory_model->save_manufacturer_info();
        $sdata = array();
        $sdata['save_manufacturer'] = 'Manufacturer Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_manufacturer');
    }
    
    public function manage_manufacturer()
    {
        $data = array();
        $data['title'] = 'Manage Manufacturer';
        $data['manufacturer_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_erp/manage_manufacturer/';
        $config['total_rows'] = $this->db->count_all('tbl_manufacturer');
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
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_manufacturer($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('inventory/manage_manufacturer', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_manufacturer($manufacturer_id) 
    {
        $data = array();
        $data['title'] = 'Edit Manufacturer';
        $data['manufacturer'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['manufacturer_info'] = $this->evis_inventory_model->select_manufacturer_by_id($manufacturer_id);
        $data['dashboard'] = $this->load->view('inventory/edit_manufacturer', $data, true);
        $sdata = array();
        $sdata['edit_manufacturer'] = 'Update Manufacturer Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_manufacturer() 
    {
        $this->evis_inventory_model->update_manufacturer_info();
        redirect('evis_inventory/manage_manufacturer');
    }
    
    public function delete_manufacturer($manufacturer_id) 
    {
        $this->evis_inventory_model->delete_manufacturer_by_id($manufacturer_id);
        redirect('evis_inventory/manage_manufacturer');
    }

    public function add_product()
    {
        $data = array();
        $data['title'] = 'New Product';
        $data['product'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_manufacturing_product'] = $this->evis_erp_model->select_all_manufacturing_product();
        $data['all_supplier'] = $this->evis_inventory_model->select_all_published_supplier();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['dashboard'] = $this->load->view('inventory/add_product', $data, true);
        $this->load->view('master', $data);
    }
    
    public function show_product_information($manufacturing_id)
    {
        $data = array();
        $data['product_info'] = $this->evis_inventory_model->select_product_info_by_manufacturing_id($manufacturing_id);
        $this->load->view('inventory/product_information', $data);
    }
    
    public function save_product()
    {
        $this->load->helper('file');
        $data=array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['product_barcode'] = $this->input->post('product_barcode', true);
        $data['product_sku'] = $this->input->post('product_sku', true);
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_id'] = $this->input->post('subcategory_id', true);
        $data['supplier_id'] = $this->input->post('supplier_id', true);
        $data['manufacturer_id'] = $this->input->post('manufacturer_id', true);
        $data['product_summery'] = $this->input->post('product_summery', true);
        /** IF THEY DO NOT SELECT A IMAGE **/
        foreach ($_FILES as $eachFile) {
            if ($eachFile['size'] > 0) {
                /** START IMAGE RESIZE **/
                $config['upload_path'] = 'img/product_image/';
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
                if (!$this->upload->do_upload('product_image')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } else {
                    $fdata = $this->upload->data();
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'img/product_image/';
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
                    $index = 'product_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
            }
        }
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_quantity'] = $this->input->post('product_quantity', true);
        $data['product_net_price'] = $this->input->post('total_expenditure', true);
        $data['product_selling_price'] = $this->input->post('product_selling_price', true);
        $data['product_status'] = $this->input->post('product_status', true);
        $this->evis_inventory_model->save_product_info($data);
        $this->evis_inventory_model->save_cashbook_info();
        $sdata = array();
        $sdata['save_product'] = 'Product Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_product');
    }
    
    public function manage_product()
    {
        $data = array();
        $data['title'] = 'Manage Product';
        $data['product_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_inventory/manage_product/';
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
        $data['all_product'] = $this->evis_inventory_model->select_all_product($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('inventory/manage_product', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_product($product_id) 
    {
        $data = array();
        $data['title'] = 'Edit Product';
        $data['product'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['all_supplier'] = $this->evis_inventory_model->select_all_published_supplier();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['product_info'] = $this->evis_inventory_model->select_product_by_id($product_id);
        $data['dashboard'] = $this->load->view('inventory/edit_product', $data, true);
        $sdata = array();
        $sdata['edit_product'] = 'Update product Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_product() 
    {
        $this->evis_inventory_model->update_product_info();
        redirect('evis_inventory/manage_product');
    }
    
    public function delete_product($product_id) 
    {        
        $this->evis_inventory_model->delete_product_by_id($product_id);
        $this->evis_inventory_model->delete_expense_by_id($product_id);
        redirect('evis_inventory/manage_product');
    }
}