<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Evis Ecommerce</title>
        <link href="<?php echo base_url(); ?>public/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/chat.css">
        <link href="<?php echo base_url(); ?>public/css/ecommerce_prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/css/ecommerce_animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/ecommerce.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/ecommerce_responsive.css" rel="stylesheet">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>

    <body>
        <header id="header">
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +88 01719 02 02 78</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@evistechnology.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="logo pull-left">
                                <a href="<?php echo base_url(); ?>evis_ecommerce"><img src="<?php echo base_url(); ?>public/logo.png" alt="evis technology" style="height: 45px;" /></a>
                            </div>
                        </div>
                        <div class="col-sm-3 pull-left">
                            <p style="font-size: 27px; margin-top: 6px; color: #8DC63F;">Evis Ecommerce</p>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php
                                    $customer_id = $this->session->userdata('customer_id');
                                    $customer_name = $this->session->userdata('customer_name');
                                    if (!$customer_id) {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>evis_ecommerce/login"><i class="fa fa-lock"></i> Login</a></li>
                                        <li><a href="<?php echo base_url(); ?>evis_ecommerce/register"><i class="fa fa-male"></i> Register</a></li>
                                        <li><a href="<?php echo base_url(); ?>evis_ecommerce/login"><i class="fa fa-star"></i> Wishlist</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>evis_ecommerce/logout"><i class="fa fa-lock"></i> Logout</a></li>
                                        <li><a href="<?php echo base_url(); ?>evis_ecommerce/dashboard"><i class="fa fa-male"></i> <i>Welcome!</i> <?php echo $customer_name; ?></a></li>
                                        <li><a href="<?php echo base_url(); ?>evis_ecommerce/wishlist/<?php echo $this->session->userdata('customer_id');?>"><i class="fa fa-star"></i> Wishlist</a></li>
                                        <?php
                                    }
                                    ?>
                                    <li><a href="<?php echo base_url(); ?>evis_ecommerce/show_cart"><i class="fa fa-shopping-cart"></i> Shopping Cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="<?php echo base_url(); ?>evis_ecommerce" class="active">Home</a></li>
                                    <?php
                                    foreach ($all_category as $v_category) {
                                        ?>
                                        <li class="dropdown"><a href="<?php echo base_url(); ?>evis_ecommerce/category_product_listing/<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?><i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <?php
                                                foreach ($all_subcategory as $v_subcategory) {
                                                    if ($v_subcategory->category_id == $v_category->category_id && $v_subcategory->subcategory_status == '1') {
                                                        ?>
                                                        <li><a href="<?php echo base_url(); ?>evis_ecommerce/subcategory_product_listing/<?php echo $v_subcategory->subcategory_id; ?>"><?php echo $v_subcategory->subcategory_name; ?></a></li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li> 
                                        <?php
                                    }
                                    ?>
                                    <li><a href="<?php echo base_url(); ?>evis_ecommerce/about">About</a></li>
                                    <li><a href="<?php echo base_url(); ?>evis_ecommerce/contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php echo $home; ?>
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <h2><span>Evis</span> Ecommerce</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="images/home/iframe1.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="images/home/iframe2.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="images/home/iframe3.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="images/home/iframe4.png" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="images/home/map.png" alt="" />
                                <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Online Help</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Change Location</a></li>
                                    <li><a href="#">FAQ’s</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Quock Shop</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">T-Shirt</a></li>
                                    <li><a href="#">Mens</a></li>
                                    <li><a href="#">Womens</a></li>
                                    <li><a href="#">Gift Cards</a></li>
                                    <li><a href="#">Shoes</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privecy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Billing System</a></li>
                                    <li><a href="#">Ticket System</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Company Information</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Store Location</a></li>
                                    <li><a href="#">Affillate Program</a></li>
                                    <li><a href="#">Copyright</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2016 Evis Ecommerce. All rights reserved.</p>
                    </div>
                </div>
            </div>

        </footer>

        <!-- Cart Success-->
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Success!</h3>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">Continue Shopping</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Cart Success-->
        <!-- Wishlist Success-->
        <div class="modal fade" id="Wishlist" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Wishlist</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Success!</h3>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">Continue Shopping</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Wishlist Success-->
        <!-- Wishlist Failed-->
        <div class="modal fade" id="WishlistFailed" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Wishlist</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Please login for adding wishlist!</h3>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-primary">Continue Shopping</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Wishlist Success-->
        <script type="text/javascript">    
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                    xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
                xmlhttp = new XMLHttpRequest();
            }
            function addToCart(productId)
            {
                quantity = document.getElementById('product_buy_quantity' + productId).value;
                if (productId) {
                    serverPage = '<?php echo base_url(); ?>evis_ecommerce/add_to_cart/' + productId + '/' + quantity;
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.send(null);
                }
            }
            function addToWishlist(productId)
            {
                customer_id = document.getElementById('customer_id').value;


                if (productId) {
                    serverPage = '<?php echo base_url(); ?>evis_ecommerce/add_to_wishlist/' + productId + '/' + customer_id;
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.send(null);
                }
            }
            function deleteProduct(rowId)
            {
                if (rowId) {
                    serverPage = '<?php echo base_url(); ?>evis_ecommerce/remove/' + rowId;
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.send(null);

                }
            }
        </script>
        <script src="<?php echo base_url(); ?>public/js/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>public/js/ecommerce_jquery.scrollUp.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/ecommerce_jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url(); ?>public/js/ecommerce.js"></script>
        <script>
            setInterval(function () {
                chat();
            }, 1000 * 60 * .1);
            $(".chatbox"). scrollTop(100000);
        </script>
    </body>
</html>