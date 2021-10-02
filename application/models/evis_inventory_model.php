<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Inventory_Model extends CI_Model {
    
    public function save_category_info()
    {
        $data=array();
        $data['category_name'] = $this->input->post('category_name', true);
        $this->db->insert('tbl_category',$data);
    }
    
    public function select_all_category($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_category ORDER BY category_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_category_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_category_info()
    {
        $data=array();
        $data['category_name'] = $this->input->post('category_name', true);
        $data['category_status'] = $this->input->post('category_status', true);
        $category_id = $this->input->post('category_id', true);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category',$data);
    }
    
    public function delete_category_by_id($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }
    
    public function save_subcategory_info()
    {
        $data=array();
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_name'] = $this->input->post('subcategory_name', true);
        $this->db->insert('tbl_subcategory',$data);
    }
    
    public function select_all_subcategory($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_subcategory AS s, tbl_category AS c WHERE s.category_id=c.category_id ORDER BY subcategory_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_subcategory_by_id($subcategory_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('subcategory_id',$subcategory_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_subcategory_info()
    {
        $data=array();
        $data['subcategory_name'] = $this->input->post('subcategory_name', true);
        $data['subcategory_status'] = $this->input->post('subcategory_status', true);
        $subcategory_id = $this->input->post('subcategory_id', true);
        $this->db->where('subcategory_id',$subcategory_id);
        $this->db->update('tbl_subcategory',$data);
    }
    
    public function delete_subcategory_by_id($subcategory_id)
    {
        $this->db->where('subcategory_id',$subcategory_id);
        $this->db->delete('tbl_subcategory');
    }
    
    public function save_manufacturer_info()
    {
        $data=array();
        $data['manufacturer_name'] = $this->input->post('manufacturer_name', true);
        $this->db->insert('tbl_manufacturer',$data);
    }
    
    public function select_all_manufacturer($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_manufacturer ORDER BY manufacturer_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_manufacturer_by_id($manufacturer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_manufacturer');
        $this->db->where('manufacturer_id',$manufacturer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_manufacturer_info()
    {
        $data=array();
        $data['manufacturer_name'] = $this->input->post('manufacturer_name', true);
        $data['manufacturer_status'] = $this->input->post('manufacturer_status', true);
        $manufacturer_id = $this->input->post('manufacturer_id', true);
        $this->db->where('manufacturer_id',$manufacturer_id);
        $this->db->update('tbl_manufacturer',$data);
    }
    
    public function delete_manufacturer_by_id($manufacturer_id)
    {
        $this->db->where('manufacturer_id',$manufacturer_id);
        $this->db->delete('tbl_manufacturer');
    }
    
    public function select_all_published_supplier()
    {
        $this->db->select('*');
        $this->db->from('tbl_supplier');
        $this->db->where('supplier_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_published_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_published_subcategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('subcategory_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_published_manufacturer()
    {
        $this->db->select('*');
        $this->db->from('tbl_manufacturer');
        $this->db->where('manufacturer_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_product_info_by_manufacturing_id($manufacturing_id)
    {
        $sql = "SELECT * FROM tbl_manufacturing AS m, tbl_service AS s WHERE m.manufacturing_id=s.manufacturing_id AND m.manufacturing_id='$manufacturing_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_product_info($data)
    {
        $this->db->insert('tbl_product',$data);
        $expense=array();
        $product_id=$this->db->insert_id();
        $expense['expense_category'] = 2;
        $expense['expense_paid_amount'] = $this->input->post('total_expenditure', true);
        $expense['product_id'] = $product_id;
        $this->db->insert('tbl_expense',$expense);
    }
    
    public function save_cashbook_info()
    {
        $sql = "SELECT current_balance FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result_2 = $query_result->row();
        $current_balance=$result_2->current_balance;
        $paid_amount = $this->input->post('total_expenditure', true);
        $balance=($current_balance-$paid_amount);
        $sql_2 = "INSERT INTO tbl_cashbook (paid_amount,current_balance) VALUES ('$paid_amount','$balance') ";
        $this->db->query($sql_2);
    }
    
    public function select_all_product($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_product AS p, tbl_category AS c WHERE p.category_id=c.category_id ORDER BY product_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_product_by_id($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id',$product_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_product_info()
    {
        $data=array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['product_barcode'] = $this->input->post('product_barcode', true);
        $data['product_sku'] = $this->input->post('product_sku', true);
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_id'] = $this->input->post('subcategory_id', true);
        $data['supplier_id'] = $this->input->post('supplier_id', true);
        $data['manufacturer_id'] = $this->input->post('manufacturer_id', true);
        $data['product_summery'] = $this->input->post('product_summery', true);
        $data['product_quantity'] = $this->input->post('product_quantity', true);
        $data['product_net_price'] = $this->input->post('total_expenditure', true);
        $data['product_selling_price'] = $this->input->post('product_selling_price', true);
        $data['product_status'] = $this->input->post('product_status', true);
        $product_id = $this->input->post('product_id', true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function delete_product_by_id($product_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->delete('tbl_product');
    }
    
    public function delete_expense_by_id($product_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->delete('tbl_expense');
    }
}