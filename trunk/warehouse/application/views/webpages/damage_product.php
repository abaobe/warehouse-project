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
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_default.css" rel="stylesheet" id="style_color" />

        <link href="<?php echo base_url(); ?>resource/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link  href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
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
                                    <h4><i class="icon-reorder"></i>جدول يحتوي على جميع الأصناف التالفة</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <!-- Start Alert Message -->
                                    <div id="status" class="alert">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <span id="message"></span>
                                    </div>
                                    <!-- End Alert Message -->
                                    <div id="monitor_ways" class="control-group form-horizontal">
                                        <label class="control-label">طرق الإشراف على الإتلاف</label>
                                        <div class="controls">
                                            <input type="text" id="way_1" class="span6 " />
                                            <button id="more" class="btn btn-info"><i class="icon-plus icon-white"></i> مزيد</button>
                                            <button id="accept" onclick="accept_damage()" class="btn btn-success"><i class="icon-plus icon-ok"></i> إعتماد</button>
                                        </div>
                                        <br/>
                                    </div>
                                    <div>
                                        <table class="table table-striped table-bordered" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th style="width:8px;"></th>
                                                    <th class="hidden-phone">رقم الصنف</th>
                                                    <th class="hidden-phone">إسم الصنف</th>
                                                    <th class="hidden-phone">الرقم التسلسلي</th>
                                                    <th class="hidden-phone">إسم المحكمة</th>
                                                    <th class="hidden-phone">إسم الدائرة</th>
                                                    <th class="hidden-phone">تاريخ الإرجاع</th>
                                                    <th class="hidden-phone">طول</th>
                                                    <th class="hidden-phone">عرض</th>
                                                    <th class="hidden-phone">إرتفاع</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($products as $value) { ?>
                                                    <tr class="odd gradeX">
                                                        <td><input type="checkbox" index="<?= $i ?>" onclick="addToDamage(this,<?= $value['VOUCHER_ID'] ?>)" class="checkboxes" /></td>
                                                        <td><?= $value['PRODUCT_NUMBER'] ?></td>
                                                        <td class="text-info bold"><?= $value['PRODUCT_NAME'] ?></td>
                                                        <td><?= $value['SERIAL_NUMBER'] ?></td>
                                                        <td><?= $value['MAIN_DEPARTMENT'] ?></td>
                                                        <td><?= $value['DEPARTMENT_NAME'] ?></td>
                                                        <td><?= $value['RETURN_DATE'] ?></td>
                                                        <td><?= $value['H_LENGTH'] ?></td>
                                                        <td><?= $value['WIDTH'] ?></td>
                                                        <td><?= $value['HEIGHT'] ?></td>
                                                    </tr>
                                                 <?php $i++;} ?>
                                            </tbody>
                                        </table>
                                    </div>
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
        <script>
            var vouchers = new Array();
            var count = 2;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });

            $('#more').click(function() {
                var new_way = '<div class="control-group"><div class="controls"><input type="text" class="span6" id="way_' + count + '"/></div></div>';
                $('#monitor_ways').append(new_way);
                count++;
            });

            function addToDamage(current, voucherID) {
                if ($(current).is(':checked'))
                    vouchers[$(current).attr('index')] = voucherID;
                else
                    vouchers.splice($(current).attr('index'), 1);
            }

            function accept_damage() {
                var monitor_ways = "";
                var vouchersID = "," + vouchers;
                for (var i = 1; i < count; i++) {
                    if ($("#way_" + i).val() != null || $("#sub_" + i).val() != '')
                        monitor_ways += $("#way_" + i).val() + ',';
                }
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/accept_damage/"; ?>',
                    data: {
                        vouchers: vouchersID,
                        monitor_ways: monitor_ways
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json == 1) {
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text("تم الإعتماد بنجاح");
                            $('#reset').click();
                            vouchers = [];
                            vouchers.length = 0;
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
