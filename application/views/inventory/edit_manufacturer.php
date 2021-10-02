<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Manufacturer
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/manage_manufacturer"> Manage Manufacturer</a></li>
            <li class="active">Edit Manufacturer</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>evis_inventory/update_manufacturer" method="POST" name="manufacturer">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Manufacturer Name</label>
                                    <input type="text" name="manufacturer_name" value="<?php echo $manufacturer_info->manufacturer_name; ?>" class="form-control">
                                    <input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer_info->manufacturer_id; ?>">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Manufacturer Status</label>
                                        <select name="manufacturer_status" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
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
<script>
    document.forms['manufacturer'].elements['manufacturer_status'].value = '<?php echo $manufacturer_info->manufacturer_status; ?>';
</script>