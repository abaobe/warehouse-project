<div id="header" class="navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="">
                <img src="<?php echo base_url(); ?>resource/img/logo-panel.png" alt="Admin Lab" />
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="arrow"></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <div id="top_menu" class="nav notify-row">
                <!-- BEGIN NOTIFICATION -->
                <ul class="nav top-menu">
                    <!-- BEGIN SETTINGS -->
                    <li class="dropdown">
                        <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="إعدادات">
                            <i class="icon-cog"></i>
                        </a>
                    </li>
                    <!-- END SETTINGS -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <li class="dropdown" id="header_inbox_bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge badge-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <li>
                                <p>يوجد 5 رسائل غير مقروؤة في البريد</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img src="<?php echo base_url(); ?>resource/img/avatar-mini.png" alt="avatar" /></span>
                                    <span class="subject">
                                        <span class="from">حازم الغلاييني</span>
                                        <span class="time">قبل ساعة</span>
                                    </span>
                                    <span class="message">
                                        إستفسار بخصوص الأصناف طويلة الأجل
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img src="<?php echo base_url(); ?>resource/img/avatar-mini.png" alt="avatar" /></span>
                                    <span class="subject">
                                        <span class="from">حازم الغلاييني</span>
                                        <span class="time">قبل ساعة</span>
                                    </span>
                                    <span class="message">
                                        إستفسار بخصوص الأصناف طويلة الأجل
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img src="<?php echo base_url(); ?>resource/img/avatar-mini.png" alt="avatar" /></span>
                                    <span class="subject">
                                        <span class="from">حازم الغلاييني</span>
                                        <span class="time">قبل ساعة</span>
                                    </span>
                                    <span class="message">
                                        إستفسار بخصوص الأصناف طويلة الأجل
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img src="<?php echo base_url(); ?>resource/img/avatar-mini.png" alt="avatar" /></span>
                                    <span class="subject">
                                        <span class="from">حازم الغلاييني</span>
                                        <span class="time">قبل ساعة</span>
                                    </span>
                                    <span class="message">
                                        إستفسار بخصوص الأصناف طويلة الأجل
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img src="<?php echo base_url(); ?>resource/img/avatar-mini.png" alt="avatar" /></span>
                                    <span class="subject">
                                        <span class="from">حازم الغلاييني</span>
                                        <span class="time">قبل ساعة</span>
                                    </span>
                                    <span class="message">
                                        إستفسار بخصوص الأصناف طويلة الأجل
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown" onclick="showNotifications()" id="header_notification_bar">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-bell-alt"></i>
                            <span id="noteNum" class="badge badge-warning"></span>
                        </a>
                        <ul id="notification" class="dropdown-menu extended inbox">
                            <li>
                                <p id="notificationNumber"></p>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                </ul>
            </div>
            <!-- END  NOTIFICATION -->
            <div class="top-nav ">
                <ul class="nav pull-left top-menu" >
                    <!-- BEGIN SUPPORT -->
                    <li class="dropdown mtop5">

                        <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="محادثة">
                            <i class="icon-comments-alt"></i>
                        </a>
                    </li>
                    <li class="dropdown mtop5">
                        <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="مساعدة">
                            <i class="icon-headphones"></i>
                        </a>
                    </li>
                    <!-- END SUPPORT -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php if (file_exists('./uploads/thumbs/' . $this->session->userdata('user_picture'))) { ?>
                                <img width="32px" src='<?= base_url() . 'uploads/thumbs/' . $this->session->userdata('user_picture') ?>'>
                            <?php } else { ?>
                                <img width="32px" src="<?php echo base_url(); ?>uploads/thumbs/avatar.png">
                            <?php } ?>
                            <span class="username"><?= $this->session->userdata('full_name') ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-user"></i> الصـفحة الشـخصية</a></li>
                            <li><a href="#"><i class="icon-tasks"></i> المـهام</a></li>
                            <li><a href="#"><i class="icon-calendar"></i> جـدولة</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url() . "users/logout"; ?>"><i class="icon-key"></i> تسجـيل خـروج</a></li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<script>
    var notificationNumber = 0;
    var callnotification = function() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() . "product/getNotification/"; ?>',
            data: {
            },
            dataType: "json",
            success: function(json) {
                var item;
                $.each( json, function( key , val ) {
                    var productType;
                    var deptName = val['MAIN_DEPARTMENT']+'>hasdkjhaskjdhkasd'+val['DEPARTMENT_NAME'];
                    if(val['PRODUCT_TYPE'] === 1)
                        productType = 'مستهلكة';
                    else
                        productType = 'طويلة الأجل';
                    item = '<li>'+
                                '<a href="#">'+
                                    '<span class="subject">'+
                                        '<span class="from">'+deptName.substring(0,30)+'</span>'+
                                        '<span class="time">'+val['ADDED_DATE']+'</span>'+
                                    '</span>'+
                                    '<span class="message">'+
                                        'قامت بطلب لوازم '+productType+' بطلب رقم '+val['ORDER_NUMBER']
                                    '</span>'+
                                '</a>'+
                            '</li>';
                    $('#notification').append(item);
                  });
                    $('#notification').append('<li><a href="<?php echo base_url() . "product/show_ordered_supplies/"; ?>">المزيد من الإشعارات</a></li>');
            }, error: function() {
                $('#message').text("هناك خطأ في تخزين البيانات");
            }
        });
    }

    var getNotificationsNumber = function() {
        $.post('<?php echo base_url() . "product/getNotificationsNumber/"; ?>', function( data ) {
          notificationNumber = data;
          $("#noteNum").html(data);
        });
    }
    var myTimer = setInterval(getNotificationsNumber, 300000);
    
    function showNotifications(){
        $("#notificationNumber").html('هنـاك '+notificationNumber+' شعـار جـديد');
        $("#noteNum").empty();
        notificationNumber = 0;
        callnotification();
    }
</script>