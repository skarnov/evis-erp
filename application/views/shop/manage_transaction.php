<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Shop Transaction
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_shop/add_transaction">Add New Transaction</a></li>
            <li class="active">Manage Transaction</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Shop Name</th>
                            <th>Balance</th>
                            <th>Receive</th>
                            <th>Due</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_transaction as $v_transaction) {
                            ?>
                            <tr>
                                <td><?php echo $v_transaction->shop_name; ?></td>
                                <td><?php echo $v_transaction->balance; ?></td>
                                <td><?php echo $v_transaction->receive; ?></td>
                                <td><?php echo $v_transaction->due; ?></td>
                                <td><?php echo $v_transaction->time; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_shop/delete_transaction/<?php echo $v_transaction->transaction_id; ?>/<?php echo $v_transaction->shop_id; ?>/<?php echo $v_transaction->due; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Transaction" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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