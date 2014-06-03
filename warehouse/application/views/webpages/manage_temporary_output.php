<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>إدارة المواد المخرجة مؤقتا</title>
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
        <link href="<?php echo base_url(); ?>resource/assets/custombox/reveal.css" type="text/css" rel="stylesheet">	
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
                                <li><a href="#">إدارة المواد المخرجة مؤقتا</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>جدول يحتوي المواد المخرجة مؤقتا </h4>
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
                                                <th class="hidden-phone">إسم الصنف</th>
                                                <th class="hidden-phone">الرقم التسلسلي</th>
                                                <th class="hidden-phone">تاريخ إخراج الصنف</th>
                                                <th class="hidden-phone">تم شراءه من</th>
                                                <th class="hidden-phone">الشركة المرسل لها الصنف</th>
                                                <th class="hidden-phone">الحالة قبل الإخراج</th>
                                                <th class="hidden-phone">أسباب الإخراج</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($products as $value) { ?>
                                                <tr class="odd gradeX">
                                                    <td class="hidden-phone"><?= $value['PRODUCT_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['SERIAL_NUMBER'] ?></td>
                                                    <td class="hidden-phone"><?= $value['ADDED_DATE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['COMPANY_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['SEND_TO'] ?></td>
                                                    <td class="hidden-phone"><?= $value['PRODUCT_STATUS'] ?></td>
                                                    <td class="hidden-phone" title="<?=$value['REASONS']?>"><?= substr($value['REASONS'], 0, 50).'...' ?></td>
                                                    <td class="hidden-phone">
                                                        <?php if(USER_ROLE == ROLE_ONE) { ?>
                                                        <a class="btn mini purple" onclick="accept(this)" voucher_id="<?= $value['VOUCHER_ID'] ?>"><i class="icon-ok"></i> تأكيد الإستلام</a>
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
                    <!-- START MODAL FORM -->
                    <div id="myModal" class="reveal-modal medium">
                        <a class="close-reveal-modal">&#215;</a>
                        <div class="widget">
                            <form method="POST" id="add_form" onsubmit="return false;" class="form-horizontal">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i>معلومات حالة الصنف بعد الإرجاع</h4>
                            </div>
                            <div class="widget-body" id="orderInfo">

                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- END MODAL FORM -->
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/custombox/jquery.reveal.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/jquery.confirm.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });
            
            var parent;
            function accept(current){
                parent = current;
                var fields = '<div class="control-group">'+
                '<label class="control-label">حالة الصنف</label>'+
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
                    '<button type="button" class="btn btn-success" onclick="acceptOutputProduct()">حـفظ</button>'+
                    '</div>'+
                '</div>';
                $('#orderInfo').html(fields);
                $('#myModal').reveal();
            }
            
            function acceptOutputProduct(){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/acceptOutputProduct/"; ?>',
                    data: {
                         product_status: $('#product_status').val(),
                         voucher_id: $(parent).attr('voucher_id')
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json['status'] == true) {
                            $('#myModal').trigger('reveal:close');
                            $('#status').removeClass().addClass('alert alert-success');
                            $('#message').html(json['msg']);
                            $(parent).parents('tr').remove();
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
    </body>
    <!-- END BODY -->
</html>
