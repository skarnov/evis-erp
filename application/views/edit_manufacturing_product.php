<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Manufacturing
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/manage_manufacturing_product">Manage Product Manufacturing</a></li>
            <li class="active">Edit Manufacturing</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var cost_per_product = document.manufacturing.cost_per_product.value;
            var estimate_profit_per_product = document.manufacturing.estimate_profit_per_product.value;
            var quantity = document.manufacturing.quantity.value;
            document.manufacturing.total_cost.value = (cost_per_product * 1) * (quantity * 1);
            document.manufacturing.estimate_total_profit.value = (estimate_profit_per_product * 1) * (quantity * 1);
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url();?>evis_erp/update_manufacturing" method="POST" name="manufacturing">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" value="<?php echo $manufacturing_info->product_name ;?>" class="form-control">
                                    <input type="hidden" name="manufacturing_id" value="<?php echo $manufacturing_info->manufacturing_id ;?>">
                                </div>
                                <div class="form-group">
                                    <label>Cost Per Product</label>
                                    <input type="number" name="cost_per_product" value="<?php echo $manufacturing_info->cost_per_product ;?>" id="cost_per_product" onmouseout="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Estimate Profit Per Product</label>
                                    <input type="number" name="estimate_profit_per_product" value="<?php echo $manufacturing_info->estimate_profit_per_product ;?>" id="estimate_profit_per_product" onmouseout="startCalc();" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" value="<?php echo $manufacturing_info->quantity ;?>" id="quantity" onmouseout="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Total Cost</label>
                                    <input type="text" id="total_cost" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Estimate Total Profit</label>
                                    <input type="text" id="estimate_total_profit" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea name="manufacturing_note" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $manufacturing_info->manufacturing_note ;?></textarea>
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