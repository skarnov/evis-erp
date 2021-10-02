<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Admin
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_admin"> Manage Admin</a></li>
            <li class="active">Add New Admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>evis_app/update_admin" method="POST" name="admin">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" required name="admin_name" class="form-control" value="<?php echo $admin_info->admin_name; ?>">
                                    <input type="hidden" required name="admin_id" class="form-control" value="<?php echo $admin_info->admin_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="admin_email" class="form-control" value="<?php echo $admin_info->admin_email; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Updated Password</label>
                                    <input type="password" name="admin_password" class="form-control" placeholder="Enter Your Password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Level</label>
                                    <div class="controls">
                                        <select name="admin_level" class="form-control" tabindex="1">
                                            <option value="">Select Status</option>
                                            <option value="1">Administrator</option>
                                            <option value="2">HRM Manager</option>
                                            <option value="3">Accountant</option>
                                            <option value="4">Inventory Manager</option>
                                            <option value="5">Factory Manager</option>
                                            <option value="6">Communication Manager</option>
                                            <option value="7">Sales Man</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Activation Status</label>
                                    <div class="controls">
                                        <select name="admin_status" class="form-control" tabindex="1">
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
    document.forms['admin'].elements['admin_level'].value = '<?php echo $admin_info->admin_level; ?>';
    document.forms['admin'].elements['admin_status'].value = '<?php echo $admin_info->admin_status; ?>';
</script>