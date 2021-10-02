<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Shop Transection
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_shop/manage_transaction"> Manage Shop Transection</a></li>
            <li class="active">Add New Shop Transection</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var balance = document.transaction.balance.value;
            var receive = document.transaction.receive.value;
            var shop_due = document.transaction.shop_due.value;
            document.transaction.due.value = (balance * 1) + (shop_due * 1) - (receive * 1);
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
        function shop(shopId)
        {
            if (shopId) {
                serverPage = '<?php echo base_url(); ?>evis_shop/show_shop_information/' + shopId;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('shop_information').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_shop_transaction');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_shop_transaction');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_shop/save_transaction" method="POST" name="transaction">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Shop</label>
                                        <select name="shop_id" id="shop_id" onchange="shop(this.value)" class="form-control select2" style="width: 100%;">
                                            <option value="">Select One</option>
                                            <?php
                                            foreach ($all_shop as $v_shop) {
                                                ?>
                                                <option value="<?php echo $v_shop->shop_id; ?>"><?php echo $v_shop->shop_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body" id="shop_information"></div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>