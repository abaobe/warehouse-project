<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>تعديل الشركة</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url().'resource/css/'.CUSTOM_THEME.'.css'?>" rel="stylesheet" id="style_color" />

        <link href="<?php echo base_url(); ?>resource/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
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
                                قسم الشركات
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">قسم الشركات</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">إدارة الشركات</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">تعديل الشركة</a> <span class="divider-last">&nbsp;</span>
                                </li>
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
                                    <h4><i class="icon-reorder"></i>يمكنك تعديل البيانات الخاصة بهذة الشركة</h4>
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
                                    <form method="POST" id="add_form" onsubmit="return false;" class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">إسم الشركة</label>
                                            <div class="controls">
                                                <input type="text" id="company_name" value="<?=$company_info[0]['COMPANY_NAME'] ?>" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الترخيص</label>
                                            <div class="controls">
                                                <input type="text" id="license_number" value="<?=$company_info[0]['LICENSE_NUMBER'] ?>" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">العنوان</label>
                                            <div class="controls">
                                                <input type="text" id="address" value="<?=$company_info[0]['ADDRESS'] ?>" class="span6 " />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الهاتف</label>
                                            <div class="controls">
                                                <input type="text" id="telephone" value="<?=$company_info[0]['TELEPHONE'] ?>" class="span6 " />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الجوال</label>
                                            <div class="controls">
                                                <input type="text" id="mobile" value="<?=$company_info[0]['MOBILE'] ?>" class="span6 " />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الفاكس</label>
                                            <div class="controls">
                                                <input type="text" id="fax_number" value="<?=$company_info[0]['FAX_NUMBER'] ?>" class="span6 " />
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-success" onclick="update_company()">حفظ التعديلات</button>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });
            function update_company() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "companies/do_update_company/"; ?>',
                    data: {
                        company_id: '<?=$company_info[0]['COMPANY_ID'] ?>',
                        company_name: $('#company_name').val(),
                        license_number: $('#license_number').val(),
                        address: $('#address').val(),
                        telephone: $('#telephone').val(),
                        mobile: $('#mobile').val(),
                        adddress: $('#address').val(),
                        fax_number: $('#fax_number').val()
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json['status'] == true) {
                            $('#status').removeClass().addClass('alert alert-success');
                            $('#message').html(json['msg']);
                        } else if(json['status'] == false){
                            $('#status').removeClass().addClass('alert alert-error');
                            $('#message').html(json['msg']);
                        }
                    },complete: function(){
                        App.scrollTo();
                    },error: function() {
                        $('#status').removeClass().addClass('alert alert-error');
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
                return false;
            }
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>