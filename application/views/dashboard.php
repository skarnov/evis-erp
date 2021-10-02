<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <?php
    $admin_level = $this->session->userdata('admin_level');
    if ($admin_level === '1') {
        ?>
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <p><?php echo $all_stock->stock; ?></p>
                            <p>Current Stock Amount</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>evis_inventory/manage_product" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <p><?php echo $shop_due->due; ?></p>
                            <p>Total Shop Due</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>evis_shop/manage_transaction" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <p><?php echo $income_amount->income; ?></p>
                            <p>Total Income</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>evis_app/manage_income" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <p><?php echo $current_balance->current_balance ?></p>
                            <p>Total Paid</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>evis_app/manage_cashbook" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-exchange"></i> Task Manager
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="span5">
                                    <table class="table table-striped table-condensed">
                                        <thead>
                                        <th>Employee Name</th>
                                        <th>Task Name</th>
                                        <th>Start Time</th>
                                        </thead>   
                                        <tbody>
                                            <?php
                                            foreach ($all_task as $v_task) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $v_task->employee_name; ?></td>
                                                    <td><?php echo $v_task->task_name; ?></td>
                                                    <td><?php echo $v_task->task_start_time; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>                                   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-exchange"></i> Pending Delivery
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="span5">
                                    <table class="table table-striped table-condensed">
                                        <thead>
                                        <th>Employee Name</th>
                                        <th>Sale ID</th>
                                        <th>Sale Amount</th>
                                        </thead>   
                                        <tbody>
                                            <?php
                                            foreach ($all_delivery as $v_delivery) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $v_delivery->employee_name; ?></td>
                                                    <td><?php echo $v_delivery->sale_id; ?></td>
                                                    <td><?php echo $v_delivery->sale_paid; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>                                   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</div>