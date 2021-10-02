<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Shop
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_shop/manage_shop"> Manage Shop</a></li>
            <li class="active">Edit Shop</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>evis_shop/update_shop" method="POST" name="shop">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Shop Name</label>
                                    <input type="text" name="shop_name" value="<?php echo $shop_info->shop_name; ?>" class="form-control">
                                    <input type="hidden" name="shop_id" value="<?php echo $shop_info->shop_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="shop_mobile_number" value="<?php echo $shop_info->shop_mobile_number; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="shop_email" value="<?php echo $shop_info->shop_email; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="shop_address" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" class="form-control"><?php echo $shop_info->shop_address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Shop Status</label>
                                        <select name="shop_status" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
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
    document.forms['shop'].elements['shop_status'].value = '<?php echo $shop_info->shop_status; ?>';
</script>