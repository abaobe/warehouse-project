<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
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
        <link href="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css"/>
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
                                إدارة الفئات
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">إضافة فئة جديدة</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">إضافة فئة جديدة</a><span class="divider-last">&nbsp;</span></li>
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
                                    <form method="POST" id="add_form" onsubmit="return false;" class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">إسم الفئة</label>
                                            <div class="controls">
                                                <input type="text" id="category_name" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">نوع الفئة</label>
                                            <div class="controls">
                                                <label class="radio">
                                                    <input type="radio" name="category_type" value="main" onclick="checkType()" />
                                                    فئة رئـيسية
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="category_type" value="sub" onclick="checkType()" />
                                                    فئة فرعـية
                                                </label>
                                            </div>
                                        </div>
                                        <div id="main_category">
                                            <div class="control-group">
                                                <label class="control-label">وصف الفئة</label>
                                                <div class="controls">
                                                    <input type="text" id="category_description" class="span6 " />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">فئة فرعية</label>
                                                <div class="controls">
                                                    <input type="text" id="sub_1" class="span6 " />
                                                    <button id="more" class="btn btn-info"><i class="icon-plus icon-white"></i> مزيد</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="sub_category">
                                            <div class="control-group">
                                                <label class="control-label">الفئة الرئيسية التي ينتمي إليها</label>
                                                <div class="controls">
                                                    <select id="parent_id" class="span6 chosen" data-placeholder="الفئة التي ينتمي إليها" tabindex="1">
                                                        <option value=""></option>
                                                        <?php
                                                        $current_main = "";
                                                        foreach ($categories as $category) {
                                                            if ($current_main != $category['ROOT_NAME']) {
                                                                $current_main = $category['ROOT_NAME'];
                                                                ?>
                                                                <option class="text-success bold large" value="<?= $category['ROOT_ID'] ?>"><?= $category['ROOT_NAME'] ?></option>
                                                                <option value="<?= $category['DOWN1_ID'] ?>"><?php if ($category['DOWN1_NAME'] != null) echo ' > ' . $category['DOWN1_NAME'] ?></option>
                                                                <option value="<?= $category['DOWN2_ID'] ?>"><?php if ($category['DOWN2_NAME'] != null) echo '  >> ' . $category['DOWN2_NAME'] ?></option>
                                                                <option value="<?= $category['DOWN3_ID'] ?>"><?php if ($category['DOWN3_NAME'] != null) echo '   >>> ' . $category['DOWN3_NAME'] ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $category['DOWN1_ID'] ?>"><?php if ($category['DOWN1_NAME'] != null) echo ' > ' . $category['DOWN1_NAME'] ?></option>
                                                                <option value="<?= $category['DOWN2_ID'] ?>"><?php if ($category['DOWN2_NAME'] != null) echo '  >> ' . $category['DOWN2_NAME'] ?></option>
                                                                <option value="<?= $category['DOWN3_ID'] ?>"><?php if ($category['DOWN3_NAME'] != null) echo '   >>> ' . $category['DOWN3_NAME'] ?></option>  
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-success" onclick="add_category()">حـفظ</button>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
                $('#main_category').hide();
                $('#sub_category').hide();
            });

            var count = 2;
            $('#more').click(function() {
                var new_sub = '<div class="control-group"><label class="control-label">فئة فرعية</label><div class="controls"><input type="text" class="span6" id="sub_' + count + '"/></div></div>';
                $('#main_category').append(new_sub);
                count++;
            });

            function checkType() {
                if ($("input:radio[name=category_type]:checked").val() == 'main') {
                    $('#sub_category').hide();
                    $('#main_category').show();
                } else if ($("input:radio[name=category_type]:checked").val() == 'sub') {
                    $('#main_category').hide();
                    $('#sub_category').show();
                }
            }

            function add_category() {
                if ($("input:radio[name=category_type]:checked").val() == 'main') {

                    var subs = ",";
                    for (var i = 1; i < count; i++) {
                        subs += $("#sub_" + i).val() + ',';
                    }
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "categories/do_add_category/"; ?>',
                        data: {
                            category_name: $('#category_name').val(),
                            category_description: $('#category_description').val(),
                            subs: subs
                        },
                        dataType: "json",
                        success: function(json) {
                            if (json == 1) {
                                $('#status').removeClass('alert-error').addClass('alert alert-success');
                                $('#message').text("تم إضافة الفئة  بنجاح");
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
                else if ($("input:radio[name=category_type]:checked").val() == 'sub') {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "categories/do_add_subCategory/"; ?>',
                        data: {
                            category_name: $('#category_name').val(),
                            parent_id: $('#parent_id').val()
                        },
                        dataType: "json",
                        success: function(json) {
                            if (json == 1) {
                                $('#status').removeClass('alert-error').addClass('alert alert-success');
                                $('#message').text("تم إضافة الفئة  بنجاح");
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
            }
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>