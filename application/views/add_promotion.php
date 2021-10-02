<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Promotion
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/manage_promotion"> Manage Promotion</a></li>
            <li class="active">Add New Promotion</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var campaign_cost = document.marketing.campaign_cost.value;
            var paid = document.marketing.paid.value;
            var campaign_due = document.marketing.campaign_due.value;
            document.marketing.due.value = (campaign_cost * 1) + (campaign_due * 1) - (paid * 1);
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
        function campaign(campaignId)
        {
            if (campaignId) {
                serverPage = '<?php echo base_url(); ?>evis_erp/show_campaign_information/' + campaignId;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('campaign_information').innerHTML = xmlhttp.responseText;
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
                    $msg = $this->session->userdata('save_promotion');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_promotion');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_erp/save_promotion" method="POST" name="marketing">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body" id="campaign_information"></div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Product</label>
                                    <select name="product_id" class="form-control select2" style="width: 100%;">
                                        <option value="">Select Product</option>
                                        <?php
                                        foreach ($all_product as $v_product) {
                                            ?>
                                            <option value="<?php echo $v_product->product_id; ?>"><?php echo $v_product->product_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select Campaign</label>
                                    <select name="campaign_id" id="campaign_id" onchange="campaign(this.value)" class="form-control select2" style="width: 100%;">
                                        <option value="">Select Campaign</option>
                                        <?php
                                        foreach ($all_campaign as $v_campaign) {
                                            ?>
                                            <option value="<?php echo $v_campaign->campaign_id; ?>"><?php echo $v_campaign->campaign_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Campaign Manager</label>
                                    <select name="employee_id" class="form-control select2" style="width: 100%;">
                                        <option value="">Select Employee</option>
                                        <?php
                                        foreach ($all_employee as $v_employee) {
                                            ?>
                                            <option value="<?php echo $v_employee->employee_id; ?>"><?php echo $v_employee->employee_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Campaign Start Date</label>
                                    <input type="text" name="campaign_start" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Campaign End Date</label>
                                    <input type="text" name="campaign_end" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>