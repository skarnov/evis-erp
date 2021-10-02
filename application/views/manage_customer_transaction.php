<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Customer Transaction
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Customer Transaction</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Payment Type</th>
                            <th>Paid Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_customer_sale as $v_sale) {
                            ?>
                            <tr>
                                <td><?php echo $v_sale->customer_name; ?></td>
                                <td>Paid</td>
                                <td><?php echo $v_sale->sale_paid; ?></td>
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