<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <script type="text/javascript">
        function saveChat()
        {
            var shopId = document.chat.shopId.value;
            var shopMessage = document.chat.shopMessage.value;
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
            serverPage = '<?php echo base_url(); ?>evis_shop_admin/save_chat/' + shopId + '/' + shopMessage;
            xmlhttp.open("GET", serverPage);
            xmlhttp.onreadystatechange = function ()
            {
                document.getElementById('shop_chat_information').innerHTML = xmlhttp.responseText;
                $(".chatbox"). scrollTop(100000);
            };
            xmlhttp.send(null);
        }
        function chat()
        {
            var shopId = document.chat.shopId.value;
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
            serverPage = '<?php echo base_url(); ?>evis_shop_admin/show_chat/' + shopId;
            xmlhttp.open("GET", serverPage);
            xmlhttp.onreadystatechange = function ()
            {
                document.getElementById('shop_chat_information').innerHTML = xmlhttp.responseText;
                $(".chatbox"). scrollTop(100000);
            };
            xmlhttp.send(null);
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading" id="accordion">
                        <i class="fa fa-comments"></i> Chat
                    </div>
                    <div class="panel-collapse">
                        <ul class="chatbox" id="shop_chat_information">
                            <?php
                            foreach ($select_shop_chat as $v_chat) {
                                $shop_message = $v_chat->shop_message;
                                if ($shop_message == !NULL) {
                                    ?>
                                    <li class="left clearfix"><span class="chat-img pull-left">
                                            <p class="col-xs-2" style="color: purple; font-weight: bolder;"><?php echo $v_chat->shop_name; ?></p>
                                        </span>
                                        <div class="chat-body clearfix">
                                            <p>
                                                <?php echo $v_chat->shop_message; ?>
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
                                    <input type="hidden" id="shopId" value="<?php echo $this->session->userdata('shop_id'); ?>">
                                    <input type="text" id="shopMessage" class="form-control input-sm" placeholder="Type your message here..." />
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
    </section>
</div>
<script>
    setInterval(function () {
        chat();
    }, 1000 * 60 * .1);
    $(".chatbox"). scrollTop(100000);
</script>