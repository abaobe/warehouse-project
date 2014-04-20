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
                                <div class="widget-body">
                                    <div class="row-fluid">
                                        <div class="widget-body span12">
                                            <div class="span8">
                                                <table id="products" class="table table-hover table-bordered hide">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>إسم الصنف</th>
                                                            <th>الوحدة</th>
                                                            <th>الكمية المطلوبة</th>
                                                            <th>ملاحظات</th>
                                                            <th>حذف</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="added_products">
                                                        <tr>
                                                            <td colspan="6"><button type="button" id="final_add" class="btn btn-success" onclick="supply_order()">إعتماد نهائي</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- START VOUCHER NUMBER INFO -->
                                            <div class="well span3">
                                                <label class="control-label">رقم الطلب</label>
                                                <div class="controls form-horizontal">
                                                    <input readonly form="anyThing" type="text" id="order_number" class="span7" />
                                                    <button type="button" class="btn btn-success" onclick="get_order_number()">طلب جديد</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END VOUCHER NUMBER INFO -->
                                    </div>
                                    <div class="widget-body">
                                        <!-- Start Alert Message -->
                                        <div id="status" class="alert">
                                            <button class="close" data-dismiss="alert">×</button>
                                            <span id="message"></span>
                                        </div>
                                        <!-- End Alert Message -->
                                        <!-- BEGIN Porducts-->
                                        <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="hidden-phone">رقم الصنف</th>
                                                <th class="hidden-phone">إسم الصنف</th>
                                                <th class="hidden-phone">الوحدة</th>
                                                <th class="hidden-phone">الرصيد الحالي</th>
                                                <th class="hidden-phone">الطول</th>
                                                <th class="hidden-phone">العرض</th>
                                                <th class="hidden-phone">الإرتفاع</th>
                                                <th class="hidden-phone">الكمية المطلوبة</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products as $value) { ?>
                                                <tr class="odd gradeX ">
                                                    <td><?= $value['PRODUCT_NUMBER'] ?></td>
                                                    <td><?= $value['PRODUCT_NAME'] ?></td>
                                                    <td><?=$value['PRIMARY_UNIT_NAME'] ?></td>
                                                    <td>
                                                        <?php if(!strcmp($value['QUANTITY_STATUS'], 'invisible')) {echo '<span class="label label-info"><i class="icon-eye-close"></i></span>';}?>
                                                        <?php if(!strcmp($value['QUANTITY_STATUS'], 'visible')) {echo $value['PRIMARY_UNIT_QUANTITY'];}?>
                                                    </td>
                                                    <td><?= $value['H_LENGTH'] ?></td>
                                                    <td><?= $value['WIDTH'] ?></td>
                                                    <td><?= $value['HEIGHT'] ?></td>
                                                    <td class="span5">
                                                        <select id="unit_type" class="span5" data-placeholder="الوحدة" tabindex="1">
                                                            <option value="primary"><?= $value['PRIMARY_UNIT_NAME'] ?></option>
                                                            <option value="secondary"><?= $value['SECONDARY_UNIT_NAME'] ?></option>
                                                        </select>
                                                        <input type="text" id="quantity" class="input-mini" data-placeholder="الكمية المطلوبة" />
                                                        <input type="text" id="notes" class="span4" data-placeholder="ملاحظات" />
                                                    </td>
                                                    <td>
                                                        <a href="javascript:add_product(this)" product_id="<?=$value['PRODUCT_ID']?>" product_name="<?=$value['PRODUCT_NAME']?>" class="btn mini purple"><i class="icon-edit"></i> طلب</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                        <!-- END Products-->
                                    </div>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/data-tables/DT_bootstrap.js"></script>
        <script>
            var data = new Array();
            var index = 0;
            var order_number;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
                get_order_number();
            });

            function add_product(current) {
                var product_name= $(current).attr('product_name');
                var unit_name=$(current).parents('tr').children().find($('td #unit_type option:selected')).text();
                var quantity=$(current).parents('tr').children().find($('td #quantity')).val();
                var notes=$(current).parents('tr').children().find($('td #notes')).val();
                
                var d = new Array();
                d[0] = $(current).attr('product_id');
                d[1] = 1;
                d[2] = notes;
                d[3] = quantity;
                d[4] = $(current).parents('tr').children().find($('td #unit_type')).val();
                d[5] = $('#order_number').val();
                data[index] = d;
                
                var product = jQuery('<tr id=' + index + '><td>' + [++index] + '</td><td class="text-info"><b>' + product_name
                        + '</b></td><td>' + unit_name + '</td><td>' + quantity + '</td><td>'
                        + notes + '</td><td><button onclick="remove_row(this)" id="remove" class="btn-danger"><i class="icon-trash"></i></button></td></tr>');
                $('#products').show().fadeOut().fadeIn();
                $('tbody[id^=added_products] > tr:last').before(product);
            }

            function remove_row(current) {
                var x = $(current).parents('tr').attr('id');
                data.splice(x, 1);
                $(current).parents('tr').remove();
            }

            function supply_order() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/do_supply_order/"; ?>',
                    data: {supplies_data: JSON.stringify(data)
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json == 1) {
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text('تم إرسال الطلب بنجاح');
                            $('tbody[id^=added_products]').empty().append('<tr>'
                                    + '<td colspan="6"><button type="button" id="final_add" class="btn btn-success" onclick="supply_order()">إعتماد نهائي</button></td>'
                                    + '</tr>');
                            data = [];
                            data.length = 0;
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

            function get_order_number() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/get_order_number/"; ?>',
                    dataType: "json",
                    success: function(json) {
                        $('#order_number').val(json);
                        order_number = json;
                    }, error: function() {
                        $('#message').text("خطأ في جلب رقم الطلب");
                    }
                });
            }
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>