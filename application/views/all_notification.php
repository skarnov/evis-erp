<div class="content-wrapper">
    <section class="content-header">
        <h1>
            All Notification
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">All Notification</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <tbody>
                        <?php
                        foreach ($all_notification as $v_notification) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $v_notification->notification_type . ' at ' . $v_notification->notification_time; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_app/delete_notification/<?php echo $v_notification->notification_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Notification" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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