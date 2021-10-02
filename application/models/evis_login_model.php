<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Login_Model extends CI_Model {
    
    public function user_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_email',$data['customer_email']);
        $this->db->where('customer_password', $data['customer_password']);
	$this->db->where('customer_status',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function shop_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_email',$data['shop_email']);
        $this->db->where('shop_password', $data['shop_password']);
	$this->db->where('shop_status',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

}