<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Cashbook
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Search Cashbook</a></li>
            <li class="active">Manage Cashbook</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Received</th>
                            <th>Paid</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            foreach ($all_cashbook as $v_cashbook) {
                                ?>
                                <tr>
                                    <td><?php echo $v_cashbook->cashbook_entry_time; ?></td>
                                    <td><?php echo $v_cashbook->received_amount; ?></td>
                                    <td><?php echo $v_cashbook->paid_amount; ?></td>
                                    <td><?php echo $v_cashbook->current_balance; ?></td>
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