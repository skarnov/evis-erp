<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Product Manufacturing
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/add_manufacturing_product">New Manufacturing Product</a></li>
            <li class="active">Manage Product Manufacturing</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_manufacturing');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_manufacturing');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Cost Per Product</th>
                            <th>Total Cost</th>
                            <th>Estimate Profit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_manufacturing as $v_manufacturing) {
                            ?>
                            <tr>
                                <td><?php echo $v_manufacturing->product_name; ?></td>
                                <td><?php echo $v_manufacturing->quantity; ?></td>
                                <td><?php echo $v_manufacturing->cost_per_product; ?></td>
                                <td>
                                    <?php 
                                        $quantity=$v_manufacturing->quantity; 
                                        $cost_per_product=$v_manufacturing->cost_per_product;
                                        echo $total_cost=($cost_per_product*$quantity);
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $estimate_profit_per_product=$v_manufacturing->estimate_profit_per_product;
                                        echo $total_profit=$estimate_profit_per_product*$quantity;
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_erp/edit_manufacturing/<?php echo $v_manufacturing->manufacturing_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Manufacturing"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_erp/delete_manufacturing/<?php echo $v_manufacturing->manufacturing_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Manufacturing" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
