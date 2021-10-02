<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Subcategory
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/manage_subcategory"> Manage Subcategory</a></li>
            <li class="active">Add New Subcategory</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_subcategory');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_subcategory');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_inventory/save_subcategory" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select name="category_id" class="form-control select2" style="width: 100%;">
                                        <?php
                                        foreach ($all_category as $v_category) {
                                            ?>
                                            <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subcategory Name</label>
                                    <input type="text" name="subcategory_name" class="form-control">
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