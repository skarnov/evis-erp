<div class="form-group">
    <label>Balance</label>
    <input type="number" name="balance" id="balance" onmouseout="startCalc();" class="form-control">
</div>
<div class="form-group">
    <label>Receive</label>
    <input type="number" name="receive" id="receive" onmouseout="startCalc();" class="form-control">
</div>
<input type="hidden" value="<?php echo $shop_info->shop_due;?>" id="shop_due">
<input type="hidden" name="shop_name" value="<?php echo $shop_info->shop_name;?>">
<div class="form-group">
    <label>Due</label>
    <input type="number" name="due" id="due" class="form-control">
</div>