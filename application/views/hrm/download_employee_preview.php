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
                    <div class="col-xs-12">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-1">
                                    <a href="<?php echo base_url(); ?>evis_hrm/download_employee_form/<?php echo $employee_info->employee_id; ?>" class="btn btn-success">Download PDF</a>
                                </div>    
                            </div>
                            <div class="table-responsive">
                                <hr/>
                                <h2 style="text-align: center;">
                                    Employee Form -
                                    <?php echo $employee_info->employee_name; ?>
                                </h2>
                                <table style="float:right; height:120px; border:2px solid black; width:110px; margin-top:-63px;">
                                    <tr>
                                        <td><img src="<?php echo base_url() . $employee_info->employee_image; ?>" style="height: 116px; width: 106px;" /></td><br/>
                                    </tr>
                                </table><br/><br/><br/><br/>
                                <table style="width:100%; line-height:30px;">
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Join Date:</strong> <?php echo $employee_info->employee_join_date; ?></td>
                                        <td style="border:1px solid black;">&nbsp;<strong>Designation:</strong> <?php echo $employee_info->employee_designation; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Fixed Salary:</strong> <?php echo $employee_info->employee_salary; ?></td>
                                        <td style="border:1px solid black;">&nbsp;<strong>Salary Due:</strong> <?php echo $employee_info->employee_salary_due; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Status:</strong> <?php
                                            if ($employee_info->employee_status == '1') {
                                                echo 'Active';
                                            } if ($employee_info->employee_status == '2') {
                                                echo 'Not Active';
                                            }
                                            ?>
                                        </td>
                                        <td style="border:1px solid black;">&nbsp;<strong>End Date:</strong> <?php echo $employee_info->employee_resignation_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;" colspan="2">&nbsp;<strong>National ID/ Driving License/ Passport/ Birth Certificate No:</strong> <?php echo $employee_info->employee_security_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Personal Number:</strong> <?php echo $employee_info->employee_mobile_number; ?>,</td>
                                        <td style="border:1px solid black;">&nbsp;<strong>Office Number:</strong> <?php echo $employee_info->employee_office_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Education:</strong> <?php echo $employee_info->employee_education; ?> </td>
                                        <td style="border:1px solid black;">&nbsp;<strong>Experience:</strong> <?php echo $employee_info->employee_experience; ?></td>
                                    </tr>
                                </table>
                                <br/>
                                <h4 style="text-align: center;"><strong>Build By Evis Technology | 01719020278</strong></h4>
                            </div>
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </section>
</div>