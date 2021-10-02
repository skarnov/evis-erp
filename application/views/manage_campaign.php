<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Campaign
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/add_campaign">Add New Campaign</a></li>
            <li class="active">Manage Campaign</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_campaign');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_campaign');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Campaign Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_campaign as $v_campaign) {
                            ?>
                            <tr>
                                <td><?php echo $v_campaign->campaign_name; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_erp/edit_campaign/<?php echo $v_campaign->campaign_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Campaign"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_erp/delete_campaign/<?php echo $v_campaign->campaign_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Campaign" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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