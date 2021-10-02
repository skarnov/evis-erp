<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Admin
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
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_admin');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_admin');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_app/save_admin" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" required name="admin_name" class="form-control" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="admin_email" class="form-control" placeholder="Enter Your Email Address">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required name="admin_password" data-toggle="tooltip" title="Password must be at least six characters" class="form-control" placeholder="Enter Your Password">
                                </div>
                                <div class="form-group">
                                    <label>Conform Password</label>
                                    <input type="password" required name="conform_password" class="form-control" placeholder="Conform The Password">
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
                                <div style="background-color:wheat;"><?php echo validation_errors(); ?></div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>