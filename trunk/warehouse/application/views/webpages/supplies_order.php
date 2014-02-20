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

        <link href="<?php echo base_url(); ?>resource/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>resource/css/jquery-ui.css" rel="stylesheet">
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
                                    <a href="#">إدارة الأصناف</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">طلب لوازم</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>نموذج طلب لوازم</h4>
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
                                        <!-- START VOUCHER NUMBER INFO -->
                                        <div class="well left_info">
                                            <label class="control-label">رقم الطلب</label>
                                            <input readonly type="text" id="order_number" class="input-small" />
                                            <button type="button" class="btn btn-success" onclick="get_order_number()">طلب جديد</button>
                                        </div>
                                        <!-- END VOUCHER NUMBER INFO -->
                                        <div class="control-group">
                                            <label class="control-label">إسم الصنف</label>
                                            <div class="controls">
                                                <input type="text" id="product_id" placeholder="البحث عن اسم الصنف أو رقمة" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">الجهة الطالبة</label>
                                            <div class="controls">
                                                <input type="text" id="provided_from" class="span6" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">الكمية المطلوبة</label>
                                            <div class="controls">
                                                <select class="span3" id="unit_type" name="unit_type" data-placeholder="الوحدة" tabindex="1">
                                                    <option value="">إختيار</option>
                                                </select>
                                                <input type="text" id="quantity" placeholder="الكمية بالأرقام" class="input-medium" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">ملاحـظات</label>
                                            <div class="controls">
                                                <textarea id="notes" class="span6 " rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <!--<button type="button" class="btn btn-success" onclick="next_product()">التالي</button>-->
                                            <button type="button" class="btn btn-success" onclick="supply_order()">إرسال</button>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/js/jquery-ui.js"></script>
        <script>
            var data=new Array();
            var index=0;
            var order_number;
            var provided_from;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
                get_order_number();
            });
  
            $('#product_id').focusout(function() {
                if ($('#product_id').val()) {
                    product_unit_names();
                }
            });

            $('#product_id').autocomplete({source: '<?php echo base_url() . "product/dynamic_product_search/"; ?>', minLength: 2});

            function next_product(){
                var d=new Array();
                d[0]=$('#product_id').val();
                d[1]=$('#provided_from').val();
                d[2]=$('#notes').val();
                d[3]= $('#quantity').val();
                d[4]= $('#unit_type').val();
                d[5]= $('#order_number').val();
                data[index]=d;
                //index++;
                provided_from= $('#provided_from').val();
                $("#add_form").fadeOut().fadeIn();
                $('#reset').click();
                $('#order_number').val(order_number);
            }
            
            
            function supply_order() {
                next_product();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/do_supply_order/"; ?>',
                    data: {supplies_data: JSON.stringify(data)
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json == 1) {
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text('تم إضافة الصنف بنجاح');
                            $('#reset').click();
                            $('#order_number').val(order_number);
                            $('#provided_from').val(provided_from);
                            $('#provided_from').prop('readonly',true);
                        }else{
                            $('#status').addClass('alert alert-error');
                            $('#message').removeClass('alert-success').text("يجب عليك التأكد من البيانات المدخلة");
                        }
                    }, error: function() {
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
                }

            function product_unit_names() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/product_unit_names/"; ?>',
                    data: {
                        product_id: $('#product_id').val()
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json.length != 0) {
                            $('#unit_type').empty().append('<option value=primary>' + json[0]['PRIMARY_UNIT_NAME'] + '</option>');
                            $('#unit_type').append('<option value=secondary>' + json[0]['SECONDARY_UNIT_NAME'] + '</option>').selectmenu('refresh');
                        } else {
                            $('#unit_type').empty().append('<option value=nothing>لا يوجد وحدات مدخلة</option>').selectmenu('refresh');
                        }
                    }
                });
            }
            
            function get_order_number() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/get_order_number/"; ?>',
                    dataType: "json",
                    success: function(json) {
                        $('#order_number').val(json);
                        order_number=json;
                        $('#provided_from').prop('readonly',false).val("");
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