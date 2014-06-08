<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>تدقيق العهد</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'resource/css/'.CUSTOM_THEME.'.css'?>" type="text/css" rel="stylesheet"/>

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
                                قسم الأصناف
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">قسم التقارير</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">مستند العهد المرجعة</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>جدول يحتوي على العهد التي تم إرجاعها</h4>
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
                                                <th style="width:8px;" >#</th>
                                                <th class="hidden-phone">إسم الصنف</th>
                                                <th class="hidden-phone">الرقم التسلسلي</th>
                                                <th class="hidden-phone">إسم الإدارة</th>
                                                <th class="hidden-phone">إسم الدائرة</th>
                                                <th class="hidden-phone">إسم القسم</th>
                                                <th class="hidden-phone">الحالة عند الإرجاع</th>
                                                <th class="hidden-phone">تاريخ الإستعارة</th>
                                                <th class="hidden-phone">تاريخ الإرجاع</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                            foreach ($returns as $value) { ?>
                                                <tr class="odd gradeX" voucher_id="<?= $value['VOUCHER_ID'] ?>">
                                                    <td><?=$i?></td>
                                                    <td class="text-info bold"><?= $value['PRODUCT_NAME'] ?></td>
                                                    <td><?= $value['SERIAL_NUMBER'] ?></td>
                                                    <td class="text-info bold"><?= $value['DEPARTMENT_NAME'] ?></td>
                                                    <td class="text-info bold"><?= $value['MAIN_DEPARTMENT'] ?></td>
                                                    <td><?= $value['SECTION_NAME'] ?></td>
                                                    <td><?= $value['PRODUCT_STATUS'] ?></td>
                                                    <td><?= $value['ADDED_DATE'] ?></td>
                                                    <td class="text-error bold"><?= $value['RETURN_DATE'] ?></td>
                                                    <td>
                                                        <button onclick="print_(this)" class="btn btn-success" ><i class="icon-print"> </i> طباعة </button>
                                                    </td>
                                                </tr>
                                            <?php $i++;} ?>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/custombox/jquery.reveal.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });
            
            function print_(current){
                //alert($(current).parents('tr').attr('order_number'));
                $.ajax({
                        url: '<?php echo base_url() . "reports/vouchers_backing/"; ?>',
                        data: {
                            voucher_id: $(current).parents('tr').attr('voucher_id')
                        },
                        success: function(data) {
                            //alert(data[0]);
                            //$('#modal').html(data);
                            //$('#hide_header').hide();
                        }
                    });
            }
        </script>
    </body>
    <!-- END BODY -->
</html>
