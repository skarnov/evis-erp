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
                        <td align="center" style="width:595px;">
                            <div>
                                <h3 style="margin:0; text-align: center">Cashbook Report</h3>
                                <h4 style="margin:0; text-align: center">(Cashbook Report From <?php echo $start ?> To <?php echo $end ?>)</h4>
                            </div>
                        </td>
                    </tr><br/>
                </table>
                <br/>
                <table align="center" style="width:595px;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black;">Data</th>
                            <th style="border:1px solid black;">Received</th>
                            <th style="border:1px solid black;">Paid</th>
                            <th style="border:1px solid black;">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cashbook_report_info as $v_cashbook) {
                            ?>
                            <tr>
                                <td style="border:1px solid black;"><?php echo $v_cashbook->cashbook_entry_time; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_cashbook->received_amount ?></td>
                                <td style="border:1px solid black;"><?php echo $v_cashbook->paid_amount ?></td>
                                <td style="border:1px solid black;"><?php echo $v_cashbook->current_balance ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table><br/><br/>
                <p style="margin:0;">Total Income: <?php echo $total_cashbook->income;?></p>
                <p style="margin:0;">Total Expense: <?php echo $total_cashbook->expense;?></p>
                <br/>
                <h4><strong>Powered By Evis Technology | 01719020278</strong></h4>
            </center>
        </div>       
    </body>
</html>