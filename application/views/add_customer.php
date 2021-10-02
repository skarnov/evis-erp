<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Customer
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
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_customer');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_customer');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_app/save_customer" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="customer_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="customer_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Conform Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" name="customer_mobile" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="customer_address" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
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