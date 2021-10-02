<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Chat_Model extends CI_Model {
    
    public function select_all_customer()
    {
        $sql = "SELECT * FROM tbl_customer ORDER BY customer_id DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_shop()
    {
        $sql = "SELECT * FROM tbl_shop ORDER BY shop_id DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_chat_info($customer_id,$admin_message)
    {
        $data = array();
        $data['customer_id'] = $customer_id;
        $data['admin_message'] = str_replace('%20', ' ', $admin_message);
        $data['show_status'] = 0;
        $this->db->insert('tbl_chat',$data);
    }
    
    public function select_customer_chat($customer_id)
    {
        $sql = "SELECT * FROM tbl_chat AS c, tbl_customer AS u WHERE c.customer_id='$customer_id' AND c.customer_id=u.customer_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_admin_chat($customer_id)
    {
        $sql = "SELECT * FROM tbl_chat AS c, tbl_customer AS u WHERE c.customer_id='$customer_id' AND c.customer_id=u.customer_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function make_read_chat($customer_id)
    {
        $sql = "UPDATE tbl_chat SET show_status='0' WHERE customer_id='$customer_id'";
        $this->db->query($sql);
    }
    
    public function save_shop_chat_info($shop_id,$admin_message)
    {
        $data = array();
        $data['shop_id'] = $shop_id;
        $data['admin_message'] = str_replace('%20', ' ', $admin_message);
        $data['show_status'] = 0;
        $this->db->insert('tbl_chat',$data);
    }
    
    public function select_shop_chat($shop_id)
    {
        $sql = "SELECT * FROM tbl_chat AS c, tbl_shop AS u WHERE c.shop_id='$shop_id' AND c.shop_id=u.shop_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_admin_shop_chat($shop_id)
    {
        $sql = "SELECT * FROM tbl_chat AS c, tbl_shop AS u WHERE c.shop_id='$shop_id' AND c.shop_id=u.shop_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function make_read_shop_chat($shop_id)
    {
        $sql = "UPDATE tbl_chat SET show_status='0' WHERE shop_id='$shop_id'";
        $this->db->query($sql);
    }
    
    public function delete_customer_chat_by_id($customer_id)
    {
        $this->db->where('customer_id',$customer_id);
        $this->db->delete('tbl_chat');
    }
    
    public function delete_shop_chat_by_id($shop_id)
    {
        $this->db->where('shop_id',$shop_id);
        $this->db->delete('tbl_chat');
    }
}