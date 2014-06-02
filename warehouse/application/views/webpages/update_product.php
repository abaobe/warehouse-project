<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>تعديل بيانات الصنف</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
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
                                قسم الأصناف
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">قسم الأصناف</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">إدارة الأصناف</a><span class="divider">&nbsp;</span></li>
                                <li><a href="#">تعديل بيانات الصنف</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>يمكنك تعديل بيانات الصنف</h4>
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
                                        <input type="hidden" value="<?=$product_info[0]['PRODUCT_ID']?>" id="product_id" pclass="span6 " />
                                        <div class="control-group">
                                            <label class="control-label">إسم الصنف</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['PRODUCT_NAME']?>" id="product_name" pclass="span6 " />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الصنف</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['PRODUCT_NUMBER']?>" id="product_number" class="span6 " />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">نـوع الصنف</label>
                                            <div class="controls">
                                                <select class="span6" id="product_type" name="product_type" data-placeholder="Choose a Category" tabindex="1">
                                                    <option <?php if (!(strcmp($product_info[0]['PRODUCT_TYPE'],"مواد مستهلكة"))) {echo "selected=\"selected\"";} ?> value="1">مواد مستهلكة</option>
                                                    <option <?php if (!(strcmp($product_info[0]['PRODUCT_TYPE'],'مواد ثابتة'))) {echo "selected=\"selected\"";} ?> value="2">مواد معمرة</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">وحدة أساسية</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['PRIMARY_UNIT_NAME']?>" id="primary_unit_name" placeholder="إسم الوحده" class="input-medium" />
                                                <input type="text" value="<?=$product_info[0]['PRIMARY_UNIT_QUANTITY']?>" id="primary_unit_quantity" placeholder="الكمية بالأرقام" class="input-medium" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">وحدة ثانوية</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['SECONDARY_UNIT_NAME']?>" id="secondary_unit_name" placeholder="إسم الوحده" class="input-medium" />
                                                <input type="text" value="<?=$product_info[0]['SECONDARY_UNIT_QUANTITY']?>" id="secondary_unit_quantity" placeholder="الكمية بالأرقام" class="input-medium" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">مقاسات الصنف</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['H_LENGTH']?>" id="h_length" placeholder="الطول" class="input-small" />
                                                <input type="text" value="<?=$product_info[0]['WIDTH']?>" id="width" placeholder="العرض" class="input-small" />
                                                <input type="text" value="<?=$product_info[0]['HEIGHT']?>" id="height" placeholder="الإرتفاع" class="input-small" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">هل تريد إظهار الكمية للدوائر</label>
                                            <div class="controls">
                                                <label class="radio">
                                                    <input type="radio" name="quantity_status" id="quantity_status" value="visible" <?php if(!strcmp($product_info[0]['QUANTITY_STATUS'], 'visible')) echo 'checked'?>/>
                                                    إظهار
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="quantity_status" id="quantity_status" value="invisible" <?php if(!strcmp($product_info[0]['QUANTITY_STATUS'], 'invisible')) echo 'checked'?>/>
                                                    إخفاء
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">حد إعادة الطلب</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['RE_DEMAND_BORDER']?>" id="re_demand_border" class="input-medium" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">الفئة التي ينتمي إليها</label>
                                            <div class="controls">
                                                <select id="category_id" class="span6 chosen" data-placeholder="الفئة التي ينتمي إليها" tabindex="1">
                                                    <?php
                                                    $current_main = "";
                                                    foreach ($categories as $category) {
                                                        if ($current_main != $category['ROOT_NAME']) {
                                                            $current_main = $category['ROOT_NAME'];
                                                            ?>
                                                            <option <?php if (!(strcmp($product_info[0]['CATEGORY_ID'],$category['ROOT_ID']))) {echo "selected=\"selected\"";} ?> class="text-success bold large" value="<?= $category['ROOT_ID'] ?>"><?= $category['ROOT_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($product_info[0]['CATEGORY_ID'],$category['DOWN1_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN1_ID'] ?>"><?php if ($category['DOWN1_NAME'] != null) echo ' > ' . $category['DOWN1_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($product_info[0]['CATEGORY_ID'],$category['DOWN2_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN2_ID'] ?>"><?php if ($category['DOWN2_NAME'] != null) echo '  >> ' . $category['DOWN2_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($product_info[0]['CATEGORY_ID'],$category['DOWN3_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN3_ID'] ?>"><?php if ($category['DOWN3_NAME'] != null) echo '   >>> ' . $category['DOWN3_NAME'] ?></option>
                                                        <?php } else { ?>
                                                            <option <?php if (!(strcmp($product_info[0]['CATEGORY_ID'],$category['DOWN1_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN1_ID'] ?>"><?php if ($category['DOWN1_NAME'] != null) echo ' > ' . $category['DOWN1_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($product_info[0]['CATEGORY_ID'],$category['DOWN2_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN2_ID'] ?>"><?php if ($category['DOWN2_NAME'] != null) echo '  >> ' . $category['DOWN2_NAME'] ?></option>
                                                            <option <?php if (!(strcmp($product_info[0]['CATEGORY_ID'],$category['DOWN3_ID']))) {echo "selected=\"selected\"";} ?> value="<?= $category['DOWN3_ID'] ?>"><?php if ($category['DOWN3_NAME'] != null) echo '   >>> ' . $category['DOWN3_NAME'] ?></option>  
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">ملاحـظات</label>
                                            <div class="controls">
                                                <textarea id="notes" class="span6 " rows="3"><?=$product_info[0]['NOTES']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-success" onclick="update_product()">حفظ التعديلات</button>
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
        <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });
            function update_product() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/do_update_product/"; ?>',
                    data: {
                        product_id: $('#product_id').val(),
                        product_name: $('#product_name').val(),
                        product_number: $('#product_number').val(),
                        product_type: $('#product_type').val(),
                        notes: $('#notes').val(),
                        category_id: $('#category_id').val(),
                        width: $('#width').val(),
                        height: $('#height').val(),
                        h_length: $('#h_length').val(),
                        re_demand_border: $('#re_demand_border').val(),
                        primary_unit_name: $('#primary_unit_name').val(),
                        secondary_unit_name: $('#secondary_unit_name').val(),
                        primary_unit_quantity: $('#primary_unit_quantity').val(),
                        secondary_unit_quantity: $('#secondary_unit_quantity').val(),
                        quantity_status: $('input[name="quantity_status"]:checked').val()
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