<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>تعديل بيانات الفئة</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url().'resource/css/'.CUSTOM_THEME.'.css'?>" rel="stylesheet" id="style_color" />
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
                                قسم الفئات
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">قسم الفئات</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">إدارة الأصناف</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">تعديل بيانات الفئة</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>تعديل البيانات الخاصة بالفئة</h4>
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
                                                <input type="text" id="category_name" value="<?= $category_info[0]['CATEGORY_NAME'] ?>" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">نوع الفئة</label>
                                            <div class="controls">
                                                <label class="radio">
                                                    <input type="radio" name="category_type" <?php if ($category_info[0]['PARENT_ID'] == 0) {echo "checked=\"checked\"";} ?> value="main" onclick="checkType()" />
                                                    فئة رئـيسية
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="category_type" <?php if ($category_info[0]['PARENT_ID'] != 0) {echo "checked=\"checked\"";} ?> value="sub" onclick="checkType()" />
                                                    فئة فرعـية
                                                </label>
                                            </div>
                                        </div>
                                        <div id="main_category">
                                            <div class="control-group">
                                                <label class="control-label">وصف الفئة</label>
                                                <div class="controls">
                                                    <input type="text" id="category_description" value="<?=$category_info[0]['CATEGORY_DESCRIPTION'] ?>" class="span6 " />
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
                                                            <option <?php if (!(strcmp($category_info[0]['PARENT_ID'],$category['ROOT_ID']))) {echo "selected=\"selected\"";} ?> class="text-success bold large" value="<?= $category['ROOT_ID'] ?>"><?= $category['ROOT_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($category_info[0]['PARENT_ID'],$category['DOWN1_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN1_ID'] ?>"><?php if ($category['DOWN1_NAME'] != null) echo ' > ' . $category['DOWN1_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($category_info[0]['PARENT_ID'],$category['DOWN2_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN2_ID'] ?>"><?php if ($category['DOWN2_NAME'] != null) echo '  >> ' . $category['DOWN2_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($category_info[0]['PARENT_ID'],$category['DOWN3_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN3_ID'] ?>"><?php if ($category['DOWN3_NAME'] != null) echo '   >>> ' . $category['DOWN3_NAME'] ?></option>
                                                        <?php } else { ?>
                                                            <option <?php if (!(strcmp($category_info[0]['PARENT_ID'],$category['DOWN1_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN1_ID'] ?>"><?php if ($category['DOWN1_NAME'] != null) echo ' > ' . $category['DOWN1_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($category_info[0]['PARENT_ID'],$category['DOWN2_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN2_ID'] ?>"><?php if ($category['DOWN2_NAME'] != null) echo '  >> ' . $category['DOWN2_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($category_info[0]['PARENT_ID'],$category['DOWN3_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN3_ID'] ?>"><?php if ($category['DOWN3_NAME'] != null) echo '   >>> ' . $category['DOWN3_NAME'] ?></option>  
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-success" onclick="update_category()">حفظ التعديلات</button>
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
                checkType();
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

            function update_category() {
                var parentID;
                if ($("input:radio[name=category_type]:checked").val() == 'main') {
                    parentID = 0;
                }else {parentID = $('#parent_id').val();}
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "categories/do_update_category/"; ?>',
                        data: {
                            category_id: '<?= $category_info[0]['CATEGORY_ID'] ?>',
                            category_name: $('#category_name').val(),
                            category_description: $('#category_description').val(),
                            parent_id: parentID
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
            }
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>