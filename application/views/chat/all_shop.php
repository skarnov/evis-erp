<div class="content-wrapper">
    <section class="content-header">
        <h1>
            All Shop
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">All Shop</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Shops</th>
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
                                    <a href="<?php echo base_url(); ?>evis_chat/start_shop_chat/<?php echo $v_shop->shop_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Start Chat"><i class="fa fa-pencil-square-o"></i> Start Chat With <?php echo $v_shop->shop_name; ?></a>
                                    <a href="<?php echo base_url(); ?>evis_chat/delete_shop_chat/<?php echo $v_shop->shop_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Chat"><i class="fa fa-trash"></i> Delete Chat <?php echo $v_shop->shop_name; ?></a>
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