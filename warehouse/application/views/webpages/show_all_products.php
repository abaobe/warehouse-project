<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>إدارة الأصناف</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url().'resource/css/'.CUSTOM_THEME.'.css'?>" rel="stylesheet" id="style_color" />

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
                                قسم الأصناف
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">قسم الأصناف</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">إدارة الأصناف</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>جدول يحتوي على جميع الأصناف المخزنة</h4>
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
                                    <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th style="width:8px;"></th>
                                                <th class="hidden-phone">رقم الصنف</th>
                                                <th class="hidden-phone">إسم الصنف</th>
                                                <th class="hidden-phone">الوحدة</th>
                                                <th class="hidden-phone">الرصيد الحالي</th>
                                                <th class="hidden-phone">الطول</th>
                                                <th class="hidden-phone">العرض</th>
                                                <th class="hidden-phone">الإرتفاع</th>
                                                <th class="hidden-phone">حد إعادة الطلب</th>
                                                <th class="hidden-phone">نوع الصنف</th>
                                                <th class="hidden-phone">ملاحظات</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products as $value) { ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                    <?php if(!strcmp($value['QUANTITY_STATUS'], 'invisible')) {echo '<i class="icon-eye-close"></i>';}?>
                                                    <?php if(!strcmp($value['QUANTITY_STATUS'], 'visible')) {echo '<i class="icon-eye-open"></i>';}?>
                                                    </td>
                                                    <td><?= $value['PRODUCT_NUMBER'] ?></td>
                                                    <td class="text-info bold"><?= $value['PRODUCT_NAME'] ?></td>
                                                    <td><?= $value['PRIMARY_UNIT_NAME'] ?></td>
                                                    <td><?= $value['PRIMARY_UNIT_QUANTITY'] ?></td>
                                                    <td><?= $value['H_LENGTH'] ?></td>
                                                    <td><?= $value['WIDTH'] ?></td>
                                                    <td><?= $value['HEIGHT'] ?></td>
                                                    <td><?php if($value['PRIMARY_UNIT_QUANTITY'] <= $value['RE_DEMAND_BORDER']){echo'<span class="label label-important">'.$value['RE_DEMAND_BORDER'].'</span>';
                                                              }else if($value['PRIMARY_UNIT_QUANTITY'] <= $value['RE_DEMAND_BORDER'] +$value['RE_DEMAND_BORDER']*0.05) {echo'<span class="label label-warning">'.$value['RE_DEMAND_BORDER'].'</span>';
                                                              }else{echo $value['RE_DEMAND_BORDER'];} ?></td>
                                                    <td>
                                                        <?php if($value['PRODUCT_TYPE'] == '1'){?>
                                                            <span class="text-success bold">مـواد مستهلكة</span>
                                                        <?php }else if($value['PRODUCT_TYPE'] == '2'){?>
                                                            <span class="text-info bold">مواد دائـمة</span>
                                                    <?php }?>
                                                    </td>
                                                    <td><?= substr($value['NOTES'], 0, 10).'...' ?></td>
                                                    <td>
                                                        <?php if(USER_ROLE == ROLE_ONE) {?>
                                                        <a href='<?php echo base_url() . "product/update_product/" . $value['PRODUCT_ID']; ?>' class="btn mini purple"><i class="icon-edit"></i> تعديل</a>
                                                        <a href="#" onclick="delete_product(<?= $value['PRODUCT_ID'] ?>,this);return false;" class="btn mini purple"><i class="icon-trash"></i> حـذف</a>
                                                        <?php }?>
                                                        <?php if($value['PRODUCT_TYPE'] == 1){ ?>
                                                            <a href='<?php echo base_url() . "product/inserted_temp_prod/" . $value['PRODUCT_ID']; ?>' class="btn mini purple small"><i class="icon-th-list"> حركات الصنف</i></a>
                                                        <?php } else if($value['PRODUCT_TYPE'] ==2){?>    
                                                            <a href='<?php echo base_url() . "product/inserted_static_prod/" . $value['PRODUCT_ID']; ?>' class="btn mini purple small"><i class="icon-th-list"> حركات الصنف</i></a>
                                                        <?php }?>
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

            function delete_product(product_id,current) {
                $.confirm({
                    text: "<h4>هل أنت متأكد من حذف هذا الصنف ؟</h4>",
                    confirm: function() {
                        $.ajax({type: "POST",
                            url: '<?php echo base_url() . "product/do_delete_product/"; ?>',
                            data: {product_id: product_id},
                            dataType: "json",
                            success: function(json) {
                                if (json['status'] == true) {
                                    $(current).parents('tr').remove();
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
                });
            }
        </script>
    </body>
    <!-- END BODY -->
</html>
