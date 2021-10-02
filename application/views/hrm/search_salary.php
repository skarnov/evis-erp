<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Search Salary Sheet
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_hrm/manage_salary"> Manage Salary</a></li>
            <li class="active">Search Salary Sheet</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="panel-body">
                        <form action="<?php echo base_url() ?>evis_hrm/download_salary_sheet" method="POST">
                            <div class="panel panel-primary col-lg-12">
                                <div class="col-xs-4"><br/>
                                    <select name="employee_id" class="form-control">
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
                                <input type="hidden" name="employee_name" value="<?php echo $v_employee->employee_name; ?>" >
                                <div class="col-xs-4"><br/>
                                    <select name="month_id" class="form-control" tabindex="1">
                                        <option value="">All Month</option>
                                        <?php
                                        foreach ($all_month as $v_month) {
                                            ?>
                                            <option value="<?php echo $v_month->month_id; ?>"><?php echo $v_month->month_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4"><br/>
                                    <div class="form-group">
                                        <select name="year_id" class="form-control" tabindex="1">
                                            <option value="">All Year</option>
                                            <?php
                                            foreach ($all_year as $v_year) {
                                                ?>
                                                <option value="<?php echo $v_year->year_id; ?>"><?php echo $v_year->year_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 pull-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success pull-right">Search Employee Salary Sheet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>