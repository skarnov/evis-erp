<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Manufacturer
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/add_manufacturer">Add New Manufacturer</a></li>
            <li class="active">Manage Manufacturer</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_manufacturer');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_manufacturer');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Manufacturer Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_manufacturer as $v_manufacturer) {
                            ?>
                            <tr>
                                <td><?php echo $v_manufacturer->manufacturer_name; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_manufacturer->manufacturer_status == '1') {
                                            echo 'Published';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_manufacturer->manufacturer_status == 0) {
                                            echo 'Unpublished';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_inventory/edit_manufacturer/<?php echo $v_manufacturer->manufacturer_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Manufacturer"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_inventory/delete_manufacturer/<?php echo $v_manufacturer->manufacturer_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Manufacturer" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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