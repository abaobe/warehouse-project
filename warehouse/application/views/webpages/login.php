<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Login page</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
        <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
        <META HTTP-EQUIV="EXPIRES" CONTENT=0>
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_default.css" rel="stylesheet" id="style_color" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body id="login-body">
        <div class="login-header">
            <!-- BEGIN LOGO -->
            <div id="logo" class="center">
                <img src="<?php echo base_url(); ?>resource/img/logo.png" alt="logo" class="center" />
            </div>
            <!-- END LOGO -->
        </div>
        <!-- BEGIN LOGIN -->
        <div id="login">
            <!-- Start Alert Message -->
            <div id="status" class="alert">
                <button class="close" data-dismiss="alert">×</button>
                <span id="message"></span>
            </div>
            <!-- BEGIN LOGIN FORM -->
            <form id="loginform" class="form-vertical no-padding no-margin">
                <div class="lock">
                    <i class="icon-lock"></i>
                </div>
                <div class="control-wrap">
                    <h4>تسجيل الدخـول</h4>
                    <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-user"></i></span><input id="username" type="text" placeholder="إسم المستخدم" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-key"></i></span><input id="password" type="password" placeholder="كـلمة المرور" />
                            </div>
                            <div class="mtop10">
                                <div class="block-hint pull-left small">
                                    <input type="checkbox" id=""> تـذكـرنـي
                                </div>
                                <div class="block-hint pull-right">
                                    <a href="javascript:;" class="" id="forget-password">هـل نسيـت كـلمة المـرور ؟</a>
                                </div>
                            </div>

                            <div class="clearfix space5"></div>
                        </div>

                    </div>
                </div>

                <input type="submit" id="login-btn" onclick="do_login();" class="btn btn-block login-btn" value="دخـول" />
            </form>
            <!-- END LOGIN FORM -->        
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form id="forgotform" class="form-vertical no-padding no-margin hide" action="<?php echo base_url() . "product/main_page"; ?>">
                <p class="center">أدخـل بـريدك الإلكـتروني ليتم إستعادة بيانات الدخـول.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="email" placeholder="البريد الإلكتروني"  />
                        </div>
                    </div>
                    <div class="space20"></div>
                </div>
                <input type="button" id="forget-btn" class="btn btn-block login-btn" value="إرسـال" />
            </form>
            <!-- END FORGOT PASSWORD FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div id="login-copyright">
            2014 © جمـيع الحـقوق محفوظة. 
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS -->
        <script src="<?php echo base_url(); ?>resource/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/jquery.blockui.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script>
            jQuery(document).ready(function() {
                App.initLogin();
            });
            
            $( "#loginform" ).submit(function( event ) {
              event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "users/do_login/"; ?>',
                    data: {
                        username: $('#username').val(),
                        password: $('#password').val()
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json['status'] == 'true') {
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text(json['msg']);
                            window.location.assign('<?php echo base_url() . "product/main_page/"; ?>');
                        } else if(json['status'] == 'false'){
                            $('#status').addClass('alert alert-error');
                            $('#message').removeClass('alert-success').text(json['msg']);
                        } else if(json['status'] == 'blocked'){
                            $('#status').addClass('alert alert-error');
                            $('#message').removeClass('alert-success').text(json['msg']);
                        }
                    }, error: function() {
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>