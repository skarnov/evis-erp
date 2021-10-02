<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Supplier_Model extends CI_Model {
    
    public function save_supplier_info($data)
    {
        $this->db->insert('tbl_supplier',$data);
    }
    
    public function select_all_supplier($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_supplier ORDER BY supplier_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_supplier_by_id($supplier_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_supplier');
        $this->db->where('supplier_id',$supplier_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_supplier_info()
    {
        $data=array();
        $data['supplier_name'] = $this->input->post('supplier_name', true);
        $data['agent_name'] = $this->input->post('agent_name', true);
        $data['supplier_email'] = $this->input->post('supplier_email', true);
        $data['supplier_mobile'] = $this->input->post('supplier_mobile', true);
        $data['supplier_address'] = $this->input->post('supplier_address', true);
        $data['supplier_note'] = $this->input->post('supplier_note', true);
        $data['supplier_status'] = $this->input->post('supplier_status', true);
        $supplier_id = $this->input->post('supplier_id', true);
        $this->db->where('supplier_id',$supplier_id);
        $this->db->update('tbl_supplier',$data);
    }
    
    public function delete_supplier_by_id($supplier_id)
    {
        $this->db->where('supplier_id',$supplier_id);
        $this->db->delete('tbl_supplier');
    }
    
    public function save_transaction_info()
    {
        $data=array();
        $data['supplier_id'] = $this->input->post('supplier_id', true);
        $data['balance'] = $this->input->post('balance', true);
        $data['paid'] = $this->input->post('paid', true);
        $data['due'] = $this->input->post('due', true);
        $this->db->insert('tbl_supplier_transaction',$data);
        $expense=array();
        $transaction_id=$this->db->insert_id();
        $expense['expense_category'] = 1;
        $expense['net_expense'] = $this->input->post('balance', true);
        $expense['expense_paid_amount'] = $this->input->post('paid', true);
        $expense['expense_payable'] = $this->input->post('due', true);
        $expense['transaction_id'] = $transaction_id;
        $this->db->insert('tbl_expense',$expense);
    }
    
    public function update_supplier_due()
    {
        $data=array();
        $data['supplier_due'] = $this->input->post('due', true);
        $supplier_id = $this->input->post('supplier_id', true);
        $this->db->where('supplier_id',$supplier_id);
        $this->db->update('tbl_supplier',$data);
    }
    
    public function save_cashbook_info()
    {
        $sql = "SELECT current_balance FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result_2 = $query_result->row();
        $current_balance=$result_2->current_balance;
        $paid_amount = $this->input->post('paid', true);
        $balance=($current_balance-$paid_amount);
        $sql_2 = "INSERT INTO tbl_cashbook (paid_amount,current_balance) VALUES ('$paid_amount','$balance') ";
        $this->db->query($sql_2);
    }
    
    public function save_notification_info()
    {
        $data=array();
        $supplier_name= $this->input->post('supplier_name', true);
        $paid = $this->input->post('paid', true);
        $data['notification_type'] = "$supplier_name paid by $paid";
        $this->db->insert('tbl_notification',$data);
    }
    
    public function select_all_transaction($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_supplier_transaction AS t, tbl_supplier AS s WHERE t.supplier_id=s.supplier_id ORDER BY transaction_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
	
    public function delete_transaction_by_id($transaction_id)
    {
        $this->db->where('transaction_id',$transaction_id);
        $this->db->delete('tbl_supplier_transaction');
    }
    
    public function delete_expense_by_id($transaction_id)
    {
        $this->db->where('transaction_id',$transaction_id);
        $this->db->delete('tbl_expense');
    }
    
    public function delete_cashbook_by_id($time)
    {
        $this->db->where('cashbook_entry_time',$time);
        $this->db->delete('tbl_cashbook');
    }
    
    public function delete_notification_by_id($time)
    {
        $this->db->where('notification_time',$time);
        $this->db->delete('tbl_notification');
    }
}