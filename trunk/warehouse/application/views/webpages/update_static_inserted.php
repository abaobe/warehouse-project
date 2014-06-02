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
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_default.css" rel="stylesheet" id="style_color" />
        <link href="<?php echo base_url(); ?>resource/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resource/assets/bootstrap-datepicker/css/datepicker.css" />
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
                                    <h4><i class="icon-reorder"></i>يمكنك تعديل بيانات الإدخال الخاصة بهذا الصنف</h4>
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
                                            <label class="control-label">إسم الصنف</label>
                                            <div class="controls">
                                                <input type="text" readonly="" value="<?=$product_info[0]['PRODUCT_NAME']?>" id="product_id" class="span6" />
                                                <input type="hidden" id="voucher_id" value="<?=$product_info[0]['VOUCHER_ID']?>" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">إستلمت من</label>
                                            <div class="controls">
                                                <select id="received_from" class="chosen" placeholder="إستلمت من" tabindex="1">
                                                    <?php foreach ($companies as $company) {?>
                                                        <option <?php if($company['COMPANY_ID'] == $product_info[0]['RECEIVED_FROM']){echo 'selected';}?> value="<?=$company['COMPANY_ID']?>"><?=$company['COMPANY_NAME']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">الرقم التسلسلي</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['SERIAL_NUMBER']?>" id="serial_number" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الفاتورة</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['BILLING_ID']?>" id="billing_id" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">حالة العهدة</label>
                                            <div class="controls">
                                                <select id="product_status" name="product_status">
                                                    <option <?php if($product_info[0]['PRODUCT_STATUS'] == 'جديدة'){echo 'selected';}?> value="جديدة">جديدة</option>
                                                    <option <?php if($product_info[0]['PRODUCT_STATUS'] == 'مستخدمة جيدة'){echo 'selected';}?> selected value="مستخدمة جيدة">مستخدمة جيدة</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">طبيعة التوريد</label>
                                            <div class="controls">
                                                <select id="product_nature" name="product_nature">
                                                    <option <?php if($product_info[0]['PRODUCT_NATURE'] == 'مستأجرة'){echo 'selected';}?> value="مستأجرة">مستأجرة</option>
                                                    <option <?php if($product_info[0]['PRODUCT_NATURE'] == 'مستعارة'){echo 'selected';}?> value="مستعارة">مستعارة</option>
                                                    <option <?php if($product_info[0]['PRODUCT_NATURE'] == 'مشتراه'){echo 'selected';}?> value="مشتراه">مشتراه</option>
                                                    <option <?php if($product_info[0]['PRODUCT_NATURE'] == 'منح/هبات'){echo 'selected';}?> value="منح/هبات">منح/هبات</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">وقت الإرجاع</label>
                                            <div class="controls">
                                                <select id="supply_type" name="supply_type">
                                                    <option <?php if($product_info[0]['SUPPLY_TYPE'] == 'مؤقتة'){echo 'selected';}?> value="مؤقتة">مؤقتة</option>
                                                    <option <?php if($product_info[0]['SUPPLY_TYPE'] == 'دائمة'){echo 'selected';}?> value="دائمة">دائمة</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">تاريخ الإرجاع</label>
                                            <div class="controls">
                                                <div class="input-append date date-picker" data-date="" data-date-format="yyyy/mm/dd" data-date-viewmode="years">
                                                    <input id="expire_date" value="<?=$product_info[0]['EXPIRE_DATE']?>" class="m-ctrl-medium date-picker" size="16" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">الكمية المضافة</label>
                                            <div class="controls">
                                                <select class="span3" id="unit_type" name="unit_type" data-placeholder="الوحدة" tabindex="1">
                                                    <?php if($product_info[0]['PRIMARY_UNIT_NAME'] != ''){?>
                                                    <option <?php if($product_info[0]['UNIT_TYPE'] == 'primary'){echo 'selected';}?> value="primary"><?=$product_info[0]['PRIMARY_UNIT_NAME']?></option>
                                                    <?php }if($product_info[0]['PRIMARY_UNIT_NAME'] != ''){?>
                                                    <option <?php if($product_info[0]['UNIT_TYPE'] == 'secondary'){echo 'selected';}?> value="secondary"><?=$product_info[0]['SECONDARY_UNIT_NAME']?></option>
                                                    <?php }?>
                                                </select>
                                                <input type="text" value="<?=$product_info[0]['QUANTITY']?>" id="quantity" placeholder="الكمية بالأرقام" class="input-medium" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">سعر الوحدة</label>
                                            <div class="controls">
                                                <input type="text" value="<?=$product_info[0]['UNIT_PRICE']?>" id="unit_price" placeholder="سعر الوحدة" class="input-medium" />
                                                <select class="span2" id="currency_type" name="currency_type" data-placeholder="الوحدة" tabindex="1">
                                                    <option <?php if($product_info[0]['CURRENCY_TYPE'] == 'أغورة'){echo 'selected';}?> value="أغورة">أغورة</option>
                                                    <option <?php if($product_info[0]['CURRENCY_TYPE'] == 'شيكل'){echo 'selected';}?> value="شيكل">شيكل</option>
                                                    <option <?php if($product_info[0]['CURRENCY_TYPE'] == 'دولار'){echo 'selected';}?> value="دولار">دولار</option>
                                                    <option <?php if($product_info[0]['CURRENCY_TYPE'] == 'دينار'){echo 'selected';}?> value="دينار">دينار</option>
                                                    <option <?php if($product_info[0]['CURRENCY_TYPE'] == 'يورو'){echo 'selected';}?> value="شيكل">يورو</option>
                                                </select>
                                                <input readonly type="text" id="total_cost" placeholder="التكلفة الكلية" class="input-mini"/>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });

            $('.date-picker').datepicker({
                format: "yyyy/mm/dd"
            });

            $('#total_cost').click(function() {
                if ($('#quantity').val() && $('#unit_price').val()) {
                    $(this).val($('#quantity').val() * $('#unit_price').val());
                }
            });
            
            function update_product() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/do_update_inserted_static_product/"; ?>',
                    data: {
                        voucher_id: $('#voucher_id').val(),
                        received_from: $('#received_from').val(),
                        billing_id: $('#billing_id').val(),
                        notes: $('#notes').val(),
                        quantity: $('#quantity').val(),
                        unit_type: $('#unit_type').val(),
                        unit_price: $('#unit_price').val(),
                        currency_type: $('#currency_type').val(),
                        product_status: $('#product_status').val(),
                        product_nature: $('#product_nature').val(),
                        supply_type: $('#supply_type').val(),
                        expire_date: $('#expire_date').val(),
                        serial_number: $('#serial_number').val()
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