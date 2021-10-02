<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Supplier
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_supplier/manage_supplier"> Manage Supplier</a></li>
            <li class="active">Add New Supplier</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_supplier');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_supplier');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_supplier/save_supplier" method="POST" enctype="multipart/form-data">
                    <div class="box box-info">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <input type="text" name="supplier_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Agent Name</label>
                                    <input type="text" name="agent_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="supplier_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="supplier_mobile" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="supplier_image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="supplier_address" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea name="supplier_note" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>