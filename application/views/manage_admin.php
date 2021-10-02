<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Admin
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/add_admin">Add New Admin</a></li>
            <li class="active">Manage Admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_admin');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_admin');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_admin as $v_admin) {
                            ?>
                            <tr>
                                <td><?php echo $v_admin->admin_name; ?></td>
                                <td><?php echo $v_admin->admin_email; ?></td>
                                <td>
                                    <div class='activation_color'>
                                        <?php
                                        if ($v_admin->admin_level == '1') {
                                            echo 'Administrator';
                                        }
                                        elseif ($v_admin->admin_level == '2') {
                                            echo 'HRM Manager';
                                        } 
                                        elseif ($v_admin->admin_level == '3') {
                                            echo 'Accountant';
                                        }
                                        elseif ($v_admin->admin_level == '4') {
                                            echo 'Inventory Manager';
                                        }
                                        elseif ($v_admin->admin_level == '5') {
                                            echo 'Factory Manager';
                                        }
                                        elseif ($v_admin->admin_level == '6') {
                                            echo 'Communication Manager';
                                        }
                                        elseif ($v_admin->admin_level == '7') {
                                            echo 'Sales Man';
                                        }
                                        ?>   
                                    </div>
                                </td>
                                <td>
                                    <div style="color:green">
                                        <?php
                                        if ($v_admin->admin_status == '1') {
                                            echo 'Active';
                                        }
                                        ?> 
                                        <div style="color:red">    
                                            <?php
                                            if ($v_admin->admin_status == 0) {
                                                echo 'Inactive';
                                            }
                                            ?>   
                                        </div>    
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    if ($v_admin->admin_status == '1') {
                                        ?>
                                        <a href="<?php echo base_url(); ?>evis_app/deactive_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Deactive Admin"><i class="fa fa-times"></i></a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="<?php echo base_url(); ?>evis_app/active_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Active Admin"><i class="fa fa-check"></i></a>
                                        <?php
                                    }
                                    ?>
                                    <a href="<?php echo base_url(); ?>evis_app/edit_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Admin"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_app/delete_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Admin" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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