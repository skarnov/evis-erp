<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Campaign
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_erp/manage_campaign"> Manage Campaign</a></li>
            <li class="active">Edit Campaign</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>evis_erp/update_campaign" method="POST" name="campaign">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Campaign Name</label>
                                    <input type="text" name="campaign_name" value="<?php echo $campaign_info->campaign_name; ?>" class="form-control">
                                    <input type="hidden" name="campaign_id" value="<?php echo $campaign_info->campaign_id; ?>">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Edit</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>