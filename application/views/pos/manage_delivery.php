<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Delivery
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Delivery</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <br/>
                <a href="<?php echo base_url(); ?>evis_pos/add_delivery" class="btn btn-danger" title="Add Delivery Task">Add Delivery Task</a>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Sale Amount</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Delivery Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_delivery as $v_delivery) {
                            ?>
                            <tr>
                                <td><?php echo $v_delivery->employee_name; ?></td>
                                <td><?php echo $v_delivery->sale_paid; ?></td>
                                <td><?php echo $v_delivery->delivery_start_time; ?></td>
                                <td><?php echo $v_delivery->delivery_end_time; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_delivery->delivery_status == '1') {
                                            echo 'Delivered';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_delivery->delivery_status == 0) {
                                            echo 'Undelivered';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_pos/edit_delivery/<?php echo $v_delivery->delivery_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Delivery"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_pos/delete_delivery/<?php echo $v_delivery->delivery_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Delivery" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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