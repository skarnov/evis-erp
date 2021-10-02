<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Delivery
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_pos/manage_delivery"> Manage Delivery</a></li>
            <li class="active">Edit Delivery</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_pos/update_delivery" method="POST" name="delivery">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('edit_delivery');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('edit_delivery');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Employee</label>
                                    <select name="employee_id" class="form-control select2" style="width: 100%;">
                                        <option value=" ">Add Task Available Employee</option>
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
                                    <input type="text" name="delivery_start_time" value="<?php echo $delivery_info->delivery_start_time; ?>" class="form-control">
                                    <input type="hidden" name="delivery_id" value="<?php echo $delivery_info->delivery_id; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Undelivered Sale</label>
                                    <select name="sale_id" class="form-control select2" style="width: 100%;">
                                        <option value=" ">Select Undelivered Sale</option>
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
                                    <input type="text" name="delivery_end_time" value="<?php echo $delivery_info->delivery_end_time; ?>" class="form-control">
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
                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['delivery'].elements['employee_id'].value = '<?php echo $delivery_info->employee_id; ?>';
    document.forms['delivery'].elements['sale_id'].value = '<?php echo $delivery_info->sale_id; ?>';
    document.forms['delivery'].elements['delivery_status'].value = '<?php echo $delivery_info->delivery_status; ?>';
</script>