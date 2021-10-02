<div class="form-group">
    <label>Balance</label>
    <input type="number" name="balance" id="balance" onmouseout="startCalc();" class="form-control">
</div>
<div class="form-group">
    <label>Paid</label>
    <input type="number" name="paid" id="paid" onmouseout="startCalc();" class="form-control">
</div>
<input type="hidden" value="<?php echo $supplier_info->supplier_due;?>" id="supplier_due">
<input type="hidden" name="supplier_name" value="<?php echo $supplier_info->supplier_name;?>">
<div class="form-group">
    <label>Due</label>
    <input type="number" name="due" id="due" class="form-control">
</div>