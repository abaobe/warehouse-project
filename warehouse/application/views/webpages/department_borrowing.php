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
                                                <th class="hidden-phone">الحالة عند الإستعارة</th>
                                                <th class="hidden-phone">تاريخ الإستعارة</th>
                                                <th class="hidden-phone">تاريخ الإرجاع</th>
                                                <th class="hidden-phone">إسم الموظف</th>
                                                <th class="hidden-phone">رقم الغرفة</th>
                                                <th class="hidden-phone">ملاحظات</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($borrowing as $value) { ?>
                                                <tr class="odd gradeX">
                                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                    <td class="hidden-phone"><?= $value['PRODUCT_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['SERIAL_NUMBER'] ?></td>
                                                    <td class="hidden-phone"><?= $value['PRODUCT_STATUS'] ?></td>
                                                    <td class="hidden-phone"><?= $value['ADDED_DATE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['RETURN_DATE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['EMPLOYEE_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['ROOM_NUMBER'] ?></td>
                                                    <td class="hidden-phone"><?= $value['NOTES'] ?></td>
                                                    <td class="hidden-phone">
                                                        <?php if ($value['ORDER_STATUS'] == 'active') { ?>
                                                            <button class="btn mini purple" onclick="return_borrow(this)" voucher_id="<?= $value['VOUCHER_ID'] ?>"><i class="icon-share-alt"></i> إرجاع الصنف</button>
                                                        <?php } else if ($value['ORDER_STATUS'] == 'inactive') { ?>
                                                            <span class="label label-warning"><b>بإنتظـار تأكيد المسؤول</b></span>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/data-tables/DT_bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/jquery.confirm.js"></script>
        <script>
            var order_status;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });

            function return_borrow(current) {
                var voucher_id = $(current).attr('voucher_id');
                $.confirm({
                    text: "<h4>هل تريد إرجاع هذا الصنف ؟</h4>",
                    confirm: function() {
                    $.ajax({type: "POST",
                        url: '<?php echo base_url() . "product/return_borrowing/"; ?>',
                        data: {voucher_id: voucher_id},
                        dataType: "json",
                        success: function(json) {
                            if (json == 1) {
                                $('#status').removeClass('alert-error').addClass('alert alert-success');
                                $('#message').html('<b>تم الطلب بنجاح :  يجب عليك إرجاع هذا الصنف إلى أمين المخزن </b>');
                                $(current).parent().empty().html('<span class="label label-warning"><b>بإنتظـار تأكيد المسؤول</b></span>');
                            } else {
                                $('#status').removeClass().addClass('alert alert-error');
                                $('#message').text("يجب عليك التأكد من البيانات المدخلة");
                            }
                        },complete: function(){
                            App.scrollTo();
                        },error: function() {
                            $('#status').removeClass().addClass('alert alert-error');
                            $('#message').text("هناك خطأ في تخزين البيانات");
                        }
                    });
                    }
                });
            }
        </script>
    </body>
    <!-- END BODY -->
</html>
