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
                                    <h4><i class="icon-reorder"></i>جدول يحتوي العهد   </h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                <th class="hidden-phone">تاريخ الإدخال</th>
                                                <th class="hidden-phone">تم شراءه من</th>
                                                <th class="hidden-phone">رقم الفاتورة</th>
                                                <th class="hidden-phone">الكمية</th>
                                                <th class="hidden-phone">السعر</th>
                                                <th class="hidden-phone">طبيعة الصنف</th>
                                                <th class="hidden-phone">حالة الصنف</th>
                                                <th class="hidden-phone">المدة الزمنية</th>
                                                <th class="hidden-phone">تاريخ الإنتهاء</th>
                                                <th class="hidden-phone">الرقم التسلسلي</th>
                                                <th class="hidden-phone">ملاحظات</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($product_info as $value) { ?>
                                                <tr class="odd gradeX">
                                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                    <td class="hidden-phone"><?= $value['ADDED_DATE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['COMPANY_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['BILLING_ID'] ?></td>
                                                    <td class="hidden-phone"><?= $value['QUANTITY'] ?><?=' '.$value['UNIT_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['UNIT_PRICE'].' '.$value['CURRENCY_TYPE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['PRODUCT_NATURE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['PRODUCT_STATUS'] ?></td>
                                                    <td class="hidden-phone"><?= $value['SUPPLY_TYPE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['EXPIRE_DATE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['SERIAL_NUMBER'] ?></td>
                                                    <td class="hidden-phone"><?= $value['NOTES'] ?></td>
                                                    <td class="hidden-phone">
                                                        <a href='<?php echo base_url() . "product/update_static_product/" . $value['VOUCHER_ID']; ?>' class="btn mini purple"><i class="icon-edit"></i> تعديل</a>
                                                        <a id="delete" href="javascript:delete_inserted_product(<?= $value['VOUCHER_ID'] ?>)" class="btn mini purple"><i class="icon-trash"></i> حـذف</a>
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
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });

            function delete_inserted_product(voucher_id) {
                $.confirm({
                    text: "<h4>هل أنت متأكد من حذف هذا الإدخال ؟</h4>",
                    confirm: function() {
                        $.ajax({type: "POST",
                            url: '<?php echo base_url() . "product/do_delete_inserted_product/"; ?>',
                            data: {voucher_id: voucher_id},
                            dataType: "json",
                            success: function(json) {
                                var oTable = $('#sample_1').dataTable();
                                var nRow = $('#delete').parents('tr')[0];
                                oTable.fnDeleteRow(nRow);
                            }
                        });
                    }
                });
            }
        </script>
    </body>
    <!-- END BODY -->
</html>
