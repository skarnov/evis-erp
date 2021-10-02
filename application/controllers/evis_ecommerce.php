<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Evis_Ecommerce extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('evis_chat_model');
    }

    public function index() {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['all_product'] = $this->evis_erp_model->select_all_featured_product();
        $data['home'] = $this->load->view('ecommerce/home', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

    public function login() {
        $data = array();
        $data['title'] = 'Login';
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['home'] = $this->load->view('ecommerce/login', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('evis_ecommerce/login');
    }

    public function dashboard() {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Login';
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['select_customer_chat'] = $this->evis_chat_model->select_customer_chat($customer_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_chat($customer_id);
        $data['home'] = $this->load->view('ecommerce/dashboard', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

    public function save_chat($customer_id, $customer_message) {
        $data = array();
        $this->evis_ecommerce_model->save_chat_info($customer_id, $customer_message);
        $data['select_customer_chat'] = $this->evis_chat_model->select_customer_chat($customer_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_chat($customer_id);
        echo $this->load->view('chat/customer_information', $data);
    }

    public function show_chat($customer_id) {
        $data = array();
        $data['select_customer_chat'] = $this->evis_chat_model->select_customer_chat($customer_id);
        $data['select_admin_chat'] = $this->evis_chat_model->select_admin_chat($customer_id);
        echo $this->load->view('chat/customer_information', $data);
    }

    public function register() {
        $data = array();
        $data['title'] = 'Register';
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['home'] = $this->load->view('ecommerce/register', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

    public function save_customer() {
        $this->evis_app_model->save_customer_info();
        $sdata = array();
        $sdata['save_customer'] = 'Customer Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_ecommerce/register');
    }

    public function add_to_wishlist($product_id, $customer_id) {
        if ($customer_id == 0) {
            $customer_id = 1;
        }
        $product_info = $this->evis_inventory_model->select_product_by_id($product_id);
        $data = array(
            'id' => $product_info->product_id,
            'customer_id' => $customer_id,
            'name' => $product_info->product_name,
            'image' => $product_info->product_image,
            'price' => $product_info->product_selling_price,
        );
        $this->evis_ecommerce_model->save_wishlist_info($data);
    }

    public function wishlist($customer_id) {
        $data = array();
        $data['title'] = 'Shoping Cart';
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['select_wishlist'] = $this->evis_ecommerce_model->select_user_wishlist($customer_id);
        $data['wishlist_total'] = $this->evis_ecommerce_model->select_wishlist_total($customer_id);
        $data['home'] = $this->load->view('ecommerce/wishlist', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

    public function add_to_cart($product_id, $quantiry) {
        if ($quantiry == 0) {
            $quantiry = 1;
        }
        $product_info = $this->evis_inventory_model->select_product_by_id($product_id);
        $data = array(
            'id' => $product_info->product_id,
            'name' => $product_info->product_name,
            'image' => $product_info->product_image,
            'qty' => $quantiry,
            'price' => $product_info->product_selling_price,
        );
        $this->cart->insert($data);
    }

    public function remove($rowid) {
        $data = array(
            'rowid' => $rowid,
            'qty' => '0'
        );
        $this->cart->update($data);
    }

    public function show_cart() {
        $data = array();
        $data['title'] = 'Shoping Cart';
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['home'] = $this->load->view('ecommerce/cart_view', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

    public function create_order() {
        $data = array();
        $data['title'] = 'Create Order';
        $data['all_manufacturer'] = $this->evis_inventory_model->select_all_published_manufacturer();
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['home'] = $this->load->view('ecommerce/create_order', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

    public function save_sale() {
        $this->evis_ecommerce_model->save_sale_info();
        $this->evis_ecommerce_model->save_cashbook_info();
        $sdata = array();
        $sdata['save_sale'] = 'Success!';
        $this->session->set_userdata($sdata);
        $this->cart->destroy();
        redirect('evis_ecommerce/show_cart');
    }

    public function category_product_listing($category_id = null, $start = null) {
        $data = array();
        $data['title'] = 'Product Listing';
        if (!$start) {
            $start = 0;
        }
        $data['start'] = $start;
        $data['limit'] = 8;
        $data['total_product'] = count($this->evis_ecommerce_model->select_product_by_category($category_id, '', ''));
        $data['product_listing'] = $this->evis_ecommerce_model->select_product_by_category($category_id, $start, $data['limit']);
        $data['this_page'] = count($data['product_listing']);
        $data['category_name'] = $this->evis_ecommerce_model->select_category_by_name($category_id);
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['home'] = $this->load->view('ecommerce/product_listing', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

    public function subcategory_product_listing($subcategory_id = null, $start = null) {
        $data = array();
        $data['title'] = 'Product Listing';
        if (!$start) {
            $start = 0;
        }
        $data['start'] = $start;
        $data['limit'] = 24;
        $data['total_product'] = count($this->evis_ecommerce_model->select_product_by_subcategory($subcategory_id, '', ''));
        $data['product_listing'] = $this->evis_ecommerce_model->select_product_by_subcategory($subcategory_id, $start, $data['limit']);
        $data['this_page'] = count($data['product_listing']);
        $data['subcategory_name'] = $this->evis_ecommerce_model->select_subcategory_by_name($subcategory_id);
        $data['all_category'] = $this->evis_inventory_model->select_all_published_category();
        $data['all_subcategory'] = $this->evis_inventory_model->select_all_published_subcategory();
        $data['home'] = $this->load->view('ecommerce/product_listing', $data, true);
        $this->load->view('ecommerce/master', $data);
    }

}
