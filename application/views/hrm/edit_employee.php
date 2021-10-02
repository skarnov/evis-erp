<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Employee
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_hrm/manage_employee"> Manage Employee</a></li>
            <li class="active">Edit Employee</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_hrm/update_employee" method="POST" name="employee">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Employee Name <span class="required">*</span></label>
                                    <input type="text" required name="employee_name" value="<?php echo $employee_info->employee_name;?>" class="form-control">
                                    <input type="hidden" name="employee_id" value="<?php echo $employee_info->employee_id;?>">
                                </div>
                                <div class="form-group">
                                    <label>Employee Join Date</label>
                                    <input type="text" name="employee_join_date" value="<?php echo $employee_info->employee_join_date;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Employee Designation</label>
                                    <input type="text" name="employee_designation" value="<?php echo $employee_info->employee_designation;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Employee Security Number</label>
                                    <input type="text" name="employee_security_number" value="<?php echo $employee_info->employee_security_number;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Employee Salary <span class="required">*</span></label>
                                    <input type="number" required name="employee_salary" value="<?php echo $employee_info->employee_salary;?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Employee Mobile Number <span class="required">*</span></label>
                                    <input type="text" required name="employee_mobile_number" value="<?php echo $employee_info->employee_mobile_number;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Employee Office Number</label>
                                    <input type="text" name="employee_office_number" value="<?php echo $employee_info->employee_office_number;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Employee Education</label>
                                    <input type="text" name="employee_education" value="<?php echo $employee_info->employee_education;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Employee Experience</label>
                                    <input type="text" name="employee_experience" value="<?php echo $employee_info->employee_experience;?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Employee Resignation Date</label>
                                    <input type="text" name="employee_resignation_date" value="<?php echo $employee_info->employee_resignation_date;?>" class="form-control">
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
<script>
    document.forms['employee'].elements['employee_status'].value = '<?php echo $employee_info->employee_status; ?>';
</script>