<div class="form-group">
    <label>Campaign Cost</label>
    <input type="number" name="campaign_cost" id="campaign_cost" onmouseout="startCalc();" class="form-control">
</div>
<div class="form-group">
    <label>Paid Amount</label>
    <input type="number" name="paid" id="paid" onmouseout="startCalc();" class="form-control">
</div>
<input type="hidden" value="<?php echo $campaign_info->campaign_due;?>"  id="campaign_due">
<div class="form-group">
    <label>Due Amount</label>
    <input type="number" name="due" id="due" class="form-control">
</div>