<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/add_category">Add New Category</a></li>
            <li class="active">Manage Category</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_category');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_category');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_category as $v_category) {
                            ?>
                            <tr>
                                <td><?php echo $v_category->category_name; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_category->category_status == '1') {
                                            echo 'Published';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_category->category_status == 0) {
                                            echo 'Unpublished';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_inventory/edit_category/<?php echo $v_category->category_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Category"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_inventory/delete_category/<?php echo $v_category->category_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Category" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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