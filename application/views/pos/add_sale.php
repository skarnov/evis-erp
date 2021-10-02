<div class="content-wrapper">
    <section class="content-header">
        <h1>
            New Sale
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_pos/manage_sale"> Manage Sale</a></li>
            <li class="active">New Sale</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var total = document.cart.total.value;
            var sale_due = document.cart.sale_due.value;
            var due = (total * 1) + (sale_due * 1);
            var shop_paid = document.cart.shop_paid.value;
            document.cart.pos_due.value =(due * 1) - (shop_paid * 1);
        }
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        function productBarcode(productBarcode)
        {
            if (productBarcode) {
                serverPage = '<?php echo base_url(); ?>evis_pos/add_to_cart/' + productBarcode;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('product_information').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
        function deleteProduct(rowId)
        {
            if (rowId) {
                serverPage = '<?php echo base_url(); ?>evis_pos/remove/' + rowId;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('product_information').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
        function destroyCart()
        {
            serverPage = '<?php echo base_url(); ?>evis_pos/destroy/';
            xmlhttp.open("GET", serverPage);
            xmlhttp.onreadystatechange = function ()
            {
                document.getElementById('product_information').innerHTML = xmlhttp.responseText;
            };
            xmlhttp.send(null);
        }
        function shopInfo(shopMobile)
        {            
            if (shopMobile) {
                serverPage = '<?php echo base_url(); ?>evis_pos/shop_mobile/' + shopMobile;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('product_information').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <h3 style="color:green">
                        <?php
                        $msg = $this->session->userdata('save_sale');
                        if (isset($msg)) {
                            echo "<p style='margin-left:2%;'>$msg</p>";
                            $this->session->unset_userdata('save_sale');
                        }
                        ?>
                    </h3>
                    <div class="col-xs-9">
                        <div class="box-body" id="product_information"></div>
                    </div>
                    <div class="col-xs-3">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" id="product_barcode" onChange="productBarcode(this.value)" class="form-control" placeholder="Scan Product Barcode">
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger">Sale More</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </section>
</div>