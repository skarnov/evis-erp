<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/manage_product"> Manage Product</a></li>
            <li class="active">Add New Product</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var product_net_price = document.product.product_net_price.value;
            var product_service_price = document.product.product_service_price.value;
            var product_quantity = document.product.product_quantity.value;
            document.product.total_expenditure.value = ((product_net_price * 1) + (product_service_price * 1)) * (product_quantity * 1);
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
        function manufacturing(manufacturingId)
        {
            if (manufacturingId) {
                serverPage = '<?php echo base_url(); ?>evis_inventory/show_product_information/' + manufacturingId;
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
                    <form action="<?php echo base_url(); ?>evis_inventory/save_product" method="POST" name="product" enctype="multipart/form-data">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_product');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_product');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group btn-warning">
                                        <label>Search Product From Manufacturing Product</label>
                                        <select id="manufacturing_id" onchange="manufacturing(this.value)" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Manufacturing Product</option>
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
                                    <label>Barcode</label>
                                    <input type="text" name="product_barcode" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product SKU</label>
                                    <input type="text" name="product_sku" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input type="text" name="product_selling_price" class="form-control">
                                </div>
                                <span id="product_information">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Net Price</label>
                                        <input type="number" id="product_net_price" onmouseout="startCalc();" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Service Price</label>
                                        <input type="number" id="product_service_price" onmouseout="startCalc();" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="product_quantity" id="product_quantity" onmouseout="startCalc();" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Expenditure</label>
                                        <input type="number" name="total_expenditure" id="total_expenditure" onmouseout="startCalc();" class="form-control">
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Category</label>
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
                                            <option>Own Product</option>
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
                                    <label>Set Product Image</label>
                                    <input type="file" name="product_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Product Status</label>
                                        <select name="product_status" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>