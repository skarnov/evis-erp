<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Supplier
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_supplier/manage_supplier"> Manage Supplier</a></li>
            <li class="active">Edit Supplier</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>evis_supplier/update_supplier" method="POST" name="supplier">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <input type="text" name="supplier_name" value="<?php echo $supplier_info->supplier_name; ?>" class="form-control">
                                    <input type="hidden" name="supplier_id" value="<?php echo $supplier_info->supplier_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Agent Name</label>
                                    <input type="text" name="agent_name" value="<?php echo $supplier_info->agent_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="supplier_email" value="<?php echo $supplier_info->supplier_email; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="supplier_mobile" value="<?php echo $supplier_info->supplier_mobile; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="supplier_address" class="form-control"><?php echo $supplier_info->supplier_address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea name="supplier_note" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $supplier_info->supplier_note; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Supplier Status</label>
                                        <select name="supplier_status" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['supplier'].elements['supplier_status'].value = '<?php echo $supplier_info->supplier_status; ?>';
</script>