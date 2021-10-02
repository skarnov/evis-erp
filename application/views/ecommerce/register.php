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
                <div class="row signup-form">
                    <h3 style="color:green">
                        <?php
                        $msg = $this->session->userdata('save_customer');
                        if (isset($msg)) {
                            echo $msg;
                            $this->session->unset_userdata('save_customer');
                        }
                        ?>
                    </h3>
                    <form action="<?php echo base_url(); ?>evis_ecommerce/save_customer" method="POST">
                        <h3 class="dark-grey">Register With Evis</h3><hr/>
                        <div class="form-group col-xs-11">
                            <label>Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name">
                        </div>
                        <div class="form-group col-xs-11">
                            <label>Email</label>
                            <input type="email" name="customer_email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group col-xs-11">
                            <label>Customer Password</label>
                            <input type="password" name="customer_password" class="form-control" placeholder="Your Chosen Password">
                        </div>
                        <div class="form-group col-xs-11">
                            <label>Conform Password</label>
                            <input type="password" name="conform_password" class="form-control" placeholder="Conform Your Password">
                        </div>
                        <div class="form-group col-xs-11">
                            <label>Mobile</label>
                            <input type="number" name="customer_mobile" class="form-control" placeholder="Enter Customer Mobile">
                        </div>
                        <div class="form-group col-xs-11">
                            <label>Address</label>
                            <textarea class="form-control" name="customer_address"></textarea>
                        </div>
                        <div class="form-group col-xs-11">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>