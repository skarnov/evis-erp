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
            <table>
                <tr>
                    <td><img src="<?php echo base_url(); ?>public/logo.png" style="width:100px; height:80px;"/></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><h2>Employee Registration Form</h2></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><img src="<?php echo base_url() . $employee_info->employee_image; ?>" style="height: 116px; width: 106px;"/></td>
                </tr>
            </table>
            <table style="width: 595px;line-height:30px;">
                <tr>
                    <td style="border:1px solid black;" colspan="2">&nbsp;<strong>Employee Name:</strong> <?php echo $employee_info->employee_name; ?></td>
                </tr>
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
            <br/><br/>
            <h4 style="text-align: center;"><strong>Powered By Evis Technology | 01719020278</strong></h4>
        </div>
    </body>
</html>