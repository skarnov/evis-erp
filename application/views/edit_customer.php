<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Customer
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_customer"> Manage Customer</a></li>
            <li class="active">Add New Customer</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>evis_app/update_customer" method="POST" name="customer">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" name="customer_name" value="<?php echo $customer_info->customer_name; ?>" class="form-control">
                                    <input type="hidden" name="customer_id" value="<?php echo $customer_info->customer_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="customer_email" value="<?php echo $customer_info->customer_email; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" name="customer_mobile" value="<?php echo $customer_info->customer_mobile; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="customer_address" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $customer_info->customer_address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Customer Status</label>
                                        <select name="customer_status" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
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
    document.forms['customer'].elements['customer_status'].value = '<?php echo $customer_info->customer_status; ?>';
</script>