<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Hrm_Model extends CI_Model {
    
    public function save_employee_info($data)
    {
        $this->db->insert('tbl_employee',$data);
    }
    
    public function select_all_employee($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_employee LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_employee_by_id($employee_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('employee_id',$employee_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_employee_info()
    {
        $data=array();
        $data['employee_name'] = $this->input->post('employee_name', true);
        $data['employee_join_date'] = $this->input->post('employee_join_date', true);
        $data['employee_designation'] = $this->input->post('employee_designation', true);
        $data['employee_security_number'] = $this->input->post('employee_security_number', true);
        $data['employee_salary'] = $this->input->post('employee_salary', true);
        $data['employee_mobile_number'] = $this->input->post('employee_mobile_number', true);
        $data['employee_office_number'] = $this->input->post('employee_office_number', true);
        $data['employee_education'] = $this->input->post('employee_education', true);
        $data['employee_experience'] = $this->input->post('employee_experience', true);
        $data['employee_resignation_date'] = $this->input->post('employee_resignation_date', true);
        $data['employee_status'] = $this->input->post('employee_status', true);
        $employee_id=$this->input->post('employee_id',true);
        $this->db->where('employee_id',$employee_id);
        $this->db->update('tbl_employee',$data);
    }
    
    public function delete_employee_by_id($employee_id)
    {
        $this->db->where('employee_id',$employee_id);
        $this->db->delete('tbl_employee');
    }
    
    public function select_employee_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $query_result=$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function save_salary_info()
    {
        $data=array();
        $data['employee_id'] = $this->input->post('employee_id', true);
        $data['month_id'] = $this->input->post('month_id', true);
        $data['year_id'] = $this->input->post('year_id', true);
        $data['salary_paid_date'] = $this->input->post('salary_paid_date', true);
        $data['salary_amount_due'] = $this->input->post('salary_amount_due', true);  
        $data['salary_amount_paid'] = $this->input->post('salary_amount_paid', true);  
        $data['salary_amount_balance'] = $this->input->post('salary_amount_balance', true);  
        $data['comment'] = $this->input->post('comment', true);  
        $this->db->insert('tbl_salary',$data);
        $expense=array();
        $salary_id=$this->db->insert_id();
        $expense['expense_category'] = 4;
        $expense['net_expense'] = $this->input->post('salary_amount_balance', true);
        $expense['expense_paid_amount'] = $this->input->post('salary_amount_paid', true);
        $expense['expense_payable'] = $this->input->post('salary_amount_due', true);
        $expense['salary_id'] = $salary_id;
        $this->db->insert('tbl_expense',$expense);
    }
    
    public function update_salary_due()
    {
        $data=array();
        $data['employee_salary_due'] = $this->input->post('salary_amount_due', true);
        $employee_id = $this->input->post('employee_id', true);
        $this->db->where('employee_id',$employee_id);
        $this->db->update('tbl_employee',$data);
    }
    
    public function save_cashbook_info()
    {
        $sql = "SELECT current_balance FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result_2 = $query_result->row();
        $current_balance=$result_2->current_balance;
        $paid_amount = $this->input->post('salary_amount_paid', true);
        $balance=($current_balance-$paid_amount);
        $sql_2 = "INSERT INTO tbl_cashbook (paid_amount,current_balance) VALUES ('$paid_amount','$balance') ";
        $this->db->query($sql_2);
    }

    public function select_all_salary($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_salary AS s, tbl_month AS m, tbl_employee AS e WHERE s.employee_id=e.employee_id AND s.month_id=m.month_id ORDER BY s.salary_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_salary_by_id($salary_id)
    {
        $this->db->where('salary_id',$salary_id);
        $this->db->delete('tbl_salary');
    }
    
    public function delete_expense_salary_by_id($salary_id)
    {
        $this->db->where('salary_id',$salary_id);
        $this->db->delete('tbl_expense');
    } 
    
    public function select_month($month_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_month');
        $this->db->where('month_id',$month_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_year($year_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_year');
        $this->db->where('year_id',$year_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function total_paid($employee_id)
    {
        $sql = "SELECT SUM(salary_amount_paid) AS paid FROM tbl_salary WHERE employee_id='$employee_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function total_balance($employee_id)
    {
        $sql = "SELECT SUM(salary_amount_balance) AS balance FROM tbl_salary WHERE employee_id='$employee_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function download_salary_sheet($employee_id)
    {
        $sql = "SELECT * FROM tbl_salary WHERE employee_id='$employee_id'";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function total_paid_month($employee_id,$month_id,$year_id)
    {
        $sql = "SELECT SUM(salary_amount_paid) AS paid FROM tbl_salary WHERE employee_id='$employee_id' AND month_id='$month_id' AND year_id='$year_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function total_balance_month($employee_id,$month_id,$year_id)
    {
        $sql = "SELECT SUM(salary_amount_balance) AS balance FROM tbl_salary WHERE employee_id='$employee_id' AND month_id='$month_id' AND year_id='$year_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
 
    public function download_salary_sheet_by_month($employee_id,$month_id,$year_id)
    {
        $sql = "SELECT * FROM tbl_salary WHERE employee_id='$employee_id' AND month_id='$month_id' AND year_id='$year_id'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
}