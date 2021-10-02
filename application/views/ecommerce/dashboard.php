<script type="text/javascript">
    function saveChat()
    {
        var customerId = document.chat.customerId.value;
        var customerMessage = document.chat.customerMessage.value;
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        serverPage = '<?php echo base_url(); ?>evis_ecommerce/save_chat/' + customerId + '/' + customerMessage;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            document.getElementById('customer_information').innerHTML = xmlhttp.responseText;
            $(".chatbox").scrollTop(100000);
        };
        xmlhttp.send(null);
    }
    function chat()
    {
        var customerId = document.chat.customerId.value;
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        serverPage = '<?php echo base_url(); ?>evis_ecommerce/show_chat/' + customerId;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            document.getElementById('customer_information').innerHTML = xmlhttp.responseText;
            $(".chatbox").scrollTop(100000);
        };
        xmlhttp.send(null);
    }
</script>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <div class="brands_products">
                        <h2>Categories</h2>
                        <div class="brands-name">
                            <?php
                            foreach ($all_subcategory as $v_subcategory) {
                                ?>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="<?php echo base_url(); ?>evis_ecommerce/subcategory_product_listing/<?php echo $v_subcategory->subcategory_id; ?>"> <?php echo $v_subcategory->subcategory_name; ?></a></li>
                                </ul>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="row signup-form">
                    <div class="panel panel-success">
                        <div class="panel-heading" id="accordion">
                            <i class="fa fa-comments"></i> Chat with Evis
                        </div>
                        <div class="panel-collapse">
                            <ul class="chatbox" id="customer_information">
                                <?php
                                foreach ($select_customer_chat as $v_chat) {
                                    $customer_message = $v_chat->customer_message;
                                    if ($customer_message == !NULL) {
                                        ?>
                                        <li class="left clearfix"><span class="chat-img pull-left">
                                                <p class="col-xs-2" style="color: purple; font-weight: bolder;"><?php echo $v_chat->customer_name; ?></p>
                                            </span>
                                            <div class="chat-body clearfix">
                                                <p>
                                                    <?php echo $v_chat->customer_message; ?>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    $admin_message = $v_chat->admin_message;
                                    if ($admin_message == !NULL) {
                                        ?>
                                        <li class="right clearfix"><span class="chat-img pull-right">
                                                <p class="col-xs-2" style="color: #f9676b; font-weight: bolder;">Admin</p>
                                            </span>
                                            <div class="chat-body clearfix">
                                                <p>
                                                    <?php echo $v_chat->admin_message; ?>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>       
                            </ul>
                            <div class="panel-footer">
                                <form name="chat" onsubmit="saveChat()">
                                    <div class="input-group">
                                        <input type="hidden" id="customerId" value="<?php echo $this->session->userdata('customer_id'); ?>">
                                        <input type="text" id="customerMessage" class="form-control input-sm" placeholder="Type your message here..." />
                                        <span class="input-group-btn">
                                            <input id="submit" onclick="saveChat()" type="reset" value="Send" class="btn btn-warning btn-sm"/>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    setInterval(function () {
        chat();
    }, 1000 * 60 * .1);
</script>