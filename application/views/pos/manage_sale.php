<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage POS Sales
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_pos/add_sale">New Sale</a></li>
            <li class="active">Manage Sales</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Shop Name</th>
                            <th>Time</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_sale as $v_sale) {
                            ?>
                            <tr>
                                <td><?php echo $v_sale->shop_name; ?></td>
                                <td><?php echo $v_sale->time; ?></td>
                                <td><?php echo $v_sale->sale_paid; ?></td>
                                <td><?php echo $v_sale->sale_due; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_pos/sale_details/<?php echo $v_sale->sale_id; ?>" class="btn btn-warning" data-toggle="tooltip" title="Sale Details"><i class="fa fa-shield"></i></a>
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