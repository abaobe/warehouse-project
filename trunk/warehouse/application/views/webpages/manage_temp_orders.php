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
                                    <h4><i class="icon-reorder"></i>جميع الأصناف الموجودة في طلب: <?= $order_number ?></h4>
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
                                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                <th class="hidden-phone">إسم الصنف</th>
                                                <th class="hidden-phone">حالة الصرف</th>
                                                <th class="hidden-phone">مقدم من</th>
                                                <th class="hidden-phone">الكمية المطلوبة</th>
                                                <th class="hidden-phone">الكمية المتوفرة</th>
                                                <th class="hidden-phone">ملاحظات</th>
                                                <th class="hidden-phone">معلومات الصرف</th>
                                                <th class="hidden-phone">صرف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach ($supplies as $value) { ?>
                                                <tr class="odd gradeX" index='<?=$i?>' orderID='<?=$value['ORDER_ID']?>'>
                                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                    <td class="hidden-phone"><?= $value['PRODUCT_NAME'] ?></td>
                                                    <td class="hidden-phone">
                                                        <?php if($value['STATUS'] == "refuse"){?>
                                                            <span class="label label-important">تم رفضة</span>
                                                        <?php }elseif($value['STATUS'] == "accept"){?>
                                                            <span class="label label-success">تم صرفة</span>
                                                        <?php }if($value['STATUS'] == "waiting"){?>
                                                            <span class="label label-info">بإنتظار الصرف</span>
                                                        <?php }?>
                                                    </td>
                                                    <td class="hidden-phone"><?= $value['DEPARTMENT_NAME'] ?></td>
                                                    <?php if ($value['UNIT_TYPE'] == 'primary') {
                                                            echo '<td class="hidden-phone">'.$value['QUANTITY']." ".$value['PRIMARY_UNIT_NAME'].'</td>';
                                                        } else if ($value['UNIT_TYPE'] == 'secondary') {
                                                            echo '<td class="hidden-phone">'.$value['QUANTITY']." ".$value['SECONDARY_UNIT_NAME'].'</td>';
                                                        }
                                                    ?>
                                                    <td class="hidden-phone"><?php echo $value['PRIMARY_UNIT_NAME'] ." ". $value['PRIMARY_UNIT_QUANTITY'] ?></td>
                                                    <td class="hidden-phone"><?= $value['NOTES'] ?></td>
                                                    <td class="hidden-phone">
                                                        <select class="span4" id="unit_type" name="unit_type" data-placeholder="الوحدة" tabindex="1">
                                                            <option selected value="primary"><?= $value['PRIMARY_UNIT_NAME'] ?></option>
                                                            <option value="secondary" disabled="disabled"><?= $value['SECONDARY_UNIT_NAME'] ?></option>
                                                        </select>
                                                        <input type="text" id="quantity_disbursed" placeholder="الكمية بالأرقام" class="span3" />
                                                        <input type="text" id="notes" placeholder="ملاحظة" class="span5" />
                                                    </td>
                                                    <td class="hidden-phone">
                                                        <button class="btn btn-success" onclick="addToCart(this)"><i class="icon-ok"></i></button>
                                                    </td>
                                                </tr>
                                            <?php ++$i;} ?>
                                        </tbody>
                                    </table>
                                    <div class="form-actions">
                                        <div class='span6'></div>
                                        <button type="button" class="btn btn-success" onclick="supply_order(this)">إعتماد نهائي</button>
                                        <button type="reset" id="reset" class="btn">إلغاء</button>
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
            var info = new Array();
            var index = 0;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });
            
            function addToCart(current){
                var d = new Array();
                d[0] = $(current).parents('tr').attr('orderID');
                d[1] = $(current).parents('tr').children().find($('td #quantity_disbursed')).val();
                d[2] = $(current).parents('tr').children().find($('td #unit_type')).val();
                d[3] = $(current).parents('tr').children().find($('td #notes')).val();
                info[index] = d;
                ++index;
                $(current).parent().empty().append('<button class="btn btn-danger" onclick="undo(this)"><i class="icon-remove"></i></button>');
            }
            
            function undo(current) {
                var x = $(current).parents('tr').attr('index');
                info.splice(x, 1);
                $(current).parent().empty().empty().append('<button class="btn btn-success" onclick="addToCart(this)"><i class="icon-ok"></i></button>');
            }
            
            function supply_order() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/disburse_temp_supplies/"; ?>',
                    data: {disbursed: JSON.stringify(info)
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json == 1) {
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text('تـم الصرف بنجاح');
                            info = [];
                            info.length = 0;
                            index = 0;
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
