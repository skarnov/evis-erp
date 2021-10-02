<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Sale Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_pos/add_sale">New Sale</a></li>
            <li class="active">Sale Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Total</th>
                            <th>Price Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($sale_info as $v_sale) {
                                ?>
                                <tr>
                                    <td><?php echo $v_sale->sale_name; ?></td>
                                    <td><?php echo $v_sale->sale_quantity; ?></td>
                                    <td><?php echo $v_sale->sale_unit_total; ?></td>
                                    <td><?php echo $v_sale->sale_total; ?></td>     
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