<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Shop
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_shop/manage_shop"> Manage Shop</a></li>
            <li class="active">Add New Shop</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_shop/save_shop" method="POST" enctype="multipart/form-data">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_shop');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_shop');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Shop Name</label>
                                    <input type="text" name="shop_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="number" name="shop_mobile_number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="shop_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="shop_password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Set Shop Image</label>
                                    <input type="file" name="shop_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Shop Address</label>
                                    <textarea name="shop_address" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>