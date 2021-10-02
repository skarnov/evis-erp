<?php
if (!$product_info)
    {
    ?>
    <p>Please Add Service Cost</p>
    <?php
    } else {
    $employee_cost = $product_info->employee_cost;
    $marketing_cost = $product_info->marketing_cost;
    $utility_cost = $product_info->utility_cost;
    $product_delivery_cost = $product_info->product_delivery_cost;
    $other_cost = $product_info->other_cost;
    $cost_per_product = $product_info->cost_per_product;
    $total = ($employee_cost + $marketing_cost + $utility_cost + $product_delivery_cost + $other_cost);
    $per_product_expenditure = ($total + $cost_per_product);
    ?>
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="product_name" value="<?php echo $product_info->product_name; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Net Price</label>
        <input type="number" name="product_net_price" value="<?php echo $product_info->cost_per_product; ?>" id="product_net_price" onmouseout="startCalc();" class="form-control">
    </div>
    <div class="form-group">
        <label>Service Price</label>
        <input type="number" value="<?php echo $total ?>" id="product_service_price" onmouseout="startCalc();" class="form-control">
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="product_quantity" value="<?php echo $product_info->quantity; ?>" id="product_quantity" onmouseout="startCalc();" class="form-control">
    </div>
    <div class="form-group">
        <label>Per Product Expenditure</label>
        <input type="number" class="form-control" value="<?php echo $per_product_expenditure ?>">
    </div>
    <div class="form-group">
        <label>Total Expenditure</label>
        <input type="number" name="total_expenditure" id="total_expenditure" onmouseout="startCalc();" class="form-control">
    </div>
    <?php
    }
?>