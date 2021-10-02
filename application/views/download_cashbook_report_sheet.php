<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Download Cashbook
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/search_cashbook"> Search Cashbook</a></li>
            <li class="active">Download Cashbook</li>
        </ol>
    </section>
    <section class="content">
        <?php
        if ($cashbook_report_info == !NULL) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="col-xs-12">
                            <div class="box-body">
                                <div class="col-xs-1">
                                    <a href="<?php echo base_url(); ?>evis_app/download_cashbook_report/<?php echo $start ?>/<?php echo $end ?>" class="btn btn-success">Download PDF</a>
                                </div>
                                <div class="col-xs-12">
                                    <table class="table">
                                        <div class="text-center">
                                            <h3 text-center>Cashbook Report</h3>
                                            <h4>(Cashbook Report From <?php echo $start ?> To <?php echo $end ?>)</h4><hr/>
                                        </div>
                                        <thead>
                                            <th>Data</th>
                                            <th>Received</th>
                                            <th>Paid</th>
                                            <th>Balance</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($cashbook_report_info as $v_cashbook) {
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
                                    <hr/>
                                    <h4>Total Income: <?php echo $total_cashbook->income; ?></h4>
                                    <h4>Total Expense: <?php echo $total_cashbook->expense; ?></h4>
                                    <br/>
                                    <h4><strong>Powered By Evis Technology | 01719020278</strong></h4>
                                </div> 
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <h3 style="color:red">No Record Found in This Date</h3>
        <?php } ?>
    </section>
</div>