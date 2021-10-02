<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Download Salary Sheet
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_hrm/search_salary"> Search Salary Sheet</a></li>
            <li class="active">Download Salary Sheet</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="col-xs-12">
                        <div class="box-body">
                            <div class="col-xs-1">
                                <?php
                                $month_name = $this->session->userdata('month_name');
                                $year_name = $this->session->userdata('year_name');
                                if ($month_name == !NULL) {
                                    ?>     
                                    <a href="<?php echo base_url(); ?>evis_hrm/download_salary_form/<?php echo $employee_info->employee_id ?>/<?php echo $this->session->userdata('month_id'); ?>/<?php echo $this->session->userdata('year_id'); ?>"class="btn btn-success">Download PDF</a>      
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo base_url(); ?>evis_hrm/download_employee_salary_form/<?php echo $employee_info->employee_id ?>"class="btn btn-success">Download PDF</a>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-xs-12">
                                <table class="table">
                                    <div class="text-center">
                                        <h3>Salary Sheet</h3>
                                        <?php
                                        $month_name = $this->session->userdata('month_name');
                                        if ($month_name == !NULL) {
                                            ?>
                                            (<?php echo $this->session->userdata('month_name'); ?> <?php echo $this->session->userdata('year_name'); ?>)<hr/>
                                            <?php
                                        } else {
                                            ?>
                                            (Total Salary Report)<br/>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Salary Amount</th>
                                            <th>Salary Due</th>
                                            <th>Total Balance</th>
                                            <th>Total Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $employee_info->employee_name ?></td>
                                            <td><?php echo $employee_info->employee_salary ?></td>
                                            <td><?php echo $employee_info->employee_salary_due ?></td> 
                                            <td><?php echo $total_balance->balance ?></td>
                                            <td><?php echo $total_paid->paid ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Balance</th>
                                                            <th>Paid Amount</th>
                                                            <th>Due Amount</th>
                                                            <th>Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($download_salary_sheet as $v_salary) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $v_salary->salary_paid_date; ?></td>
                                                                <td><?php echo $v_salary->salary_amount_balance; ?></td>
                                                                <td><?php echo $v_salary->salary_amount_paid; ?></td>
                                                                <td><?php echo $v_salary->salary_amount_due; ?></td>
                                                                <td><?php echo $v_salary->comment; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </section>
</div>