<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Service
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/manage_service">Manage Service</a></li>
            <li class="active">Edit Service</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var employee_cost = document.service.employee_cost.value;
            var marketing_cost = document.service.marketing_cost.value;
            var utility_cost = document.service.utility_cost.value;
            var other_cost = document.service.other_cost.value;
            var product_delivery_cost = document.service.product_delivery_cost.value;
            document.service.total_cost.value = (employee_cost * 1) + (marketing_cost * 1) + (utility_cost * 1) + (other_cost * 1) + (product_delivery_cost * 1);
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>evis_erp/update_service" method="POST" name="service">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Product</label>
                                        <select name="manufacturing_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Product</option>
                                            <?php
                                            foreach ($all_manufacturing_product as $v_manufacturing) {
                                                ?>
                                                <option value="<?php echo $v_manufacturing->manufacturing_id; ?>"><?php echo $v_manufacturing->product_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Employee Cost</label>
                                    <input type="number" name="employee_cost" value="<?php echo $service_info->employee_cost ;?>" id="employee_cost" onmouseout="startCalc();" class="form-control">
                                    <input type="hidden" name="service_id" value="<?php echo $service_info->service_id ;?>">
                                </div>
                                <div class="form-group">
                                    <label>Marketing Cost</label>
                                    <input type="number" name="marketing_cost" value="<?php echo $service_info->marketing_cost ;?>" id="marketing_cost" onChange="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Utility Cost</label>
                                    <input type="number" name="utility_cost" value="<?php echo $service_info->utility_cost ;?>" id="utility_cost" onmouseout="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Other Cost</label>
                                    <input type="number" name="other_cost" value="<?php echo $service_info->other_cost ;?>" id="other_cost" onmouseout="startCalc();" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Product Delivery Cost</label>
                                    <input type="number" name="product_delivery_cost" value="<?php echo $service_info->product_delivery_cost ;?>" id="product_delivery_cost" onmouseout="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Total Cost</label>
                                    <input type="text" id="total_cost" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea name="service_note" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $service_info->service_note ;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['service'].elements['manufacturing_id'].value = '<?php echo $service_info->manufacturing_id; ?>';
</script>