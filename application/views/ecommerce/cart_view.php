<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <div class="brands_products">
                        <h2>Categories</h2>
                        <div class="brands-name">
                            <?php
                            foreach ($all_subcategory as $v_subcategory) {
                                ?>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="<?php echo base_url(); ?>evis_ecommerce/subcategory_product_listing/<?php echo $v_subcategory->subcategory_id; ?>"> <?php echo $v_subcategory->subcategory_name; ?></a></li>
                                </ul>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
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
                                <div class="col-xs-1">
                                    <h5 class="product-name"><strong>Image</strong></h5>
                                </div>
                                <div class="col-xs-4">
                                    <h5 class="product-name"><strong>Name</strong></h5>
                                </div>
                                <div class="col-xs-2">
                                    <h5 class="product-name"><strong>Quantity</strong></h5>
                                </div>
                                <div class="col-xs-2">
                                    <h5 class="product-name"><strong>Unit Total</strong></h5>
                                </div>
                                <div class="col-xs-2">
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
                                    <div class="col-xs-1">
                                        <img src="<?php echo base_url() . $v_contents['image']; ?>" style="height:50px; width:50px;"/>
                                    </div>
                                    <div class="col-xs-4">
                                        <p><?php echo $v_contents['name']; ?></p>
                                    </div>
                                    <div class="col-xs-2">
                                        <p><?php echo $v_contents['qty']; ?></p>
                                    </div>
                                    <div class="col-xs-2">
                                        <p><?php echo $v_contents['price']; ?></p>
                                    </div>
                                    <div class="col-xs-2">
                                        <p><?php echo $v_contents['subtotal']; ?></p>
                                    </div>
                                    <div class="col-xs-1">
                                        <button class="btn btn-danger" value="<?php echo $v_contents['rowid']; ?>" onclick="deleteProduct(this.value)">X</button>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                        </div>
                        <form action="<?php echo base_url(); ?>evis_ecommerce/create_order" method="POST" name="cart">
                            <div class="panel-footer">
                                <div class="row text-center">
                                    <div class="col-xs-9">
                                        <h4 class="text-right">Grand Total</h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class="text-right"> <?php echo $this->cart->total(); ?></h4>
                                        <input type="hidden" name="paid" value="<?php echo $this->cart->total(); ?>"/>
                                        <input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('customer_id'); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row text-center">
                                    <div class="col-xs-3">
                                        <button type="submit" class="btn btn-danger btn-block">
                                            Destroy Cart
                                        </button>
                                    </div>
                                    <?php
                                    $customer_id = $this->session->userdata('customer_id');
                                    $customer_name = $this->session->userdata('customer_name');
                                    if (!$customer_id) {
                                        ?>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-xs-3 pull-right">
                                                    <a href="<?php echo base_url(); ?>evis_ecommerce/login" class="btn btn-success ">Please Login</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-xs-3 pull-right">
                                                    <button class="btn btn-success " type="submit">Checkout</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else {
                        ?>
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_sale');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_sale');
                            }
                            ?>
                        </h3>
                        <h2 style='margin-left:2%;'>Cart Empty</h2>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>