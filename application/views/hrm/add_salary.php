<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Salary
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_hrm/manage_salary"> Manage Salary</a></li>
            <li class="active">Add New Salary</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            employee_salary_due = document.salary.employee_salary_due.value;
            salary_amount_balance = document.salary.salary_amount_balance.value;
            salary_amount_paid = document.salary.salary_amount_paid.value;
            document.salary.salary_amount_due.value = (salary_amount_balance * 1) + (employee_salary_due * 1) - (salary_amount_paid * 1);
        }
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        function employeeInformation(employeeId)
        {
            if (employeeId) {
                serverPage = '<?php echo base_url(); ?>evis_hrm/show_employee_information/' + employeeId;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('employee_information').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_hrm/save_salary" method="POST" name="salary">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_salary');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_salary');
                            }
                            ?>
                        </h3>
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Salary Paid Date</label>
                                    <input type="text" name="salary_paid_date" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Salary Amount Due</label>
                                    <input type="text" name="salary_amount_due" id="salary_amount_due" class="form-control" onmouseout="startCalc();" placeholder="Salary Amount Due" >
                                </div>
                                <div class="form-group">
                                    <label>Salary Amount Paid</label>
                                    <input type="text" name="salary_amount_paid" id="salary_amount_paid" onmouseout="startCalc();" class="form-control" placeholder="Enter Salary Amount Paid">
                                </div>
                                <div class="form-group">
                                    <label>Salary Amount Balance</label>
                                    <input type="text" name="salary_amount_balance" id="salary_amount_balance" onmouseout="startCalc();" class="form-control" placeholder="Enter Salary Amount Or Bonus">
                                </div>
                                <div class="form-group">
                                    <label>Comment</label>
                                    <input type="text" name="comment" class="form-control" placeholder="Comment (If Any)">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label">Select Employee</label>
                                    <select name="employee_id" id="employee_id" onchange="employeeInformation(this.value)" class="form-control">
                                        <option value="">Select Employee</option>
                                        <?php
                                        foreach ($all_employee as $v_employee) {
                                            ?>
                                            <option value="<?php echo $v_employee->employee_id; ?>"><?php echo $v_employee->employee_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Month</label>
                                    <select name="month_id" class="form-control" tabindex="1">
                                        <option value="">Select Month</option>
                                        <?php
                                        foreach ($all_month as $v_month) {
                                            ?>
                                            <option value="<?php echo $v_month->month_id; ?>"><?php echo $v_month->month_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Year</label>
                                    <select name="year_id" class="form-control" tabindex="1">
                                        <option value="">Select Year</option>
                                        <?php
                                        foreach ($all_year as $v_year) {
                                            ?>
                                            <option value="<?php echo $v_year->year_id; ?>"><?php echo $v_year->year_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" id="employee_information"></div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>