<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Product Service
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/add_service">Add New Service</a></li>
            <li class="active">Manage Service</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_service');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_service');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Employee Cost</th>
                            <th>Utility Cost</th>
                            <th>Other Cost</th>
                            <th>Product Delivery Cost</th>
                            <th>Total Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_service as $v_service) {
                            ?>
                            <tr>
                                <td><?php echo $v_service->product_name; ?></td>
                                <td><?php echo $v_service->employee_cost; ?></td>
                                <td><?php echo $v_service->utility_cost; ?></td>
                                <td><?php echo $v_service->product_delivery_cost; ?></td>
                                <td><?php echo $v_service->other_cost; ?></td>
                                <td>
                                    <?php 
                                        $quantity=$v_service->employee_cost; 
                                        $cost_per_product=$v_service->utility_cost;
                                        $product_delivery_cost=$v_service->product_delivery_cost;
                                        $other_cost=$v_service->other_cost;
                                        echo $total_cost=$quantity+$cost_per_product+$product_delivery_cost+$other_cost;
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_erp/edit_service/<?php echo $v_service->service_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Service"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_erp/delete_service/<?php echo $v_service->service_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Service" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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