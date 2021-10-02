<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Supplier
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_supplier/add_supplier">Add New Supplier</a></li>
            <li class="active">Manage Supplier</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_supplier');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_supplier');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Agent Name</th>
                            <th>Image</th>
                            <th>Mobile Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_supplier as $v_supplier) {
                            ?>
                            <tr>
                                <td><?php echo $v_supplier->supplier_name; ?></td>
                                <td><?php echo $v_supplier->agent_name; ?></td>
                                <td>
                                    <?php
                                    $image = $v_supplier->supplier_image;
                                    if ($image) {
                                        ?>
                                        <img src="<?php echo base_url() . $v_supplier->supplier_image; ?>" style="height:50px; width:50px;" />
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?php echo base_url() ?>img/no_image_thumb.gif" style="height:50px; width:50px;" />
                                        <?php
                                    }
                                    ?> 
                                </td>
                                <td><?php echo $v_supplier->supplier_mobile; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_supplier->supplier_status == '1') {
                                            echo 'Published';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_supplier->supplier_status == 0) {
                                            echo 'Unpublished';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_supplier/edit_supplier/<?php echo $v_supplier->supplier_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Supplier"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_supplier/delete_supplier/<?php echo $v_supplier->supplier_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Supplier" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>