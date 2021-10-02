<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Pos extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('evis_pos_model');
        $this->load->model('evis_supplier_model');
    }

   public function add_sale()
    {
        $data = array();
        $data['title'] = 'New Sale';
        $data['sale'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['dashboard'] = $this->load->view('pos/add_sale', $data, true);
        $this->load->view('master', $data);
    }
    
    public function add_to_cart($product_barcode)
    {
        $product_info = $this->evis_pos_model->select_product_by_barcode($product_barcode);
        $data = array(
            'id'      => $product_info->product_id,
            'qty'     => 1,
            'price'   => $product_info->product_selling_price,
            'name'    => $product_info->product_name,
            'shop_info'    => '',
        );
        $this->cart->insert($data);       
	$this->load->view('pos/product_information',$data);
    }
    
    public function shop_mobile($shop_mobile)
    {
        $data = array();
        $data['shop_info'] = $this->evis_pos_model->select_shop_by_mobile($shop_mobile);    
	$this->load->view('pos/product_information',$data);
    }
    
    public function remove($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => '0'
        );
        $this->cart->update($data);
	$this->load->view('pos/product_information',$data);
    }
    
    public function destroy()
    {
        $this->cart->destroy();
        $this->load->view('pos/product_information');
    }
    
    public function save_sale()
    {
        $this->evis_pos_model->save_sale_info();
        $this->evis_pos_model->save_cashbook_info();
        $sdata = array();
        $sdata['save_sale'] = 'Success!';
        $this->session->set_userdata($sdata);
        redirect('evis_pos/add_sale');
    }
    
    public function manage_sale()
    {
        $data = array();
        $data['sale_manage'] = 'active';
        $data['title'] = 'Manage Sale';
        $config['base_url'] = base_url() . 'evis_pos/manage_sale/';
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
        $data['all_sale'] = $this->evis_pos_model->select_all_sale($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('pos/manage_sale', $data, true);
        $this->load->view('master', $data);
    }
    
    public function sale_details($sale_id) 
    {
        $data = array();
        $data['title'] = 'Sale Details';
        $data['sale_manage'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['sale_info'] = $this->evis_pos_model->select_sale_by_id($sale_id);
        $data['dashboard'] = $this->load->view('pos/sale_details', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_sale($sale_id) 
    {
        $sql = "SELECT income_time FROM tbl_income WHERE sale_id = '$sale_id'";
        $query_result = $this->db->query($sql);
        $time = $query_result->row()->income_time;
        $this->evis_supplier_model->delete_cashbook_by_id($time);
        $this->evis_pos_model->delete_sale_by_id($sale_id);
        $this->evis_pos_model->delete_sale_details_by_id($sale_id);
        $this->evis_pos_model->delete_sale_income_by_id($sale_id);
        redirect('evis_pos/manage_sale');
    }
    
    public function manage_order()
    {
        $data = array();
        $data['title'] = 'Manage Order';
        $data['order_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_pos/manage_order/';
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
        $data['all_sale'] = $this->evis_pos_model->select_all_order($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('pos/manage_order', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_order($sale_id) 
    {
        $data = array();
        $data['title'] = 'Edit Order';
        $data['order_manage'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['order_info'] = $this->evis_pos_model->select_order_by_id($sale_id);
        $data['dashboard'] = $this->load->view('pos/edit_order', $data, true);
        $this->load->view('master', $data);
    }
    
    public function unpaid_order($sale_id)
    {
        $this->evis_pos_model->unpaid_order($sale_id);
        redirect('evis_pos/manage_order');
    }

    public function paid_order($sale_id)
    {
        $this->evis_pos_model->paid_order($sale_id);
        redirect('evis_pos/manage_order');
    }
    
    public function add_delivery()
    {
        $data = array();
        $data['title'] = 'New Delivery';
        $data['delivery'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['undelivered_sale'] = $this->evis_pos_model->select_all_undelivered_sale();
        $data['all_employee'] = $this->evis_erp_model->select_all_active_employee();
        $data['dashboard'] = $this->load->view('pos/add_delivery', $data, true);
        $this->load->view('master', $data);
    }

    public function save_delivery()
    {
        $this->evis_pos_model->save_delivery_info();
        $sdata = array();
        $sdata['save_sale'] = 'Done!';
        $this->session->set_userdata($sdata);
        redirect('evis_pos/manage_delivery');
    }
    
    public function manage_delivery()
    {
        $data = array();
        $data['title'] = 'Manage Delivery';
        $data['delivery_manage'] = 'active';
        $config['base_url'] = base_url() . 'evis_pos/manage_delivery/';
        $config['total_rows'] = $this->db->count_all('tbl_delivery');
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
        $data['all_delivery'] = $this->evis_pos_model->select_all_delivery($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('pos/manage_delivery', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_delivery($delivery_id) 
    {
        $data = array();
        $data['title'] = 'Edit Delivery';
        $data['delivery'] = 'active';
        $data['new_message'] = $this->evis_app_model->select_new_message();
        $data['new_message_count'] = $this->evis_app_model->select_new_message_count();
        $data['all_notification'] = $this->evis_app_model->select_new_notification();
        $data['notification_count'] = $this->evis_app_model->select_new_notification_count();
        $data['undelivered_sale'] = $this->evis_pos_model->select_all_undelivered_sale();
        $data['all_employee'] = $this->evis_erp_model->select_all_active_employee();
        $data['delivery_info'] = $this->evis_pos_model->select_delivery_by_id($delivery_id);
        $data['dashboard'] = $this->load->view('pos/edit_delivery', $data, true);
        $sdata = array();
        $sdata['edit_delivery'] = 'Update Delivery Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_delivery() 
    {
        $this->evis_pos_model->update_delivery_info();
        redirect('evis_pos/manage_delivery');
    }
    
    public function delete_delivery($delivery_id) 
    {
        $this->evis_pos_model->delete_delivery_by_id($delivery_id);
        redirect('evis_pos/manage_delivery');
    }
}