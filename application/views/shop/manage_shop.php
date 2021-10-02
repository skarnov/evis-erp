<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Shop
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_shop/add_shop">Add New Shop</a></li>
            <li class="active">Manage Shop</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_shop');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_shop');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Shop Name</th>
                            <th>Shop Image</th>
                            <th>Mobile Number</th>
                            <th>Member Since</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_shop as $v_shop) {
                            ?>
                            <tr>
                                <td><?php echo $v_shop->shop_name; ?></td>
                                <td>
                                    <?php
                                    $image = $v_shop->shop_image;
                                    if ($image) {
                                        ?>
                                        <img src="<?php echo base_url() . $v_shop->shop_image; ?>" style="height:50px; width:50px;" />
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?php echo base_url() ?>img/no_image_thumb.gif" style="height:50px; width:50px;" />
                                        <?php
                                    }
                                    ?> 
                                </td>
                                <td><?php echo $v_shop->shop_mobile_number; ?></td>
                                <td><?php echo $v_shop->shop_date_time; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_shop->shop_status == '1') {
                                            echo 'Published';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_shop->shop_status == 0) {
                                            echo 'Unpublished';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_shop/edit_shop/<?php echo $v_shop->shop_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Shop"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_shop/delete_shop/<?php echo $v_shop->shop_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Shop" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>