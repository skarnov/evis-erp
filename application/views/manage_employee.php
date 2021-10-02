<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Employee
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_hrm/add_employee">Add New Employee</a></li>
            <li class="active">Manage Employee</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-4">
                    <input type="text" class="form-control input-lg" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_employee');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_employee');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Image</th>
                            <th>Join</th>
                            <th>Designation</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_employee as $v_employee) {
                            ?>
                            <tr>
                                <td><?php echo $v_employee->employee_name; ?></td>
                                <td>
                                    <?php
                                    $image = $v_employee->employee_image;
                                    if ($image) {
                                        ?>
                                        <img src="<?php echo base_url() . $v_employee->employee_image; ?>" style="height:50px; width:50px;" />
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?php echo base_url() ?>img/no_image_thumb.gif" style="height:50px; width:50px;" />
                                        <?php
                                    }
                                    ?> 
                                </td>
                                <td><?php echo $v_employee->employee_join_date; ?></td>
                                <td><?php echo $v_employee->employee_designation; ?></td>
                                <td><?php echo $v_employee->employee_mobile_number; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_employee->employee_status == '1') {
                                            echo 'Active';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_employee->employee_status == 0) {
                                            echo 'Inactive';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_hrm/download_employee/<?php echo $v_employee->employee_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Download Employee Form"><i class="fa fa-download"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_hrm/edit_employee/<?php echo $v_employee->employee_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Employee"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_hrm/delete_employee/<?php echo $v_employee->employee_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Employee" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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