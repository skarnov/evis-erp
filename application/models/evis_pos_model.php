<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Pos_Model extends CI_Model {
    
    public function select_product_by_barcode($product_barcode)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_barcode',$product_barcode);
        $this->db->where('product_quantity > 0');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_shop_by_mobile($shop_mobile)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_mobile_number',$shop_mobile);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
        
    public function save_sale_info()
    {
        $data=array();
        $data['shop_id']=$this->input->post('shop_id',true);
        $data['sale_paid']=$this->input->post('paid',true);
        $data['sale_due']=$this->input->post('due',true);
        $this->db->insert('tbl_sale',$data);
        $sale_id=$this->db->insert_id();
        $sale_data=array();
        $sale_data['shop_due'] = $data['sale_due'];
        $shop_id=$data['shop_id'];
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop',$sale_data);
        $contents=$this->cart->contents();
        foreach($contents as $values)
        {
           $sale=array();
           $sale['sale_id']=$sale_id;
           $sale['product_id']=$values['id'];
           $sale['sale_name']=$values['name'];
           $sale['sale_quantity']=$values['qty'];
           $sale['sale_unit_total']=$values['price'];
           $sale['sale_total']=$values['subtotal'];
           $this->db->insert('tbl_sale_details',$sale);
        }
        $sql = "update tbl_product, tbl_sale_details
                set tbl_product.product_quantity = tbl_product.product_quantity - tbl_sale_details.sale_quantity
                where tbl_product.product_id = tbl_sale_details.product_id
                and tbl_sale_details.sale_id = '$sale_id' ";
        $this->db->query($sql);
        $product_id=$sale['product_id'];
        $product_income = "SELECT * FROM tbl_product WHERE product_id='$product_id'";
        $query_result = $this->db->query($product_income);
        $result = $query_result->row();
        $product_net_price=$result->product_net_price;
        $product_selling_price=$result->product_selling_price;
        $income=array();
        $income['income_category']=1;
        $income['income_receivable']=$data['sale_due'];
        $income['income_received_amount']=($product_selling_price-$product_net_price);
        $income['sale_id']=$sale_id;
        $this->db->insert('tbl_income',$income);
    }
    
    public function save_cashbook_info()
    {
        $sql = "SELECT current_balance FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result_2 = $query_result->row();
        $current_balance=$result_2->current_balance;
        $received_amount = $this->input->post('paid', true);
        $balance=($current_balance+$received_amount);
        $sql_2 = "INSERT INTO tbl_cashbook (received_amount,current_balance) VALUES ('$received_amount','$balance') ";
        $this->db->query($sql_2);
    }
    
    public function select_all_sale($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_sale AS s, tbl_shop AS p WHERE s.shop_id=p.shop_id ORDER BY sale_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_sale_by_id($sale_id)
    {
        $sql = "SELECT * FROM tbl_sale AS s, tbl_sale_details AS d WHERE s.sale_id=d.sale_id AND s.sale_id='$sale_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_sale_by_id($sale_id)
    {
        $this->db->where('sale_id',$sale_id);
        $this->db->delete('tbl_sale');
    }
    
    public function delete_sale_income_by_id($sale_id)
    {
        $this->db->where('sale_id',$sale_id);
        $this->db->delete('tbl_income');
    }
    
    public function delete_sale_details_by_id($sale_id)
    {
        $sql = "DELETE FROM tbl_sale_details WHERE sale_id='$sale_id'";
        $this->db->query($sql);
    }

    public function select_all_order($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_sale AS s, tbl_customer AS c WHERE s.customer_id=c.customer_id AND shop_id IS NULL ORDER BY sale_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_order_by_id($sale_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sale');
        $this->db->where('sale_id',$sale_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function unpaid_order($sale_id)
    {
        $this->db->set('paid_status',0);
        $this->db->where('sale_id',$sale_id);
        $this->db->update('tbl_sale');
    }
    
    public function paid_order($sale_id)
    {
        $this->db->set('paid_status',1);
        $this->db->where('sale_id',$sale_id);
        $this->db->update('tbl_sale');
    }
    
    public function select_all_undelivered_sale()
    {
        $sql = "SELECT * FROM tbl_sale WHERE paid_status=0 AND shop_id IS NULL";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function save_delivery_info()
    {
        $data=array();
        $data['employee_id']=$this->input->post('employee_id',true);
        $data['sale_id']=$this->input->post('sale_id',true);
        $data['delivery_start_time']=$this->input->post('delivery_start_time',true);
        $data['delivery_end_time']=$this->input->post('delivery_end_time',true);
        $data['delivery_status']=$this->input->post('delivery_status',true);
        $this->db->insert('tbl_delivery',$data);
    }
    
    public function select_all_delivery($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_delivery AS d, tbl_employee AS e, tbl_sale AS s WHERE d.employee_id=e.employee_id AND d.sale_id=s.sale_id AND delivery_status=0 ORDER BY delivery_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_delivery_by_id($delivery_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_delivery');
        $this->db->where('delivery_id',$delivery_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_delivery_info()
    {
        $data=array();
        $data['employee_id']=$this->input->post('employee_id',true);
        $data['sale_id']=$this->input->post('sale_id',true);
        $data['delivery_start_time']=$this->input->post('delivery_start_time',true);
        $data['delivery_end_time']=$this->input->post('delivery_end_time',true);
        $data['delivery_status']=$this->input->post('delivery_status',true);
        $delivery_id = $this->input->post('delivery_id', true);
        $this->db->where('delivery_id',$delivery_id);
        $this->db->update('tbl_delivery',$data);
        if($data['delivery_status'] = '1'){
            $this->db->set('paid_status',1);
            $this->db->where('sale_id',$data['sale_id']);
            $this->db->update('tbl_sale');
        }
    }
    
    public function delete_delivery_by_id($delivery_id)
    {
        $this->db->where('delivery_id',$delivery_id);
        $this->db->delete('tbl_delivery');
    }
}