<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/manage_product"> Manage Product</a></li>
            <li class="active">Edit Product</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var current = document.product.current.value;
            var product_quantity = document.product.product_quantity.value;
            document.product.total_expenditure.value = (current * 1) * (product_quantity * 1);
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_inventory/update_product" method="POST" name="product">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" value="<?php echo $product_info->product_name; ?>" class="form-control">
                                    <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Barcode</label>
                                    <input type="text" name="product_barcode" value="<?php echo $product_info->product_barcode; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product SKU</label>
                                    <input type="text" name="product_sku" value="<?php echo $product_info->product_sku; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="product_quantity" id="product_quantity" value="<?php echo $product_info->product_quantity; ?>" onmouseout="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Current Net Price</label>
                                    <input type="number" name="product_net_price" id="current" value="<?php echo $product_info->product_net_price; ?>" onmouseout="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Total Expenditure</label>
                                    <input type="number" name="total_expenditure" id="total_expenditure" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input type="text" name="product_selling_price" value="<?php echo $product_info->product_selling_price; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <select name="category_id" class="form-control select2" style="width: 100%;">
                                            <?php
                                            foreach ($all_category as $v_category) {
                                                ?>
                                                <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Subcategory</label>
                                        <select name="subcategory_id" class="form-control select2" style="width: 100%;">
                                            <?php
                                            foreach ($all_subcategory as $v_subcategory) {
                                                ?>
                                                <option value="<?php echo $v_subcategory->subcategory_id; ?>"><?php echo $v_subcategory->subcategory_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Supplier</label>
                                        <select name="supplier_id" class="form-control select2" style="width: 100%;">
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
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Manufacture</label>
                                        <select name="manufacturer_id" class="form-control select2" style="width: 100%;">
                                            <?php
                                            foreach ($all_manufacturer as $v_manufacturer) {
                                                ?>
                                                <option value="<?php echo $v_manufacturer->manufacturer_id; ?>"><?php echo $v_manufacturer->manufacturer_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div><br/>
                                <div class="form-group">
                                    <label>Product Summery</label>
                                    <textarea name="product_summery" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Product Status</label>
                                        <select name="product_status" class="form-control select2" style="width: 100%;">
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['product'].elements['category_id'].value = '<?php echo $product_info->category_id; ?>';
    document.forms['product'].elements['subcategory_id'].value = '<?php echo $product_info->subcategory_id; ?>';
    document.forms['product'].elements['supplier_id'].value = '<?php echo $product_info->supplier_id; ?>';
    document.forms['product'].elements['manufacturer_id'].value = '<?php echo $product_info->manufacturer_id; ?>';
    document.forms['product'].elements['product_status'].value = '<?php echo $product_info->product_status; ?>';
</script>