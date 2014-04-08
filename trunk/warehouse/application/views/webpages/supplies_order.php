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
                                    <div class="widget-body form" style="overflow-y: auto; height: 600px;">
                                        <!-- Start Alert Message -->
                                        <div id="status" class="alert">
                                            <button class="close" data-dismiss="alert">×</button>
                                            <span id="message"></span>
                                        </div>
                                        <!-- End Alert Message -->
                                        <!-- BEGIN Porducts-->
                                        <div class="accordion" id="accordion1">
                                            <?php
                                            $current_main = "";
                                            $i = 1;
                                            foreach ($categories as $category) {
                                                if ($current_main != $category['ROOT_NAME']) {
                                                    $current_main = $category['ROOT_NAME'];
                                                    ?>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading">
                                                            <a class="accordion-toggle collapsed" onclick="get_productsBy_CatID(this)" category_id="<?= $category['ROOT_ID'] ?>" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?= $i ?>">
                                                                <i class=" icon-plus"></i>
                                                                <?php echo '#' . $i; ?>
                                                                <?= $category['ROOT_NAME'] ?>
                                                            </a>
                                                        </div>
                                                        <div id="collapse_<?= $i ?>" class="accordion-body collapse">
                                                            <div id="products" class="accordion-inner">
                                                                <table class="table table-hover">
                                                                    <tbody id="<?= $category['ROOT_ID'] ?>">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    ++$i;
                                                }
                                            }
                                            ?>
                                        </div>
                                        <!-- END Products-->
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM widget-->
                        </div>
                    </div>
                    <div id="myModal" class="reveal-modal medium">
                        <a class="close-reveal-modal">&#215;</a>
                        <div class="widget" id="orderInfo">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i>طلب لوازم</h4>
                            </div>
                            <div class="widget-body">
                                <form method="POST" id="add_form" onsubmit="return false;" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">إسم الصنف</label>
                                        <div class="controls">
                                            <label id="product_name" class="control-label"></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">الكمية  المطلوبة</label>
                                        <div class="controls">
                                            <select class="span6" id="unit_type" name="unit_type" data-placeholder="الوحدة" tabindex="1">
                                                <option value="">إختيار</option>
                                            </select>
                                            <input type="text" class="span6" id="quantity" placeholder="الكمية بالأرقام" value="" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">الجهة الطالبة</label>
                                        <div class="controls">
                                            <select class="span12" id="department_id" data-placeholder="إختيـار فئة..." tabindex="1">
                                                <option value=""></option>
                                                <?php foreach ($departments as $value) { ?>
                                                    <option value="<?= $value['DEPARTMENT_ID'] ?>"><?= $value['DEPARTMENT_NAME'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">ملاحـظات</label>
                                        <div class="controls">
                                            <textarea id="notes" class="span12 prevent_resize" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="button" class="btn btn-success" onclick="add_product(this)">حـفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/custombox/jquery.reveal.js"></script>
        <script>
            var data = new Array();
            var index = 0;
            var order_number;
            var jsonData;
            var product_id;
            var product_name;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
                get_order_number();
            });

            $('#doOrder').live('click', function(e) {
                e.preventDefault();
                for (var i in jsonData) {
                    var servObj = jsonData[i];
                    if (servObj.PRODUCT_ID === $(this).attr('product_id')) {
                        product_id = servObj.PRODUCT_ID;
                        product_name = servObj.PRODUCT_NAME;
                        $('#product_name').text(servObj.PRODUCT_NAME);
                        $('#unit_type').empty();
                        if (servObj.PRIMARY_UNIT_NAME) {
                            $('#unit_type').append('<option value=primary>' + servObj.PRIMARY_UNIT_NAME + '</option>');
                        }
                        if (servObj.SECONDARY_UNIT_NAME) {
                            $('#unit_type').append('<option value=secondary>' + servObj.SECONDARY_UNIT_NAME + '</option>');
                        }
                        break;
                    }
                }
            });

            function get_productsBy_CatID(current) {
                var category_id = $(current).attr("category_id");
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/get_ProductsBy_CatID/"; ?>',
                    data: {
                        category_id: category_id,
                        prodType: 1
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json.length != 0) {
                            jsonData = json;
                            $('tbody[id^=' + category_id + ']').empty();
                            $('tbody[id^=' + category_id + ']').append('<tr></tr>');
                            var count = 1;
                            for (var i = 0; i <= json.length; i++) {
                                var product = jQuery('<td style="border:0;"><a class="icon-btn" data-reveal-id="myModal" id="doOrder" product_id=' + json[i]['PRODUCT_ID'] + ' style="width:100%;font-size:100%" href="#">'
                                        + '<strong><span>' + json[i]['PRODUCT_NAME'] + ' ' + json[i]['PRODUCT_NUMBER'] + '</span></strong><br/>'
                                        + '<strong><span>' + 'الطول:' + json[i]['H_LENGTH'] + ' ' + 'العرض:' + json[i]['WIDTH'] + ' ' + 'الإرتفاع:' + json[i]['HEIGHT'] + '</span></strong><br/>'
                                        + '<strong><span>الكمية:</span><span>' + json[i]['PRIMARY_UNIT_NAME'] + json[i]['PRIMARY_UNIT_QUANTITY'] + ' ' + json[i]['SECONDARY_UNIT_NAME'] + json[i]['SECONDARY_UNIT_QUANTITY'] + '</span></strong><br/>'
                                        + '</a>'
                                        + '</td>');
                                if (count <= 5) {
                                    $('tbody[id^=' + category_id + '] tr:last').append(product);
                                } else {
                                    $('tbody[id^=' + category_id + ']').append('<tr>');
                                    $('tbody[id^=' + category_id + ']').append(product);
                                    $('tbody[id^=' + category_id + ']').append('</tr>');
                                    count = 0;
                                }
                                count++;
                            }
                        } else {
                            $('tbody[id^=' + category_id + ']').html('<p class="text-error"> عذراً لا يوجد أصناف مدخلة لهذه الفئــة</p>');
                        }
                    }
                });
            }

            function add_product() {
                var d = new Array();
                d[0] = product_id;
                d[1] = $('#department_id').val();
                d[2] = $('#notes').val();
                d[3] = $('#quantity').val();
                d[4] = $('#unit_type').val();
                d[5] = $('#order_number').val();
                data[index] = d;

                var product = jQuery('<tr id=' + index + '><td>' + [++index] + '</td><td class="text-info"><b>' + product_name
                        + '</b></td><td>' + $('#unit_type option:selected').text() + '</td><td>' + $('#quantity').val() + '</td><td>'
                        + $('#notes').val() + '</td><td><button onclick="remove_row(this)" id="remove" class="btn-danger"><i class="icon-trash"></i></button></td></tr>');
                $('#products').show().fadeOut().fadeIn();
                $('tbody[id^=added_products] > tr:last').before(product);

                $('#quantity').val('');
                $('#notes').val('');
                $('.close-reveal-modal').click();
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