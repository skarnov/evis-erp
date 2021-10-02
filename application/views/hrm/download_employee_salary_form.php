<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                height: 842px;
                width: 595px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>

    <body>
        <div>
            <center>
                <table>
                    <tr>
                        <td><img src="<?php echo base_url(); ?>public/logo.png" style="width:100px; height:80px;"/></td>
                        <td style="width:400px;">
                            <div>
                                <h3 style="margin:0; text-align: center">Salary Sheet</h3>
                                <h4 style="margin:0; text-align: center">
                                    <?php
                                    $month_name = $this->session->userdata('month_name');
                                    if ($month_name == !NULL) {
                                        ?>
                                        (<?php echo $this->session->userdata('month_name'); ?> <?php echo $this->session->userdata('year_name'); ?>)
                                        <?php
                                    } else {
                                        ?>
                                        (Total Salary Report)
                                        <?php
                                    }
                                    ?>
                                </h4>
                            </div>
                        </td>
                    </tr>
                </table>
                <br/>
                <table align="center" style="width:595px;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black;">Employee Name</th>
                            <th style="border:1px solid black;">Salary Amount</th>
                            <th style="border:1px solid black;">Salary Due</th>
                            <th style="border:1px solid black;">Total Balance</th>
                            <th style="border:1px solid black;">Total Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border:1px solid black;"><?php echo $employee_info->employee_name ?></td>
                            <td style="border:1px solid black;"><?php echo $employee_info->employee_salary ?></td>
                            <td style="border:1px solid black;"><?php echo $employee_info->employee_salary_due ?></td> 
                            <td style="border:1px solid black;"><?php echo $total_balance->balance ?></td>
                            <td style="border:1px solid black;"><?php echo $total_paid->paid ?></td>
                        </tr>
                    </tbody>
                </table>
                <br/><br/>
                <table align="center" style="width:595px;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black;">Date</th>
                            <th style="border:1px solid black;">Balance</th>
                            <th style="border:1px solid black;">Paid Amount</th>
                            <th style="border:1px solid black;">Due Amount</th>
                            <th style="border:1px solid black;">Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($download_salary_sheet as $v_salary) {
                            ?>
                            <tr>
                                <td style="border:1px solid black;"><?php echo $v_salary->salary_paid_date; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_salary->salary_amount_balance; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_salary->salary_amount_paid; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_salary->salary_amount_due; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_salary->comment; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <br/><br/>
                <h4><strong>Powered By Evis Technology | 01719020278</strong></h4>
            </center>
        </div>       
    </body>
</html>