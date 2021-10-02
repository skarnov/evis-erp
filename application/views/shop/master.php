<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/chat.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/skin-green.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/bootstrap3-wysihtml5.min.css">
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>

    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>" class="logo">
                    <span class="logo-mini"><b>Evis</b></span>
                    <span class="logo-lg"><b>Evis</b> Shop</span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span><?php echo $this->session->userdata('shop_name'); ?> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header bg-light-blue">
                                        <img src="<?php echo base_url(); ?>public/logo.png" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $this->session->userdata('shop_name'); ?>
                                            <small>Member since <?php echo $this->session->userdata('shop_date_time'); ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>evis_shop_admin/logout" class="btn btn-default btn-flat">Sign out</a>
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
                        <li class="active treeview">
                            <a href="<?php echo base_url(); ?>evis_shop_admin">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <?php echo $dashboard; ?>
            <footer class="main-footer">
                <strong>Copyright &copy; 2016 <a href="http://evistechnology.com">Evis Technology</a>.</strong> All rights reserved.
            </footer>
        </div>
        <script src="<?php echo base_url(); ?>public/js/jQuery-2.1.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
            $(".chatbox"). scrollTop(100000);
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