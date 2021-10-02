<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Order
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Order</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Time</th>
                            <th>Paid</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_sale as $v_sale) {
                            ?>
                            <tr>
                                <td><?php echo $v_sale->customer_name; ?></td>
                                <td><?php echo $v_sale->time; ?></td>
                                <td><?php echo $v_sale->sale_paid; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_sale->paid_status == '1') {
                                            echo 'Paid';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_sale->paid_status == 0) {
                                            echo 'Pending';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_pos/edit_order/<?php echo $v_sale->sale_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Order"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_pos/sale_details/<?php echo $v_sale->sale_id; ?>" class="btn btn-warning" data-toggle="tooltip" title="Order Details"><i class="fa fa-shield"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_pos/delete_sale/<?php echo $v_sale->sale_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Sale" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>