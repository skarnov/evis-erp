<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Sale Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_pos/manage_order">Manage Order</a></li>
            <li class="active">Sale Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Paid Amount</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $order_info->time; ?></td>
                            <td><?php echo $order_info->sale_paid; ?></td>
                            <td>
                                <span class="btn-success">
                                    <?php
                                    if ($order_info->paid_status == '1') {
                                        echo 'Paid';
                                    }
                                    ?> 
                                </span>
                                <span class="btn-danger">
                                    <?php
                                    if ($order_info->paid_status == 0) {
                                        echo 'Pending';
                                    }
                                    ?>   
                                </span>
                            </td>
                            <td>
                                <?php
                                if ($order_info->paid_status == '1') {
                                    ?>
                                    <a href="<?php echo base_url(); ?>evis_pos/unpaid_order/<?php echo $order_info->sale_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Unpaid"><i class="fa fa-remove"></i></a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url(); ?>evis_pos/paid_order/<?php echo $order_info->sale_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Paid"><i class="fa fa-check"></i></a>
                                        <?php
                                    }
                                    ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>