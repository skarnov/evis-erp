<div class="panel panel-info" style="box-shadow: 0px 0px 19px 4px black;">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-6">
                    <h5>Shopping Cart</h5>
                </div>
            </div>
        </div>
    </div>
    <?php
    $contents = $this->cart->contents();
    if ($contents == !NULL) {
        ?>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4">
                    <h5 class="product-name"><strong>Name</strong></h5>
                </div>
                <div class="col-xs-2">
                    <h5 class="product-name"><strong>Quantity</strong></h5>
                </div>
                <div class="col-xs-2">
                    <h5 class="product-name"><strong>Unit Total</strong></h5>
                </div>
                <div class="col-xs-3">
                    <h5 class="product-name"><strong>Price Total</strong></h5>
                </div>
                <div class="col-xs-1">
                    <h5 class="product-name" style="color:red;"><strong>Del</strong></h5>
                </div>
            </div>
            <hr>
            <?php
            $contents = $this->cart->contents();
            foreach ($contents as $v_contents) {
                ?>
                <div class="row" >
                    <div class="col-xs-4">
                        <p><?php echo $v_contents['name']; ?></p>
                    </div>
                    <div class="col-xs-2">
                        <p><?php echo $v_contents['qty']; ?></p>
                    </div>
                    <div class="col-xs-2">
                        <p><?php echo $v_contents['price']; ?></p>
                    </div>
                    <div class="col-xs-3">
                        <p><?php echo $v_contents['subtotal']; ?></p>
                    </div>
                    <div class="col-xs-1">
                        <button class="btn btn-danger" value="<?php echo $v_contents['rowid']; ?>" onclick="deleteProduct(this.value)">X</button>
                    </div>
                </div>
                <hr>
            <?php } ?>
        </div>
        <form action="<?php echo base_url(); ?>evis_pos/save_sale" method="POST" name="cart">
            <div class="panel-footer">
                <div class="row text-center">
                    <div class="col-xs-9">
                        <h4 class="text-right">Grand Total</h4>
                    </div>
                    <div class="col-xs-3">
                        <input type="number" id="total" onmouseout="startCalc();" onmouseout="calc();" value="<?php echo $this->cart->total(); ?>" class="form-control"/>
                    </div>
                </div>
            </div>
            <?php if ($shop_info == NULL) { ?>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Enter Shop Mobile Number</h4>
                        </div>
                        <div class="col-xs-3">
                            <input type="text" id="shop_mobile_number" onblur="shopInfo(this.value)" class="form-control"/>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($shop_info == !NULL) { ?>
            <div class="panel-footer" style="color:red;">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Shop Due Amount </h4>
                            <p>Shop Name: <?php echo $shop_info->shop_name;?></p>
                            <p>Shop Email: <?php echo $shop_info->shop_email;?></p>
                            <p>Mobile Number: <?php echo $shop_info->shop_mobile_number;?></p>
                            <p>Shop Address: <?php echo $shop_info->shop_address;?></p>
                        </div>
                        <div class="col-xs-3">
                            <input type="number" id="sale_due" onmouseout="startCalc();" value="<?php echo $shop_info->shop_due; ?>" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right"><?php echo $shop_info->shop_name; ?> Paid Amount </h4>
                        </div>
                        <div class="col-xs-3">
                            <input type="hidden" name="shop_id" value="<?php echo $shop_info->shop_id; ?>"/>
                            <input type="number" name="paid" id="shop_paid" onmouseout="startCalc();"  class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right"><?php echo $shop_info->shop_name; ?> Total Due </h4>
                        </div>
                        <div class="col-xs-3">
                            <input type="number" name="due" id="pos_due" class="form-control"/>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="panel-footer">
                <div class="row text-center">
                    <div class="col-xs-3">
                        <button type="submit" class="btn btn-success btn-block">
                            Done
                        </button>
                    </div>
                    <div class="col-xs-3 col-xs-offset-6">
                        <button class="btn btn-danger" type="button" onclick="destroyCart()">Destroy Cart</button>
                    </div>
                </div>
            </div>
        </form>
        <?php
    } else {
        ?>
        <h2 style='margin-left:2%;'>Not Found</h2>
        <?php
    }
    ?>
</div>