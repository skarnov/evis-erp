<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Shop_Model extends CI_Model {
    
    public function save_shop_info($data)
    {
        $this->db->insert('tbl_shop',$data);
    }
    
    public function select_all_shop($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_shop ORDER BY shop_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_shop_by_id($shop_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_id',$shop_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_shop_info()
    {
        $data=array();
        $data['shop_name'] = $this->input->post('shop_name', true);
        $data['shop_address'] = $this->input->post('shop_address', true);
        $data['shop_mobile_number'] = $this->input->post('shop_mobile_number', true);
        $data['shop_email'] = $this->input->post('shop_email', true);
        $data['shop_status'] = $this->input->post('shop_status', true);
        $shop_id = $this->input->post('shop_id', true);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop',$data);
    }
    
    public function delete_shop_by_id($shop_id)
    {
        $this->db->where('shop_id',$shop_id);
        $this->db->delete('tbl_shop');
    }
    
    public function select_all_published_shop()
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_transaction_info()
    {
        $data=array();
        $data['shop_id'] = $this->input->post('shop_id', true);
        $data['balance'] = $this->input->post('balance', true);
        $data['receive'] = $this->input->post('receive', true);
        $data['due'] = $this->input->post('due', true);
        $this->db->insert('tbl_shop_transaction',$data);
    }
    
    public function update_shop_due()
    {
        $data=array();
        $data['shop_due'] = $this->input->post('due', true);
        $shop_id = $this->input->post('shop_id', true);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop',$data);
    }
    
    public function save_cashbook_info()
    {
        $sql = "SELECT current_balance FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result_2 = $query_result->row();
        $current_balance=$result_2->current_balance;
        $receive = $this->input->post('receive', true);
        $balance=($current_balance+$receive);
        $sql_2 = "INSERT INTO tbl_cashbook (received_amount,current_balance) VALUES ('$receive','$balance') ";
        $this->db->query($sql_2);
    }
    
    public function save_notification_info()
    {
        $data=array();
        $shop_name= $this->input->post('shop_name', true);
        $receive = $this->input->post('receive', true);
        $data['notification_type'] = "$shop_name send by $receive";
        $this->db->insert('tbl_notification',$data);
    }
    
    public function select_all_transaction($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_shop_transaction AS t, tbl_shop AS s WHERE t.shop_id=s.shop_id ORDER BY transaction_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
	
    public function delete_transaction_by_id($transaction_id)
    {
        $this->db->where('transaction_id',$transaction_id);
        $this->db->delete('tbl_shop_transaction');
    }
    
    public function save_chat_info($shop_id,$shop_message)
    {
        $data = array();
        $data['shop_id'] = $shop_id;
        $data['shop_message'] = str_replace('%20', ' ', $shop_message);
        $data['show_status'] = 1;
        $this->db->insert('tbl_chat',$data);
    }
    
    public function select_shop_chat($shop_id)
    {
        $sql = "SELECT * FROM tbl_chat AS c, tbl_shop AS s WHERE c.shop_id='$shop_id' AND c.shop_id=s.shop_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_admin_chat($shop_id)
    {
        $sql = "SELECT * FROM tbl_chat AS c, tbl_shop AS s WHERE c.shop_id='$shop_id' AND c.shop_id=s.shop_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function make_read_chat($shop_id)
    {
        $sql = "UPDATE tbl_chat SET show_status='0' WHERE shop_id='$shop_id'";
        $this->db->query($sql);
    }
    
    
}