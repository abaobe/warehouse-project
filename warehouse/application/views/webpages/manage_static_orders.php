<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>إداة طلبيات الأصناف الثابتة</title>
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
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
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
                                <li>
                                    <a href="#">إدارة طلبات اللوازم</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">إداة طلبيات الأصناف الثابتة</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>جميع الأصناف الموجودة في طلب: <?=$order_number ?></h4>
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
                                    <table class="table table-striped table-bordered" id="sample_1" order_number='<?= $order_number ?>'>
                                        <thead>
                                            <tr>
                                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                <th class="hidden-phone">إسم الصنف</th>
                                                <th class="hidden-phone">حالة الصرف</th>
                                                <th class="hidden-phone">مقدم من</th>
                                                <th class="hidden-phone">القسم</th>
                                                <th class="hidden-phone">الموظف</th>
                                                <th class="hidden-phone">رقم الغرفة</th>
                                                <th class="hidden-phone">الكمية المطلوبة</th>
                                                <th class="hidden-phone">الكمية المتوفرة</th>
                                                <th class="hidden-phone">ملاحظات</th>
                                                <th class="hidden-phone">صرف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($supplies as $value) { ?>
                                                <tr class="odd gradeX" orderID='<?=$value['ORDER_ID']?>'>
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
                                                    <td class="hidden-phone"><?= $value['SECTION_NAME'] ?></td>
                                                    <!--you can put employee number-->
                                                    <td class="hidden-phone"><?= $value['EMPLOYEE_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['ROOM_NUMBER'] ?></td>
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
                                                        <button id="more" class="btn btn-mini btn-info" onclick="getInserted(<?=$value['PRODUCT_ID']?>,this)"><i class="icon-plus"></i></button>
                                                        <button id="clear" class="btn btn-mini btn-danger hide" onclick="removeDisburse(this)"><i class="icon-plus"></i></button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="form-actions">
                                        <div class='span6'></div>
                                        <button type="button" class="btn btn-success" onclick="supply_order()">إعتماد نهائي</button>
                                        <button type="button" class="btn btn-success" onclick="print_()">طباعة</button>
                                        <button type="reset" id="reset" class="btn">إلغاء</button>
                                    </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                    </div>
                    <!-- END ADVANCED TABLE widget-->
                    <!-- START SECOND TABLE-->
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
                                <div class="widget-body" id="inserted">
                                    
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                    </div>
                    <!-- END SECOND TABLE-->
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script>
            var info = new Array();
            var index = 0;
            var currentProduct;
            var count = 0;
            var orderID;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });
            
            function print_() {
                var newArray= new Array();
                for (var i = 0; i < info.length; i++) {
                  if (info[i] !== undefined && info[i] !== null && info[i] !== "") {
                    newArray.push(info[i]);
                  }
                }
                if(newArray.length !== 0){
                    $.ajax({
                        url: '<?php echo base_url() . "reports/borrow/"; ?>',
                        data: {
                            borrows: JSON.stringify(newArray)
                        },
                        success: function(data) {
                            //alert(data );
                            //$('#modal').html(data);
                            //$('#hide_header').hide();
                        }
                    });
                }else{
                    $('#status').removeClass().addClass('alert alert-info');
                    $('#message').text("عذرا لم تقم بصرف أي صنف");
                    App.scrollTo();
                }
                
            }
            
            function addToCart(current){
                var d = new Array();
                d[0] = $(currentProduct).parents('tr').attr('orderID');
                d[1] = $(current).parents('tr').children().find($('td #notes')).val();
                d[2] = $(current).parents('tr').children().find($('td #return_date')).val();
                d[3] = $(current).parents('tr').attr('voucherID');
                d[4] = $('#sample_1').attr('order_number');
                d[5] = $(current).parents('tr').attr('product_status');
                d[6] = $(current).parents('tr').attr('serial_number');
                info[index] = d;
                ++index;
                $(current).parent().empty().append('<button class="btn btn-danger" onclick="undo(this)"><i class="icon-remove"></i></button>');
                $(currentProduct).parents('td').children('#clear').show();
                $(currentProduct).parents('td').children('#more').hide();
                if(orderID == $(currentProduct).parents('tr').attr('orderID')){
                    count++;
                }else{
                    orderID = $(currentProduct).parents('tr').attr('orderID');
                    count=0;count++;
                }
            }
            
            function removeDisburse(current){
                $(current).parents('td').children('#clear').hide();
                $(current).parents('td').children('#more').show();
                $('#inserted').empty();
                var orderID= $(current).parents('tr').attr('orderID');
                for (var i=0; i < info.length; i++){
                    if(info[i][0] === orderID){
                        info.splice(i, 1);
                    }
                }
            }
            
            function undo(current) {
                var x = $(current).parents('tr').attr('index');
                info.splice(x, 1);
                --count;
                $(current).parent().empty().empty().append('<button class="btn btn-success" onclick="addToCart(this)"><i class="icon-ok"></i></button>');
                if(count == 0){
                    $(currentProduct).parents('td').children('#clear').hide();
                    $(currentProduct).parents('td').children('#more').show();
                    count = 0;
                }
            }
            
            function getInserted(product_id,current){
                currentProduct = current;
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/spec_inserted_info/" ?>',
                    data: {product_id: product_id
                    },
                    success: function(json) {
                        if (json) {
                            $("#inserted").html(json);
                        } else {
                            $('#status').removeClass().addClass('alert alert-error');
                            $('#message').text("يجب عليك التأكد من البيانات المدخلة");
                        }
                    }, error: function() {
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
            }
            
            function supply_order() {
                var newArray= new Array();
                for (var i = 0; i < info.length; i++) {
                  if (info[i] !== undefined && info[i] !== null && info[i] !== "") {
                    newArray.push(info[i]);
                  }
                }
                if(newArray.length !== 0){
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "product/disburse_static_supplies/"; ?>',
                        data: {disbursed: JSON.stringify(newArray)},
                        dataType: "json",
                        success: function(json) {
                            if (json['status'] === 'warning') {
                                $('#status').removeClass().addClass('alert show');
                                $('#message').html(json['msg']);
                                newArray = [];
                                newArray.length = 0;
                            } else if(json['status'] === 'success'){
                                $('#status').removeClass().addClass('alert alert-success');
                                $('#message').html(json['msg']);
                                info = [];
                                info.length = 0;
                                newArray = [];
                                newArray.length = 0;
                                index = 0;
                            } else if(json['status'] === 'danger'){
                                $('#status').removeClass().addClass('alert alert-error');
                                $('#message').html(json['msg']);
                            }
                        },complete: function(){
                            App.scrollTo();
                            setTimeout(function () { window.location = '<?php echo base_url() . "product/manage_static_orders/" .str_replace('/', '-', $order_number);?>';}, 5000);
                        }, error: function() {
                            $('#status').removeClass().addClass('alert alert-error');
                            $('#message').text("هناك خطأ في تخزين البيانات");
                        }
                    });
                }else{
                    $('#status').removeClass().addClass('alert alert-info');
                    $('#message').text("عذرا لم تقم بصرف أي صنف");
                    App.scrollTo();
                }
            }
        </script>
    </body>
    <!-- END BODY -->
</html>
