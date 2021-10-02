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
                <h3 class="dark-grey">Payment Option</h3><hr/>
                <div class="shopper-informations">
                    <form action="<?php echo base_url(); ?>evis_ecommerce/save_sale" method="POST">
                        <input type="hidden" name="paid" value="<?php echo $this->cart->total(); ?>"/>
                        <input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('customer_id'); ?>"/>
                        <div class="radio">
                            <label><input type="radio" name="payment_option" value="cash" checked>Cash on Delivery</label>
                        </div>
                        <button class="btn btn-success" type="submit">Proceed To Checkout</button>
                    </form>	
                </div>
            </div>
        </div>
    </div>
</section>