<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_App_Model extends CI_Model {
    
    public function check_password($data)
    {
        $sql="select * from tbl_admin where admin_email='$data'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email', $data['admin_email']);
        $this->db->where('admin_password', $data['admin_password']);
        $this->db->where('admin_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_stock()
    {
        $sql = "SELECT SUM(product_net_price) AS stock FROM tbl_product ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_shop_due()
    {
        $sql = "SELECT SUM(shop_due) AS due FROM tbl_shop ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_task()
    {
        $sql = "SELECT * FROM tbl_task AS t, tbl_employee AS e WHERE t.employee_id=e.employee_id AND task_status = '1'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_income_amount()
    {
        $sql = "SELECT SUM(income_received_amount) AS income FROM tbl_income ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_current_balance()
    {
        $sql = "SELECT SUM(paid_amount) AS current_balance FROM tbl_cashbook ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_new_message()
    {
        $sql = "SELECT * FROM tbl_chat AS c, tbl_shop AS s, tbl_customer AS t WHERE c.shop_id=s.shop_id OR c.customer_id=t.customer_id AND show_status=1  ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_new_message_count()
    {
        $sql = "SELECT count(chat_id) AS number FROM tbl_chat WHERE show_status=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_new_notification()
    {
        $sql = "SELECT * FROM tbl_notification WHERE notification_status=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_new_notification_count()
    {
        $sql = "SELECT count(notification_id) AS number FROM tbl_notification WHERE notification_status=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_notification($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_notification ORDER BY notification_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function read_notification_by_id($notification_id)
    {
        $this->db->set('notification_status',0);
        $this->db->where('notification_id',$notification_id);
        $this->db->update('tbl_notification');
    }
    
    public function delete_notification_by_id($notification_id)
    {
        $this->db->where('notification_id',$notification_id);
        $this->db->delete('tbl_notification');
    }
    
    public function select_all_low_quantity($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_product WHERE product_quantity <= 5 LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_admin_info()
    {
        $data = array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $data['admin_level'] = $this->input->post('admin_level', true);
        $data['admin_status'] = $this->input->post('admin_status', true);
        $this->db->insert('tbl_admin',$data);
    }
    
    public function select_all_admin($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_admin LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function deactive_admin_by_id($admin_id)
    {
        $this->db->set('admin_status',0);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin');
    }
    
    public function active_admin_by_id($admin_id)
    {
        $this->db->set('admin_status',1);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin');
    }
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_level'] = $this->input->post('admin_level', true);
        $data['admin_status'] = $this->input->post('admin_status', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
    
    public function delete_admin_by_id($admin_id)
    {
        $this->db->where('admin_id',$admin_id);
        $this->db->delete('tbl_admin');
    }

    public function save_customer_info()
    {
        $data=array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $this->db->insert('tbl_customer',$data);
    }
    
    public function select_all_customer($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_customer ORDER BY customer_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_customer_by_id($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_customer_info()
    {
        $data=array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['customer_status'] = $this->input->post('customer_status', true);
        $customer_id = $this->input->post('customer_id', true);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
    }
    
    public function delete_customer_by_id($customer_id)
    {
        $this->db->where('customer_id',$customer_id);
        $this->db->delete('tbl_customer');
    }
    
    public function select_all_customer_sale($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_sale as s, tbl_customer AS c WHERE s.customer_id IS NOT NULL AND s.customer_id=c.customer_id ORDER BY s.sale_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_month()
    {
        $this->db->select('*');
        $this->db->from('tbl_month');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_year()
    {
        $this->db->select('*');
        $this->db->from('tbl_year');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_cashbook_report_info($start,$end)
    {
        $sql = "SELECT * FROM tbl_cashbook WHERE cashbook_entry_time BETWEEN '$start' AND '$end'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_cashbook($start,$end)
    {
        $sql = "SELECT SUM(received_amount) AS income, SUM(paid_amount) AS expense FROM tbl_cashbook WHERE (cashbook_entry_time BETWEEN '$start' AND '$end')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
    
    public function select_all_cashbook($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
  
    public function select_all_income_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_income_category');
        $query_result=$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function save_income_info()
    {
        $data=array();
        $data['income_category'] = $this->input->post('income_category', true); 
        $data['net_income'] = $this->input->post('net_income', true); 
        $data['income_received_amount'] = $this->input->post('income_received_amount', true);
        $data['income_receivable'] = $this->input->post('income_receivable', true); 
        $this->db->insert('tbl_income',$data);
    }
    
    public function save_cashbook_info()
    {
        $sql = "SELECT current_balance FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result_2 = $query_result->row();
        $current_balance=$result_2->current_balance;
        $received_amount = $this->input->post('income_received_amount', true);
        $balance=($current_balance+$received_amount);
        $sql_2 = "INSERT INTO tbl_cashbook (received_amount,current_balance) VALUES ('$received_amount','$balance') ";
        $this->db->query($sql_2);
    }
    
    public function select_all_income($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_income AS i, tbl_income_category AS c WHERE i.income_category=c.income_category ORDER BY i.income_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_income_details_by_id($income_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_income');
        $this->db->where('income_id',$income_id);
        $this->db->join('tbl_income_category', 'tbl_income_category.income_category = tbl_income.income_category', 'left');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function delete_income_by_id($income_id)
    {
        $this->db->where('income_id',$income_id);
        $this->db->delete('tbl_income');
    }
    
    public function save_income_category_info()
    {
        $data=array();
        $data['income_category_name'] = $this->input->post('income_category_name', true); 
        $this->db->insert('tbl_income_category',$data);
    }
    
    public function select_income_category($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_income_category LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_income_category_by_id($income_category)
    {
        $this->db->select('*');
        $this->db->from('tbl_income_category');
        $this->db->where('income_category',$income_category);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_income_category_info()
    {
        $data=array();
        $data['income_category_name'] = $this->input->post('income_category_name', true); 
        $income_category=$this->input->post('income_category',true);
        $this->db->where('income_category',$income_category);
        $this->db->update('tbl_income_category',$data);
    }
    
    public function delete_income_category_by_id($income_category)
    {
        $this->db->where('income_category',$income_category);
        $this->db->delete('tbl_income_category');
    }
    
    public function select_all_expense_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_expense_category');
        $query_result=$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function save_expense_info()
    {
        $data=array();
        $data['expense_category'] = $this->input->post('expense_category', true); 
        $data['net_expense'] = $this->input->post('net_expense', true); 
        $data['expense_paid_amount'] = $this->input->post('expense_paid_amount', true); 
        $data['expense_payable'] = $this->input->post('expense_payable', true); 
        $this->db->insert('tbl_expense',$data);
    }
    
    public function save_expense_cashbook_info()
    {
        $sql = "SELECT current_balance FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result_2 = $query_result->row();
        $current_balance=$result_2->current_balance;
        $paid_amount = $this->input->post('expense_paid_amount', true); 
        $balance=($current_balance-$paid_amount);
        $sql_2 = "INSERT INTO tbl_cashbook (paid_amount,current_balance) VALUES ('$paid_amount','$balance') ";
        $this->db->query($sql_2);
    }
    
    public function select_all_expense($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_expense AS e, tbl_expense_category AS c WHERE e.expense_category=c.expense_category ORDER BY e.expense_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_expense_details_by_id($expense_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_expense');
        $this->db->where('expense_id',$expense_id);
        $this->db->join('tbl_expense_category', 'tbl_expense_category.expense_category = tbl_expense.expense_category', 'left');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function delete_expense_by_id($expense_id)
    {
        $this->db->where('expense_id',$expense_id);
        $this->db->delete('tbl_expense');
    }
    
    public function save_expense_category_info()
    {
        $data=array();
        $data['expense_category_name'] = $this->input->post('expense_category_name', true); 
        $this->db->insert('tbl_expense_category',$data);
    }
    
    public function select_expense_category($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_expense_category ORDER BY expense_category DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_expense_category_by_id($expense_category)
    {
        $this->db->select('*');
        $this->db->from('tbl_expense_category');
        $this->db->where('expense_category',$expense_category);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_expense_category_info()
    {
        $data=array();
        $data['expense_category_name'] = $this->input->post('expense_category_name', true); 
        $expense_category=$this->input->post('expense_category',true);
        $this->db->where('expense_category',$expense_category);
        $this->db->update('tbl_expense_category',$data);
    }
    
    public function delete_expense_category_by_id($expense_category)
    {
        $this->db->where('expense_category',$expense_category);
        $this->db->delete('tbl_expense_category');
    }
    
    public function select_income_report_info($start,$end)
    {
        $sql = "SELECT * FROM tbl_income AS i, tbl_income_category AS c WHERE i.income_category=c.income_category AND i.income_time BETWEEN '$start' AND '$end'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_income($start,$end)
    {
        $sql = "SELECT SUM(income_received_amount) AS total, SUM(income_receivable) AS due FROM tbl_income WHERE (income_time BETWEEN '$start' AND '$end')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
    
    public function select_expense_report_info($start,$end)
    {
        $sql = "SELECT * FROM tbl_expense AS e, tbl_expense_category AS c WHERE e.expense_category=c.expense_category AND e.expense_time BETWEEN '$start' AND '$end'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_expense($start,$end)
    {
        $sql = "SELECT SUM(expense_paid_amount) AS total, SUM(expense_payable) AS due FROM tbl_expense WHERE (expense_time BETWEEN '$start' AND '$end')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
}