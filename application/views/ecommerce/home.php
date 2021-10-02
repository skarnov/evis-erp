<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Evis</span> Ecommerce</h1>
                                <h2>Home of Gadgets</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url(); ?>img/slider/nokia.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Evis</span> Ecommerce</h1>
                                <h2>Home of Gadgets</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url(); ?>img/slider/iphone.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Evis</span> Ecommerce</h1>
                                <h2>Home of Gadgets</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="<?php echo base_url(); ?>img/slider/sony.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
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
                <div class="features_items">
                    <h2 class="title text-center">Features Items</h2>
                    <?php
                    foreach ($all_product as $v_product) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo base_url() . $v_product->product_image; ?>" alt="" style="height:320px" />
                                        <h2>Tk. <?php echo $v_product->product_selling_price; ?></h2>
                                        <p><?php echo $v_product->product_name; ?></p>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>Tk. <?php echo $v_product->product_selling_price; ?></h2>
                                            <p><?php echo $v_product->product_summery; ?></p>
                                            <input type="number" value="1" name="qty" id="product_buy_quantity<?php echo $v_product->product_id; ?>" class="btn btn-default"  style="width: 25%; margin-right: 3px; position: relative; top: -12px;" />
                                            <input type="hidden" value="<?php echo $this->session->userdata('customer_id'); ?>" id="customer_id" />
                                            <input type="hidden" name="product_id" value="<?php echo $v_product->product_id; ?>"/> 
                                            <buttton data-toggle="modal" data-target="#smallModal" class="btn btn-default add-to-cart" onclick="addToCart(<?php echo $v_product->product_id; ?>);"><i class="fa fa-shopping-cart"></i>Add to cart</buttton>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#" data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_product->product_id; ?>);"><i class="fa fa-plus-square"></i>Add to cart</a></li>
                                        <?php
                                        $customer_id = $this->session->userdata('customer_id');
                                        $customer_name = $this->session->userdata('customer_name');
                                        if (!$customer_id) {
                                            ?>
                                            <li><a href="#" data-toggle="modal" data-target="#WishlistFailed"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li><a href="#" data-toggle="modal" data-target="#Wishlist" onclick="addToWishlist(<?php echo $v_product->product_id; ?>);"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>