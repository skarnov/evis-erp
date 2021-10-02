<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/skin-green.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/bootstrap3-wysihtml5.min.css">
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script>
            function check_delete()
            {
                var chk = confirm('Are You Want To Delete This');
                if (chk)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        </script>
    </head>

    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>" class="logo">
                    <span class="logo-mini"><b>Evis</b></span>
                    <span class="logo-lg"><b>Evis</b> ERP</span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-danger"><?php echo $new_message_count->number; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have <?php echo $new_message_count->number; ?> messages</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <?php
                                                foreach ($new_message as $v_message) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>evis_chat/start_shop_chat/<?php echo $v_message->shop_id; ?>">
                                                        <div class="pull-left">
                                                            <img src="<?php echo base_url() . $v_message->shop_image ?>" style="height:50px; width:50px;">
                                                        </div>
                                                        <h4>
                                                            <?php echo $v_message->shop_name . ' Sent A Message <br/>'; ?>
                                                        </h4>
                                                        <h5>
                                                            <?php echo ' at ' . $v_message->time ?>
                                                        </h5>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </li>
                                            <li>
                                                <?php
                                                foreach ($new_message as $v_message) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>evis_chat/start_chat/<?php echo $v_message->customer_id; ?>">
                                                        <div class="pull-left">
                                                            <img src="<?php echo base_url(); ?>public/logo.png" style="height:50px; width:50px;">
                                                        </div>
                                                        <h4>
                                                            <?php echo $v_message->customer_name . ' Sent A Message <br/>'; ?>
                                                        </h4>
                                                        <h5>
                                                            <?php echo ' at ' . $v_message->time ?>
                                                        </h5>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="<?php echo base_url(); ?>evis_chat/new_chat">See All Messages</a></li>
                                </ul>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning"><?php echo $notification_count->number; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have <?php echo $notification_count->number; ?> notifications</li>
                                    <li>
                                        <ul class="menu">
                                            <?php
                                            foreach ($all_notification as $v_notification) {
                                                ?>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>evis_app/read_notification/<?php echo $v_notification->notification_id; ?>" data-toggle="tooltip" title="Mark As Read">
                                                        <i class="fa fa-users text-aqua"></i> <?php echo $v_notification->notification_type . '<br/> at' . $v_notification->notification_time; ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="<?php echo base_url(); ?>evis_app/all_notification">View all</a></li>
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span><?php echo $this->session->userdata('admin_name'); ?> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header bg-light-blue">
                                        <img src="<?php echo base_url(); ?>public/logo.png" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $this->session->userdata('admin_name'); ?>
                                            <small>Member since <?php echo $this->session->userdata('admin_date_time'); ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>evis_app/edit_admin/<?php echo $this->session->userdata('admin_id'); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>evis_app/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="treeview <?php echo $class ?>">
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <?php
                        $admin_level = $this->session->userdata('admin_level');
                        if ($admin_level === '1') {
                            ?>
                            <li class="treeview <?php echo $admin ?> <?php echo $admin_manage ?>">
                                <a href="#">
                                    <i class="fa fa-user"></i> <span>Admin Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $admin ?>"><a href="<?php echo base_url(); ?>evis_app/add_admin"> Add Admin</a></li>
                                    <li class="<?php echo $admin_manage ?>"><a href="<?php echo base_url(); ?>evis_app/manage_admin"> Manage Admin</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        if ($admin_level === '4' || $admin_level === '1') {
                            ?>
                            <li class="treeview <?php echo $plan ?> <?php echo $plan_manage ?>">
                                <a href="#">
                                    <i class="fa fa-pencil"></i> <span>Product Planning</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $plan ?>"><a href="<?php echo base_url(); ?>evis_erp/add_product_planning"> Add New Plan</a></li>
                                    <li class="<?php echo $plan_manage ?>"><a href="<?php echo base_url(); ?>evis_erp/manage_product_planning"> Manage Plans</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $manufacturing ?> <?php echo $manufacturing_manage ?>">
                                <a href="#">
                                    <i class="fa fa-cogs"></i> <span>Manufacturing Product</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $manufacturing ?>"><a href="<?php echo base_url(); ?>evis_erp/add_manufacturing_product"> New Manufacture Item</a></li>
                                    <li class="<?php echo $manufacturing_manage ?>"><a href="<?php echo base_url(); ?>evis_erp/manage_manufacturing_product"> Manage Manufacture Items</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        if ($admin_level === '5' || $admin_level === '1') {
                            ?>
                            <li class="treeview <?php echo $service ?> <?php echo $service_manage ?>">
                                <a href="#">
                                    <i class="fa fa-bicycle"></i> <span>Service Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $service ?>"><a href="<?php echo base_url(); ?>evis_erp/add_service"> Add New Service</a></li>
                                    <li class="<?php echo $service_manage ?>"><a href="<?php echo base_url(); ?>evis_erp/manage_service"> Manage Service</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $supplier ?> <?php echo $supplier_manage ?> <?php echo $supplier_transaction ?> <?php echo $supplier_transaction_manage ?>">
                                <a href="#">
                                    <i class="fa fa-truck"></i> <span>Supplier Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $supplier ?>"><a href="<?php echo base_url(); ?>evis_supplier/add_supplier"> Add New Supplier</a></li>
                                    <li class="<?php echo $supplier_manage ?>"><a href="<?php echo base_url(); ?>evis_supplier/manage_supplier"> Manage Supplier</a></li>
                                    <li class="<?php echo $supplier_transaction ?>"><a href="<?php echo base_url(); ?>evis_supplier/add_transaction"> Add New Transaction</a></li>
                                    <li class="<?php echo $supplier_transaction_manage ?>"><a href="<?php echo base_url(); ?>evis_supplier/manage_transaction"> Manage Transaction</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $category ?> <?php echo $category_manage ?> <?php echo $subcategory ?> <?php echo $subcategory_manage ?> <?php echo $manufacturer ?> <?php echo $manufacturer_manage ?> <?php echo $product ?> <?php echo $product_manage ?>">
                                <a href="#">
                                    <i class="fa fa-bars"></i> <span>Inventory Management</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $category ?>"><a href="<?php echo base_url(); ?>evis_inventory/add_category"> Add New Category</a></li>
                                    <li class="<?php echo $subcategory ?>"><a href="<?php echo base_url(); ?>evis_inventory/add_subcategory"> Add New Subcategory</a></li>
                                    <li class="<?php echo $manufacturer ?>"><a href="<?php echo base_url(); ?>evis_inventory/add_manufacturer"> Add New Manufacturer</a></li>
                                    <li class="<?php echo $product ?>"><a href="<?php echo base_url(); ?>evis_inventory/add_product"> Add New Product</a></li>
                                    <li class="<?php echo $category_manage ?>"><a href="<?php echo base_url(); ?>evis_inventory/manage_category"> Manage Category</a></li>
                                    <li class="<?php echo $subcategory_manage ?>"><a href="<?php echo base_url(); ?>evis_inventory/manage_subcategory"> Manage Subcategory</a></li>
                                    <li class="<?php echo $manufacturer_manage ?>"><a href="<?php echo base_url(); ?>evis_inventory/manage_manufacturer"> Manage Manufacturer</a></li>
                                    <li class="<?php echo $product_manage ?>"><a href="<?php echo base_url(); ?>evis_inventory/manage_product"> Manage Product</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        if ($admin_level === '7' || $admin_level === '1') {
                            ?>
                            <li class="treeview <?php echo $campaign ?> <?php echo $campaign_manage ?> <?php echo $promotion ?> <?php echo $promotion_manage ?>">
                                <a href="#">
                                    <i class="fa fa-umbrella"></i> <span>Marketing Campaign</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $campaign ?>"><a href="<?php echo base_url(); ?>evis_erp/add_campaign"> Add New Campaign</a></li>
                                    <li class="<?php echo $campaign_manage ?>"><a href="<?php echo base_url(); ?>evis_erp/manage_campaign"> Manage Campaigns</a></li>
                                    <li class="<?php echo $promotion ?>"><a href="<?php echo base_url(); ?>evis_erp/add_promotion"> Add New Promotion</a></li>
                                    <li class="<?php echo $promotion_manage ?>"><a href="<?php echo base_url(); ?>evis_erp/manage_promotion"> Manage Promotions</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $sale ?> <?php echo $sale_manage ?> <?php echo $order_manage ?> <?php echo $delivery ?> <?php echo $delivery_manage ?>">
                                <a href="#">
                                    <i class="fa fa-barcode"></i> <span>POS System</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $sale ?>"><a href="<?php echo base_url(); ?>evis_pos/add_sale"> New Sale</a></li>
                                    <li class="<?php echo $sale_manage ?>"><a href="<?php echo base_url(); ?>evis_pos/manage_sale"> Manage Sales</a></li>
                                    <li class="<?php echo $order_manage ?>"><a href="<?php echo base_url(); ?>evis_pos/manage_order"> Order Management</a></li>
                                    <li class="<?php echo $delivery ?>"><a href="<?php echo base_url(); ?>evis_pos/add_delivery"> Add New Delivery</a></li>
                                    <li class="<?php echo $delivery_manage ?>"><a href="<?php echo base_url(); ?>evis_pos/manage_delivery"> Delivery Management</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $customer ?> <?php echo $customer_manage ?> <?php echo $customer_transaction ?>">
                                <a href="#">
                                    <i class="fa fa-male"></i> <span>Customer Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $customer ?>"><a href="<?php echo base_url(); ?>evis_app/add_customer"> Add New Customer</a></li>
                                    <li class="<?php echo $customer_manage ?>"><a href="<?php echo base_url(); ?>evis_app/manage_customer"> Manage Customer</a></li>
                                    <li class="<?php echo $customer_transaction ?>"><a href="<?php echo base_url(); ?>evis_app/manage_customer_transaction"> Manage Transaction</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        if ($admin_level === '2' || $admin_level === '1') {
                            ?>
                            <li class="treeview <?php echo $employee ?> <?php echo $employee_manage ?>">
                                <a href="#">
                                    <i class="fa fa-university"></i> <span>Employee Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $employee ?>"><a href="<?php echo base_url(); ?>evis_hrm/add_employee"> Add New Employee</a></li>
                                    <li class="<?php echo $employee_manage ?>"><a href="<?php echo base_url(); ?>evis_hrm/manage_employee"> Manage Employee</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $salary ?> <?php echo $salary_manage ?> <?php echo $search_salary ?>">
                                <a href="#">
                                    <i class="fa fa-trophy"></i> <span>Payroll Management</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $salary ?>"><a href="<?php echo base_url(); ?>evis_hrm/add_salary"> Provide New Salary</a></li>
                                    <li class="<?php echo $salary_manage ?>"><a href="<?php echo base_url(); ?>evis_hrm/manage_salary"> Manage Salary</a></li>
                                    <li class="<?php echo $search_salary ?>"><a href="<?php echo base_url(); ?>evis_hrm/search_salary"> Search Salary Sheet</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        if ($admin_level === '1' || $admin_level === '1') {
                            ?>
                            <li class="treeview <?php echo $shop ?> <?php echo $shop_manage ?> <?php echo $shop_transaction ?> <?php echo $shop_transaction_manage ?>">
                                <a href="#">
                                    <i class="fa fa-home"></i> <span>Shop Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $shop ?>"><a href="<?php echo base_url(); ?>evis_shop/add_shop"> Add New Shop</a></li>
                                    <li class="<?php echo $shop_manage ?>"><a href="<?php echo base_url(); ?>evis_shop/manage_shop"> Manage Shop</a></li>
                                    <li class="<?php echo $shop_transaction ?>"><a href="<?php echo base_url(); ?>evis_shop/add_transaction"> Add New Transaction</a></li>
                                    <li class="<?php echo $shop_transaction_manage ?>"><a href="<?php echo base_url(); ?>evis_shop/manage_transaction"> Manage Transaction</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        if ($admin_level === '6' || $admin_level === '1') {
                            ?>
                            <li class="treeview <?php echo $chat ?>">
                                <a href="<?php echo base_url(); ?>evis_chat/new_chat">
                                    <i class="fa fa-envelope-o"></i> <span>Communication</span>
                                </a>
                            </li>
                            <?php
                        }
                        if ($admin_level === '3' || $admin_level === '1') {
                            ?>
                            <li class="treeview <?php echo $search_cashbook ?> <?php echo $cashbook_manage ?>">
                                <a href="#">
                                    <i class="fa fa-calculator"></i> <span>Cashbook</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $search_cashbook ?>"><a href="<?php echo base_url(); ?>evis_app/search_cashbook"> Search Cashbook</a></li>
                                    <li class="<?php echo $cashbook_manage ?>"><a href="<?php echo base_url(); ?>evis_app/manage_cashbook"> Manage Cashbook</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $income ?> <?php echo $income_manage ?> <?php echo $income_category ?> <?php echo $income_category_manage ?>">
                                <a href="#">
                                    <i class="fa fa-arrow-down"></i> <span>Income Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $income ?>"><a href="<?php echo base_url(); ?>evis_app/add_income"> Add New Income</a></li>
                                    <li class="<?php echo $income_manage ?>"><a href="<?php echo base_url(); ?>evis_app/manage_income"> Manage Income</a></li>
                                    <li class="<?php echo $income_category ?>"><a href="<?php echo base_url(); ?>evis_app/add_income_category"> Add New Income Category</a></li>
                                    <li class="<?php echo $income_category_manage ?>"><a href="<?php echo base_url(); ?>evis_app/manage_income_category"> Manage Income Category</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $expense ?> <?php echo $expense_manage ?> <?php echo $expense_category ?> <?php echo $expense_category_manage ?>">
                                <a href="#">
                                    <i class="fa fa-arrow-up"></i> <span>Expense Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $expense ?>"><a href="<?php echo base_url(); ?>evis_app/add_expense"> Add New Expense</a></li>
                                    <li class="<?php echo $expense_manage ?>"><a href="<?php echo base_url(); ?>evis_app/manage_expense"> Manage Expense</a></li>
                                    <li class="<?php echo $expense_category ?>"><a href="<?php echo base_url(); ?>evis_app/add_expense_category"> Add New Expense Category</a></li>
                                    <li class="<?php echo $expense_category_manage ?>"><a href="<?php echo base_url(); ?>evis_app/manage_expense_category"> Manage Expense Category</a></li>
                                </ul>
                            </li>
                            <li class="treeview <?php echo $income_report ?> <?php echo $expense_report ?> <?php echo $total_report ?>">
                                <a href="#">
                                    <i class="fa fa-renren"></i> <span>Income Expense Report</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $income_report ?>"><a href="<?php echo base_url(); ?>evis_app/income_report"> Income Report</a></li>
                                    <li class="<?php echo $expense_report ?>"><a href="<?php echo base_url(); ?>evis_app/expense_report"> Expense Report</a></li>
                                    <li class="<?php echo $total_report ?>"><a href="<?php echo base_url(); ?>evis_app/total_report"> Total Report</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </aside>
            <?php echo $dashboard; ?>
            <footer class="main-footer">
                <strong>Copyright &copy; 2016 - <?php echo date ('Y')?> <a href="http://evistechnology.com">Evis Technology</a>.</strong> All rights reserved.
            </footer>
        </div>
        <script src="<?php echo base_url(); ?>public/js/jQuery-2.1.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
            $(".chatbox").scrollTop(100000);
        </script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery.knob.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/fastclick.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/app.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/dashboard.js"></script>
    </body>
</html>