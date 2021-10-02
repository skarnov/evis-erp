<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Supplier Transection
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_supplier/manage_transaction"> Manage Supplier Transection</a></li>
            <li class="active">Add New Supplier Transection</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var balance = document.transaction.balance.value;
            var paid = document.transaction.paid.value;
            var supplier_due = document.transaction.supplier_due.value;
            document.transaction.due.value = (balance * 1) + (supplier_due * 1) - (paid * 1);
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
        function supplier(supplierId)
        {
            if (supplierId) {
                serverPage = '<?php echo base_url(); ?>evis_supplier/show_supplier_information/' + supplierId;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('supplier_information').innerHTML = xmlhttp.responseText;
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
                    $msg = $this->session->userdata('save_supplier_transaction');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_supplier_transaction');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_supplier/save_transaction" method="POST" name="transaction">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Supplier</label>
                                        <select name="supplier_id" id="supplier_id" onchange="supplier(this.value)" class="form-control select2" style="width: 100%;">
                                            <option value="">Select One</option>
                                            <?php
                                            foreach ($all_supplier as $v_supplier) {
                                                ?>
                                                <option value="<?php echo $v_supplier->supplier_id; ?>"><?php echo $v_supplier->supplier_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body" id="supplier_information"></div>
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