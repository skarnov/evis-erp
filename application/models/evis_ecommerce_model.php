<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Ecommerce_Model extends CI_Model {

    public function save_wishlist_info($data) {
        $this->db->insert('tbl_wishlist', $data);
    }

    public function select_user_wishlist($customer_id) {
        $this->db->select('*');
        $this->db->from('tbl_wishlist');
        $this->db->where('customer_id', $customer_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_wishlist_total($customer_id) {
        $sql = "SELECT sum(price) AS total FROM tbl_wishlist WHERE customer_id='$customer_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    public function save_sale_info() {
        $data = array();
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['payment_type'] = '1';
        $data['sale_paid'] = $this->input->post('paid', true);
        $this->db->insert('tbl_sale', $data);
        $sale_id = $this->db->insert_id();
        $contents = $this->cart->contents();
        foreach ($contents as $values) {
            $sale = array();
            $sale['sale_id'] = $sale_id;
            $sale['product_id'] = $values['id'];
            $sale['sale_name'] = $values['name'];
            $sale['sale_quantity'] = $values['qty'];
            $sale['sale_unit_total'] = $values['price'];
            $sale['sale_total'] = $values['subtotal'];
            $this->db->insert('tbl_sale_details', $sale);
        }
        $sql = "update tbl_product, tbl_sale_details
                set tbl_product.product_quantity = tbl_product.product_quantity - tbl_sale_details.sale_quantity
                where tbl_product.product_id = tbl_sale_details.product_id
                and tbl_sale_details.sale_id = '$sale_id' ";
        $this->db->query($sql);
        $product_id = $sale['product_id'];
        $product_income = "SELECT * FROM tbl_product WHERE product_id='$product_id'";
        $query_result = $this->db->query($product_income);
        $result = $query_result->row();
        $product_net_price = $result->product_net_price;
        $product_selling_price = $result->product_selling_price;
        $income = array();
        $income['income_category'] = 1;
        $income['income_received_amount'] = ($product_selling_price - $product_net_price);
        $income['sale_id'] = $sale_id;
        $this->db->insert('tbl_income', $income);

        $customer = "SELECT * FROM tbl_customer WHERE customer_id='" . $data['customer_id'] . "'";
        $customer_result = $this->db->query($customer);
        $customer_info = $customer_result->row();

        foreach ($contents as $values) {            
             $saleItems .= "<tr class='item'>
                <td>
                    " . $values['name'] . "
                </td>
                
                <td>
                    " . $values['subtotal'] . "
                </td>
            </tr>";
        }

        $message = "<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Invoice</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class='invoice-box'>
        <table cellpadding='0' cellspacing='0'>
            <tr class='top'>
                <td colspan='2'>
                    <table>
                        <tr>
                            <td class='title'>
                                Evis Ecommerce
                            </td>
                            
                            <td>
                                Invoice #: " . $sale_id . "<br>
                                Due: " . date('F j, Y, g:i a') . "<br>
                                Evis Technology<br>
                                Pan Street, 32/65<br>
                                Lisbon, Portugal
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class='information'>
                <td colspan='2'>
                    <table>
                        <tr>      
                            <td>
                                " . $customer_info->customer_name . "<br>
                                " . $customer_info->customer_address . "<br>
                                " . $customer_info->customer_mobile . "<br>
                                " . $customer_info->customer_email . "
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>   
                        
            <tr class='heading'>
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
".$saleItems."
            <tr class='total'>
                <td></td>
                <td>
                   Total: " . $data['sale_paid'] . "
                </td>
            </tr>
        </table>
    </div>
</body>
</html>";

        $from_email = "evisbd@gmail.com";
        $to_email = $customer_info->customer_email;
        //Load email library
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($from_email, 'Confirmed Order');
        $this->email->to($to_email);
        $this->email->subject('Evis Ecommerce - Invoice');
        $this->email->message($message);
        //Send mail 
        $this->email->send();
        
//        $curl = curl_init();
//        curl_setopt_array($curl, array( 
//        CURLOPT_RETURNTRANSFER => 1,        
//        CURLOPT_URL => "http://sms.sslwireless.com/pushapi/dynamic/server.php?user=3DEVs&pass=123456&sid=3DEVsIT&sms=".urlencode('Congratulations! New Order Has Been Placed. Order Total - '. $data['sale_paid'].' BDT. Thank You For Shopping With Evis Ecommerce')."&msisdn=$customer_info->customer_mobile&csmsid=123456789", 
//        CURLOPT_USERAGENT => 'Sample cURL Request' ));        
//        $resp = curl_exec($curl); 
//        curl_close($curl);
//        return $resp;
        
    }

    public function save_cashbook_info() {
        $sql = "SELECT current_balance FROM tbl_cashbook ORDER BY cashbook_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result_2 = $query_result->row();
        $current_balance = $result_2->current_balance;
        $received_amount = $this->input->post('paid', true);
        $balance = ($current_balance + $received_amount);
        $sql_2 = "INSERT INTO tbl_cashbook (received_amount,current_balance) VALUES ('$received_amount','$balance') ";
        $this->db->query($sql_2);
    }

    public function save_chat_info($customer_id, $customer_message) {
        $data = array();
        $data['customer_id'] = $customer_id;
        $data['customer_message'] = str_replace('%20', ' ', $customer_message);
        $data['show_status'] = 1;
        $this->db->insert('tbl_chat', $data);
    }

    public function select_product_by_category($category_id = null, $start = null, $limit = null) {
        $sql = "SELECT * " . "FROM tbl_product p, tbl_category as c WHERE c.category_id = $category_id AND p.category_id = c.category_id ";
        if ($category_id) {
            $sql .= "AND p.category_id = $category_id ";
        }
        if ($limit != '' && $start >= 0) {
            $sql .= " LIMIT $start, $limit ";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function select_category_by_name($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_product_by_subcategory($subcategory_id = null, $start = null, $limit = null) {
        $sql = "SELECT * " . "FROM tbl_product p, tbl_subcategory as s WHERE s.subcategory_id = $subcategory_id AND p.subcategory_id = s.subcategory_id ";
        if ($subcategory_id) {
            $sql .= "AND p.subcategory_id = $subcategory_id ";
        }
        if ($limit != '' && $start >= 0) {
            $sql .= " LIMIT $start, $limit ";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function select_subcategory_by_name($subcategory_id) {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('subcategory_id', $subcategory_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

}
