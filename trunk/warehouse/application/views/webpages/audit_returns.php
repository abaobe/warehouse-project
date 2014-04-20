<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Data Tables</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_default.css" type="text/css" rel="stylesheet"/>

        <link href="<?php echo base_url(); ?>resource/assets/fancybox/source/jquery.fancybox.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>resource/assets/data-tables/DT_bootstrap.css" type="text/css" rel="stylesheet">	
        <link href="<?php echo base_url(); ?>resource/assets/custombox/reveal.css" type="text/css" rel="stylesheet">	
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>
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
                                Data Tables
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">Components</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">Data Tables</a><span class="divider-last">&nbsp;</span></li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->          
                    <!-- BEGIN ADVANCED TABLE widget-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>جدول يحتوي على الأصناف المعارة</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <!-- Start Alert Message -->
                                <div id="status" class="alert">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <span id="message"></span>
                                </div>
                                <!-- End Alert Message -->
                                <div class="widget-body">
                                    <table class="table table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th style="width:8px;" ><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                <th class="hidden-phone">إسم الصنف</th>
                                                <th class="hidden-phone">الرقم التسلسلي</th>
                                                <th class="hidden-phone">إسم الإدارة</th>
                                                <th class="hidden-phone">إسم الدائرة</th>
                                                <th class="hidden-phone">إسم القسم</th>
                                                <th class="hidden-phone">الحالة عند الإستعارة</th>
                                                <th class="hidden-phone">تاريخ الإستعارة</th>
                                                <th class="hidden-phone">تاريخ الإرجاع</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($returns as $value) { ?>
                                                <tr class="odd gradeX">
                                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                    <td class="text-info bold"><?= $value['PRODUCT_NAME'] ?></td>
                                                    <td><?= $value['SERIAL_NUMBER'] ?></td>
                                                    <td class="text-info bold"><?= $value['DEPARTMENT_NAME'] ?></td>
                                                    <td class="text-info bold"><?= $value['MAIN_DEPARTMENT'] ?></td>
                                                    <td><?= $value['SECTION_NAME'] ?></td>
                                                    <td><?= $value['PRODUCT_STATUS'] ?></td>
                                                    <td><?= $value['ADDED_DATE'] ?></td>
                                                    <td class="text-error bold"><?= $value['RETURN_DATE'] ?></td>
                                                    <td>
                                                        <?php if ($value['ORDER_STATUS'] == 'active') { ?>
                                                            <a class="btn mini purple" onclick="borrowing_info(this)" voucher_id="<?= $value['VOUCHER_ID'] ?>"><i class="icon-eye-open"></i> عـرض</a>
                                                            <button class="btn mini purple" onclick="return_borrow(this)" voucher_id="<?= $value['VOUCHER_ID'] ?>"><i class="icon-envelope-alt"></i> رسالة</button>
                                                        <?php } else if ($value['ORDER_STATUS'] == 'inactive') { ?>
                                                            <a class="btn mini purple" onclick="accept(this)" voucher_id="<?= $value['VOUCHER_ID'] ?>"><i class="icon-ok"></i> تأكيد الإستلام</a>
                                                            <a class="btn mini purple" onclick="borrowing_info(this)" voucher_id="<?= $value['VOUCHER_ID'] ?>"><i class="icon-eye-open"></i> عـرض</a>
                                                            <button class="btn mini purple" onclick="extend_date(this)" voucher_id="<?= $value['VOUCHER_ID'] ?>"><i class="icon-retweet"></i> تمديد الوقت</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                    </div>
                    <!-- END ADVANCED TABLE widget-->
                    <!-- END PAGE CONTENT-->
                    <div id="extend_date" class="hide">
                        <div class="control-group">
                            <label class="control-label">وقت الإرجاع الجديد</label>
                            <div class="controls">
                                <div class="input-append date date-picker" data-date="" data-date-format="yyyy/mm/dd" data-date-viewmode="years">
                                    <input id="new_return_date" class="span10 m-ctrl-medium date-picker" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="button" class="btn btn-success" onclick="do_extendDate()">حـفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->
            <!-- START MODAL FORM -->
            <div id="myModal" class="reveal-modal medium">
                <a class="close-reveal-modal">&#215;</a>
                <div class="widget">
                    <form method="POST" id="add_form" onsubmit="return false;" class="form-horizontal">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>طلب لوازم</h4>
                    </div>
                    <div class="widget-body" id="orderInfo">
                        
                    </div>
                    </form>
                </div>
            </div>
            <!-- END MODAL FORM -->
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/data-tables/DT_bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/custombox/jquery.reveal.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });
            
            $('.date-picker').datepicker({
                format: "yyyy/mm/dd"
            });
            
            var parent;
            function accept(current){
                parent = current;
                var fields = '<div class="control-group">'+
                '<label class="control-label">حالة العهدة</label>'+
                    '<div class="controls">'+
                        '<select class="span12" id="product_status">'+
                        '<option value="جديدة">جديدة</option>'+
                        '<option value="مستخدمة جيدة">مستخدمة جيدة</option>'+
                        '<option value="تالفه">تالفه</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="control-group">'+
                    '<div class="controls">'+
                    '<button type="button" class="btn btn-success" onclick="changeProductStatus()">حـفظ</button>'+
                    '</div>'+
                '</div>';
                $('#orderInfo').html(fields);
                $('#myModal').reveal();
            }
            
            function changeProductStatus(){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/changeProdStatus/"; ?>',
                    data: {
                         product_status: $('#product_status').val(),
                         voucher_id: $(parent).attr('voucher_id'),
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json == 1) {
                            $('#myModal').trigger('reveal:close');
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text("تـم تأكيد الإستلام وتعديل حالة الصنف");
                            $(parent).parent().remove();
                        } else {
                            $('#status').addClass('alert alert-error');
                            $('#message').removeClass('alert-success').text("يجب عليك التأكد من البيانات المدخلة");
                        }
                    }, error: function() {
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
            }
            
            function borrowing_info(current){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/borrowing_info/"; ?>',
                    data: {
                         voucher_id: $(current).attr('voucher_id')
                    },
                    dataType: "json",
                    success: function(json) {
                        var names = ['إسم الصنف','الرقم التسلسلي','الجهة','إسم القسم','تاريخ الإستعارة','تاريخ الإرجاع','إسم الموظف/رقمة','رقم الغرفة','حالة الصنف الحالية','عنوان الجهه','رقم الهاتف'];
                        var values = [json[0].PRODUCT_NAME,json[0].SERIAL_NUMBER,json[0].DEPARTMENT_NAME,json[0].SECTION_NAME,json[0].ADDED_DATE,json[0].RETURN_DATE,json[0].EMPLOYEE_NAME+'  '+json[0].EMPLOYEE_NUMBER,
                                    json[0].ROOM_NUMBER,json[0].PRODUCT_STATUS,
                                    json[0].ADDRESS,json[0].PHONE];
                                var fields = '<div class="control-group">';
                        for(var i=0; i<names.length;i++){
                            var val="غير مدخل";
                            if(values[i] != null){val= values[i];}
                            fields += '<label class="control-label">'+names[i]+'</label>'+
                                    '<div class="controls">'+
                                        '<label class="control-label">'+val+'</label>'+
                                    '</div>';
                        }
                        fields += '</div>';
                            $('#orderInfo').html(fields);
                        $('#myModal').reveal();
                    }, error: function() {
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
            }
            
            function extend_date(current){
                parent = current;
                $('#orderInfo').html($('#extend_date').show());
                $('#myModal').reveal();
            }
            
            function do_extendDate(){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/extend_date/"; ?>',
                    data: {
                         new_return_date: $('#new_return_date').val(),
                         voucher_id: $(parent).attr('voucher_id'),
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json == 1) {
                            $('#myModal').trigger('reveal:close');
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text("تـم تأكيد الإستلام وتعديل حالة الصنف");
                            $(parent).parent().empty();
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
    </body>
    <!-- END BODY -->
</html>
