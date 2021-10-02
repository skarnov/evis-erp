<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Product Planning
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/add_product_planning">New Product Planning</a></li>
            <li class="active">Manage Product Planning</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_planning');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_planning');
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
                        foreach ($all_planning as $v_planning) {
                            ?>
                            <tr>
                                <td><?php echo $v_planning->product_name; ?></td>
                                <td><?php echo $v_planning->quantity; ?></td>
                                <td><?php echo $v_planning->cost_per_product; ?></td>
                                <td>
                                    <?php 
                                        $quantity=$v_planning->quantity; 
                                        $cost_per_product=$v_planning->cost_per_product;
                                        echo $total_cost=($cost_per_product*$quantity);
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $estimate_profit_per_product=$v_planning->estimate_profit_per_product;
                                        echo $total_profit=$estimate_profit_per_product*$quantity;
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_erp/edit_product_planning/<?php echo $v_planning->planning_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Planning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_erp/delete_product_planning/<?php echo $v_planning->planning_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Planning" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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