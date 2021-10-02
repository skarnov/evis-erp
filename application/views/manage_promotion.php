<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Marketing Promotion
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/add_promotion">Add New Promotion</a></li>
            <li class="active">Manage Promotion</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <h3 style="color:green">
                <?php
                $msg = $this->session->userdata('edit_promotion');
                if (isset($msg)) {
                    echo $msg;
                    $this->session->unset_userdata('edit_promotion');
                }
                ?>
            </h3>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Promotion Name</th>
                            <th>Product</th>
                            <th>Campaign Manager</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_promotion as $v_promotion) {
                            ?>
                            <tr>
                                <td><?php echo $v_promotion->campaign_name; ?></td>
                                <td><?php echo $v_promotion->product_name; ?></td>
                                <td><?php echo $v_promotion->employee_name; ?></td>
                                <td><?php echo $v_promotion->campaign_start; ?></td>
                                <td><?php echo $v_promotion->campaign_end; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_erp/delete_promotion/<?php echo $v_promotion->marketing_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Promotion" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
