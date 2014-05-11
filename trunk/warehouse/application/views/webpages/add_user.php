<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html xml:lang="Ar" lang="Ar" dir="rtl"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Form Layouts</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_default.css" rel="stylesheet" id="style_color" />
        <link href="<?php echo base_url(); ?>resource/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <?php $this->load->view('includes/header_view'); ?>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <?php $this->load->view('includes/sidebar_view'); ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN THEME CUSTOMIZER-->
                            <?php $this->load->view('includes/themes_view'); ?>
                            <!-- END THEME CUSTOMIZER-->
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                            <h3 class="page-title">
                                إدارة الأصناف
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">إضـافة مستخدم جديد</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">إضافة صنف جديد</a><span class="divider-last">&nbsp;</span></li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN SAMPLE FORM widget-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>نموذج إدخال</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body form">
                                    <!-- Start Alert Message -->
                                    <div id="status" class="alert">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <span id="message"></span>
                                    </div>
                                    <!-- End Alert Message -->
                                    <!-- BEGIN FORM-->
                                    <form method="POST" id="add_form" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label">الإسم بالكامل</label>
                                            <div class="controls">
                                                <input type="text" id="first_name" placeholder="الإسم الأول" class="span2" />
                                                <input type="text" id="middle_name" placeholder="الإسم الثاني" class="span2" />
                                                <input type="text" id="last_name" placeholder="إسم العائلة" class="span2" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">الرقم الوظيفي</label>
                                            <div class="controls">
                                                <input type="text" id="employee_number" placeholder="الرقم الوظيفي" class="span3" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">إسم المستخدم</label>
                                            <div class="controls">
                                                <input type="text" id="username" placeholder="يجب إدخال رقم الهوية" class="span3" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">كلمة المرور</label>
                                            <div class="controls">
                                                <input type="text" oninput="check_password();" id="password" placeholder="كلمة المرور" class="span3" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">أعد كتابة كلمة المرور</label>
                                            <div class="controls">
                                                <input type="text" oninput="check_password();" id="repassword" placeholder="أعد كتابة كلمة المرور" class="span3" />
                                                <span id="checkPassword" class="text-error"></span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الهاتف</label>
                                            <div class="controls">
                                                <input type="text" id="phone_number" placeholder="رقم الهاتف" class="span3" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الهاتف المحمول</label>
                                            <div class="controls">
                                                <input type="text" id="mobile_number" placeholder="رقم الهاتف المحمول" class="span3" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">الدائرة التي ينتمي إليها</label>
                                            <div class="controls">
                                                <select id="department_id" onchange="check_parent()" class="span3 chosen" data-placeholder="المحكمة التي تنتمي إليها" tabindex="1">
                                                    <option value=""></option>
                                                    <?php
                                                    $current_main = "";
                                                    foreach ($departments as $department) {
                                                        if ($current_main != $department['ROOT_NAME']) {
                                                            $current_main = $department['ROOT_NAME'];
                                                            ?>
                                                            <option value="<?= $department['ROOT_ID'] ?>" class="text-success bold large"><?php if ($department['ROOT_NAME'] != null) echo $department['ROOT_NAME'] ?></option>
                                                            <?php if ($department['DOWN1_NAME'] != null) { ?>
                                                                <option value="<?= $department['DOWN1_ID'] ?>"><?php if ($department['DOWN1_NAME'] != null) echo '>' . $department['DOWN1_NAME'] ?></option>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <option value="<?= $department['DOWN1_ID'] ?>"><?php if ($department['DOWN1_NAME'] != null) echo '>' . $department['DOWN1_NAME'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">صلاحية المستخدم</label>
                                            <div class="controls">
                                                <select id="user_role" class="span3" data-placeholder="تحديد صلاحية المستخدم" tabindex="1">
                                                    <option value="">إختيار</option>
                                                    <?php foreach ($roles as $role) { ?>
                                                        <option value="<?= $role['ROLE_ID'] ?>"><?= $role['ROLE_NAME'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">البريد الإلكتروني</label>
                                            <div class="controls">
                                                <input type="email" id="email_address" placeholder="البريد الإلكتروني" class="span3" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">صورة المستخدم</label>
                                            <div class="controls">
                                                <input type="file" id="user_picture" name="user_picture" placeholder="صورة للمستخدم إن وجدت" class="input-medium" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">حالة الحساب</label>
                                            <div class="controls">
                                                <label class="radio">
                                                    <input type="radio" class="span2" name="account_status" value="active" checked/>
                                                    فعال
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" class="span2" name="account_status" value="inactive" />
                                                    معطل
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-success" onclick="add_user()">حـفظ</button>
                                            <button type="reset" id="reset" class="btn">إلغاء</button>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END SAMPLE FORM widget-->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php $this->load->view('includes/footer_view'); ?>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->    
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script src="<?php echo base_url(); ?>resource/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/jquery.blockui.js"></script>
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/ajaxfileupload.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });

            function check_parent() {
                var x = $('#department_id').val();
                var y = $("#department_id option:selected").text();
                if (y.indexOf(">") == -1) {
                    $('#department_id').val('').trigger('liszt:updated');
                }
            }
            
            function check_password() {
                var val1 = $('#password').val();
                var val2 = $('#repassword').val();
                if (val1 != val2) {
                    $('#checkPassword').text('يجب تطابق كلمة المرور');
                }else{
                    $('#checkPassword').text('');
                }
            }

            function add_user() {

                $.ajaxFileUpload({
                    url: '<?php echo base_url() . "users/do_add_user/"; ?>',
                    secureuri: false,
                    fileElementId: 'user_picture',
                    dataType: 'json',
                    data: {
                        first_name: $('#first_name').val(),
                        middle_name: $('#middle_name').val(),
                        last_name: $('#last_name').val(),
                        employee_number: $('#employee_number').val(),
                        username: $('#username').val(),
                        password: $('#password').val(),
                        phone_number: $('#phone_number').val(),
                        mobile_number: $('#mobile_number').val(),
                        department_id: $('#department_id').val(),
                        user_role: $('#user_role').val(),
                        email_address: $('#email_address').val(),
                        user_picture: $('#user_picture').val(),
                        account_status: $('input[name="account_status"]:checked').val()
                    },
                    success: function(json) {
                        if (json == 1) {
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text("تم إضافة الصنف بنجاح");
                            $('#reset').click();
                        } else {
                            $('#status').addClass('alert alert-error');
                            $('#message').removeClass('alert-success').text("يجب عليك التأكد من البيانات المدخلة");
                        }
                    }, error: function() {
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
            }
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>