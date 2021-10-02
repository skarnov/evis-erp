<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add Delivery
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_pos/manage_delivery"> Manage Delivery</a></li>
            <li class="active">Add New Delivery</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_pos/save_delivery" method="POST">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_delivery');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_delivery');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Employee</label>
                                    <select name="employee_id" class="form-control select2" style="width: 100%;">
                                        <option value="1">Add Task Available Employee</option>
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
                                    <label>Delivery Start Date</label>
                                    <input type="text" name="delivery_start_time" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Undelivered Sale</label>
                                    <select name="sale_id" class="form-control select2" style="width: 100%;">
                                        <option value="1">Select Undelivered Sale</option>
                                        <?php
                                        foreach ($undelivered_sale as $v_sale) {
                                            ?>
                                            <option value="<?php echo $v_sale->sale_id; ?>"><?php echo $v_sale->sale_paid; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Delivery Start End</label>
                                    <input type="text" name="delivery_end_time" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Delivery Status</label>
                                        <select name="delivery_status" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Delivered</option>
                                            <option value="0">Undelivered</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>