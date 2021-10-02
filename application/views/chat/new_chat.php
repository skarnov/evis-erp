<div class="content-wrapper">
    <section class="content-header">
        <h1>
            New Chat
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_chat/manage_chat">Add New Chat</a></li>
            <li class="active">Manage Chat</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Chat Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Customer</td>
                            <td>
                                <a href="<?php echo base_url();?>evis_chat/all_customer" class="btn btn-primary" data-toggle="tooltip" title="Select Customers"><i class="fa fa-envelope"></i> Select Customers</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Shop</td>
                            <td>
                                <a href="<?php echo base_url();?>evis_chat/all_shop" class="btn btn-primary" data-toggle="tooltip" title="Select Shops"><i class="fa fa-envelope"></i> Select Shops</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>