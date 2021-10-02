<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Salary
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_hrm/add_salary">Add New Salary</a></li>
            <li class="active">Manage Salary</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Month</th>
                            <th>Salary</th>
                            <th style="color:red;">Last Due</th>
                            <th>Paid Date</th>
                            <th>Due</th>
                            <th>Paid</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_salary as $v_salary) {
                            ?>
                            <tr>
                                <td><?php echo $v_salary->employee_name; ?></td>
                                <td><?php echo $v_salary->month_name; ?></td>
                                <td><?php echo $v_salary->employee_salary; ?></td>
                                <td style="color:red;"><?php echo $v_salary->employee_salary_due; ?></td>
                                <td><?php echo $v_salary->salary_paid_date; ?></td>
                                <td><?php echo $v_salary->salary_amount_due; ?></td>
                                <td><?php echo $v_salary->salary_amount_paid; ?></td>
                                <td><?php echo $v_salary->salary_amount_balance; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_hrm/delete_salary/<?php echo $v_salary->salary_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Salary" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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