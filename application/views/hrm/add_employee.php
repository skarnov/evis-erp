<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Employee
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_hrm/manage_employee"> Manage Employee</a></li>
            <li class="active">Add New Employee</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_hrm/save_employee" method="POST" enctype="multipart/form-data">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_employee');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_employee');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Employee Name <span class="required">*</span></label>
                                    <input type="text" required name="employee_name" class="form-control" placeholder="Enter Employee Name">
                                </div>
                                <div class="form-group">
                                    <label>Employee Photo</label>
                                    <input type="file" name="employee_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Employee Join Date</label>
                                    <input type="text" name="employee_join_date" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Employee Designation</label>
                                    <input type="text" name="employee_designation" class="form-control" placeholder="Enter Employee Designation">
                                </div>
                                <div class="form-group">
                                    <label>Employee Security Number</label>
                                    <input type="text" name="employee_security_number" class="form-control" placeholder="Enter Employee Security Number">
                                </div>
                                <div class="form-group">
                                    <label>Employee Salary <span class="required">*</span></label>
                                    <input type="number" required name="employee_salary" class="form-control" placeholder="Enter Employee Salary">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Employee Mobile Number <span class="required">*</span></label>
                                    <input type="text" required name="employee_mobile_number" class="form-control" placeholder="Enter Employee Mobile Number">
                                </div>
                                <div class="form-group">
                                    <label>Employee Office Number</label>
                                    <input type="text" name="employee_office_number" class="form-control" placeholder="Enter Employee Office Number">
                                </div>
                                <div class="form-group">
                                    <label>Employee Education</label>
                                    <input type="text" name="employee_education" class="form-control" placeholder="Enter Employee Education">
                                </div>
                                <div class="form-group">
                                    <label>Employee Experience</label>
                                    <input type="text" name="employee_experience" class="form-control" placeholder="Enter Employee Experience">
                                </div>
                                <div class="form-group">
                                    <label>Employee Resignation Date</label>
                                    <input type="text" name="employee_resignation_date" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Employee Status</label>
                                    <div class="controls">
                                        <select name="employee_status" class="form-control" tabindex="1">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
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