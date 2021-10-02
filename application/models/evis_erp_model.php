<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Erp_Model extends CI_Model {
    
    public function save_product_planning_info()
    {
        $data=array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['cost_per_product'] = $this->input->post('cost_per_product', true);
        $data['estimate_profit_per_product'] = $this->input->post('estimate_profit_per_product', true);
        $data['planning_note'] = $this->input->post('planning_note', true);
        $this->db->insert('tbl_planning',$data);
    }
    
    public function select_all_planning($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_planning ORDER BY planning_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_planning_by_id($planning_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_planning');
        $this->db->where('planning_id',$planning_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_planning_info()
    {
        $data=array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['cost_per_product'] = $this->input->post('cost_per_product', true);
        $data['estimate_profit_per_product'] = $this->input->post('estimate_profit_per_product', true);
        $data['planning_note'] = $this->input->post('planning_note', true);
        $planning_id = $this->input->post('planning_id', true);
        $this->db->where('planning_id',$planning_id);
        $this->db->update('tbl_planning',$data);
    }
    
    public function delete_planning_by_id($planning_id)
    {
        $this->db->where('planning_id',$planning_id);
        $this->db->delete('tbl_planning');
    }
    
    public function save_manufacturing_product_info()
    {
        $data=array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['cost_per_product'] = $this->input->post('cost_per_product', true);
        $data['estimate_profit_per_product'] = $this->input->post('estimate_profit_per_product', true);
        $data['manufacturing_note'] = $this->input->post('manufacturing_note', true);
        $this->db->insert('tbl_manufacturing',$data);
    }
    
    public function select_all_manufacturing($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_manufacturing ORDER BY manufacturing_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_manufacturing_by_id($manufacturing_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_manufacturing');
        $this->db->where('manufacturing_id',$manufacturing_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_manufacturing_info()
    {
        $data=array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['quantity'] = $this->input->post('quantity', true);
        $data['cost_per_product'] = $this->input->post('cost_per_product', true);
        $data['estimate_profit_per_product'] = $this->input->post('estimate_profit_per_product', true);
        $data['manufacturing_note'] = $this->input->post('manufacturing_note', true);
        $manufacturing_id = $this->input->post('manufacturing_id', true);
        $this->db->where('manufacturing_id',$manufacturing_id);
        $this->db->update('tbl_manufacturing',$data);
    }
    
    public function delete_manufacturing_by_id($manufacturing_id)
    {
        $this->db->where('manufacturing_id',$manufacturing_id);
        $this->db->delete('tbl_manufacturing');
    }
    
    public function select_all_manufacturing_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_manufacturing');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_service_info()
    {
        $data=array();
        $data['manufacturing_id'] = $this->input->post('manufacturing_id', true);
        $data['employee_cost'] = $this->input->post('employee_cost', true);
        $data['marketing_cost'] = $this->input->post('marketing_cost', true);
        $data['utility_cost'] = $this->input->post('utility_cost', true);
        $data['product_delivery_cost'] = $this->input->post('product_delivery_cost', true);
        $data['other_cost'] = $this->input->post('other_cost', true);
        $data['service_note'] = $this->input->post('service_note', true);
        $this->db->insert('tbl_service',$data);
    }
    
    public function select_all_service($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_service AS s, tbl_manufacturing AS m WHERE s.manufacturing_id=m.manufacturing_id ORDER BY service_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_service_by_id($service_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_service');
        $this->db->where('service_id',$service_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_service_info()
    {
        $data=array();
        $data['manufacturing_id'] = $this->input->post('manufacturing_id', true);
        $data['employee_cost'] = $this->input->post('employee_cost', true);
        $data['marketing_cost'] = $this->input->post('marketing_cost', true);
        $data['utility_cost'] = $this->input->post('utility_cost', true);
        $data['product_delivery_cost'] = $this->input->post('product_delivery_cost', true);
        $data['other_cost'] = $this->input->post('other_cost', true);
        $data['service_note'] = $this->input->post('service_note', true);
        $service_id = $this->input->post('service_id', true);
        $this->db->where('service_id',$service_id);
        $this->db->update('tbl_service',$data);
    }
    
    public function delete_service_by_id($service_id)
    {
        $this->db->where('service_id',$service_id);
        $this->db->delete('tbl_service');
    }
    
    public function save_campaign_info()
    {
        $data=array();
        $data['campaign_name'] = $this->input->post('campaign_name', true);
        $this->db->insert('tbl_campaign',$data);
    }
    
    public function select_all_campaign($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_campaign ORDER BY campaign_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_campaign_by_id($campaign_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_campaign');
        $this->db->where('campaign_id',$campaign_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_campaign_info()
    {
        $data=array();
        $data['campaign_name'] = $this->input->post('campaign_name', true);
        $campaign_id = $this->input->post('campaign_id', true);
        $this->db->where('campaign_id',$campaign_id);
        $this->db->update('tbl_campaign',$data);
    }
    
    public function delete_campaign_by_id($campaign_id)
    {
        $this->db->where('campaign_id',$campaign_id);
        $this->db->delete('tbl_campaign');
    }

    public function select_all_published_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_featured_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_status',1);
        $this->db->limit(6);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function total_campaign()
    {
        $this->db->select('*');
        $this->db->from('tbl_campaign');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_active_employee()
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('employee_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_promotion_info()
    {
        $data=array();
        $data['product_id'] = $this->input->post('product_id', true);
        $data['campaign_id'] = $this->input->post('campaign_id', true);
        $data['employee_id'] = $this->input->post('employee_id', true);
        $data['campaign_cost'] = $this->input->post('campaign_cost', true);
        $data['paid'] = $this->input->post('paid', true);
        $data['due'] = $this->input->post('due', true);
        $data['campaign_start'] = $this->input->post('campaign_start', true);
        $data['campaign_end'] = $this->input->post('campaign_end', true);
        $this->db->insert('tbl_marketing',$data);
        $expense=array();
        $marketing_id=$this->db->insert_id();
        $expense['expense_category'] = 3;
        $expense['net_expense'] = $this->input->post('campaign_cost', true);
        $expense['expense_paid_amount'] = $this->input->post('paid', true);
        $expense['expense_payable'] = $this->input->post('due', true);
        $expense['marketing_id'] = $marketing_id;
        $this->db->insert('tbl_expense',$expense);
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
    
    public function update_campaign_due()
    {
        $data=array();
        $data['campaign_due'] = $this->input->post('due', true);
        $campaign_id = $this->input->post('campaign_id', true);
        $this->db->where('campaign_id',$campaign_id);
        $this->db->update('tbl_campaign',$data);
    }

    public function save_task_info()
    {
        $data=array();
        $data['employee_id'] = $this->input->post('employee_id', true);
        $data['task_name'] = 'Campaign Manager';
        $this->db->insert('tbl_task',$data);
    }
    
    public function select_all_promotion($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_marketing AS m, tbl_campaign AS c, tbl_product AS p, tbl_employee AS e WHERE m.product_id=p.product_id AND m.campaign_id=c.campaign_id AND m.employee_id=e.employee_id ORDER BY marketing_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_promotion_by_id($marketing_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_marketing');
        $this->db->where('marketing_id',$marketing_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_promotion_info()
    {
        $data=array();
        $data['employee_id'] = $this->input->post('employee_id', true);
        $data['campaign_start'] = $this->input->post('campaign_start', true);
        $data['campaign_end'] = $this->input->post('campaign_end', true);
        $marketing_id = $this->input->post('marketing_id', true);
        $this->db->where('marketing_id',$marketing_id);
        $this->db->update('tbl_marketing',$data);
    }
    
    public function delete_promotion_by_id($marketing_id)
    {
        $this->db->where('marketing_id',$marketing_id);
        $this->db->delete('tbl_marketing');
    }
    
    public function delete_expense_by_id($marketing_id)
    {
        $this->db->where('marketing_id',$marketing_id);
        $this->db->delete('tbl_expense');
    }
    
    public function delete_task_by_id($employee_id)
    {
        $this->db->where('employee_id',$employee_id);
        $this->db->delete('tbl_task');
    }
}