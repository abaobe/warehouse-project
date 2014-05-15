<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>إدخال لوازم مسنهلكة</title>
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
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css"/>
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
                                    <a href="#">قسم الأصناف</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">إدخال لوازم مستهلكة</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>إدخال لوازم مستهلكة تبعاً لرقم الطلب</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body form">
                                    <!-- Start Alert Message -->
                                    <div id="status" class="alert">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <span id="message"></span>
                                    </div>
                                    <!-- End Alert Message -->
                                    <!-- BEGIN FORM-->
                                    <div class="well left_info">
                                        <label class="control-label">رقم السند</label>
                                        <div class="controls form-horizontal">
                                            <input readonly form="anyThing" type="text" id="insert_number" class="input-small" />
                                            <button type="button" class="btn btn-success" onclick="get_insert_number()">مستند إدخال جديد</button>
                                        </div>
                                    </div>
                                    <form method="POST" id="add_form" onsubmit="return false;" class="form-horizontal">
                                        <!-- START VOUCHER NUMBER INFO -->
                                        
                                        <!-- END VOUCHER NUMBER INFO -->
                                        <div class="control-group">
                                            <label class="control-label">تم الإستلام من</label>
                                            <div class="controls">
                                                <select id="received_from" class="chosen span3" placeholder="إستلمت من" tabindex="1">
                                                    <option value="">إختيار</option>
                                                    <?php foreach ($companies as $company) { ?>
                                                        <option value="<?= $company['COMPANY_ID'] ?>"><?= $company['COMPANY_NAME'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">رقم الفاتورة</label>
                                            <div class="controls">
                                                <input type="text" class="span2" id="billing_id" placeholder="رقم الفاتورة" />
                                                <div class="input-append date date-picker" data-date="" data-date-format="yyyy/mm/dd" data-date-viewmode="years">
                                                    <input placeholder="تـاريخ الإستلام" id="received_date" class="m-ctrl-medium date-picker" size="16" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span>
                                                </div>
                                                <select id="currency_type" class="span2" name="currency_type" data-placeholder="نوع االعملة" tabindex="1">
                                                    <option value="">نوع االعملة</option>
                                                    <option value="أغورة">أغورة</option>
                                                    <option value="شيكل">شيكل</option>
                                                    <option value="دولار">دولار</option>
                                                    <option value="دينار">دينار</option>
                                                    <option value="يورو">يورو</option>
                                                </select>
                                            </div>
                                        </div>
                                        <table style="table-layout:fixed;" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="span4">إسم الصنف</th>
                                                    <th>الوحدة</th>
                                                    <th>الكمية المضافة</th>
                                                    <th>سعر الوحدة</th>
                                                    <th>إجمالي التكلفة</th>
                                                    <th width="8%"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="rows">
                                                <tr id="row1">
                                                    <td>
                                                        <select style="width:100%;" onchange="product_unit_names(this)" id="product_id1" class="chosen" data-placeholder="رقم الصنف - إسم الصنف" tabindex="1">
                                                           <option value=""></option>
                                                           <?php foreach ($products as $product) {?>
                                                           <option value="<?= $product['PRODUCT_ID'] ?>"><?= $product['PRODUCT_ID'].'  -  '.$product['PRODUCT_NAME']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select style="width:100%;" id="unit_type" name="unit_type" data-placeholder="الوحدة" tabindex="1">
                                                            <option value="">إختيار</option>
                                                        </select>
                                                    </td>
                                                    <td><input style="width:90%;" type="text" oninput="calculate_cost(this,1)" id="quantity" placeholder="الكمية بالأرقام" /></td>
                                                    <td><input style="width:90%;" type="text" oninput="calculate_cost(this,2)" id="unit_price" placeholder="سعر الوحدة" /></td>
                                                    <td><input style="width:90%;"  type="text" oninput="calculate_cost(this,3)" onkeyup="calculate_cost(this)" id="total_cost" placeholder="التكلفة" /></td>
                                                    <td><button style="width:40%;" onclick="addnew_row(this)" id="more" class="btn-info"><i class="icon-plus"></i></button>    
                                                        <button style="width:40%;" onclick="remove_row(this)" id="remove" class="btn-danger"><i class="icon-remove"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td><input style="width:90%;" readonly type="text" id="final_cost" placeholder="إجمالي التكلفة" /></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="control-group">
                                            <label class="control-label">ملاحظات متعلقة بالإدخال</label>
                                            <textarea id="notes" class="span6 " rows="1"></textarea>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-success" onclick="insert_product()">حـفظ</button>
                                            <button type="reset" id="reset" class="btn">إلغاء</button>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END SAMPLE FORM widget-->
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN SAMPLE FORM widget-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>إدخال خدمات تابعة لنفس رقم الطلب الحالي</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body form">
                                    <!-- Start Alert Message -->
                                    <div id="status2" class="alert">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <span id="message2"></span>
                                    </div>
                                    <!-- End Alert Message -->
                                    <!-- BEGIN FORM-->
                                    <form method="POST" id="add_form2" onsubmit="return false;" class="form-horizontal">
                                        <table style="table-layout:fixed;" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="span4">إسم الخدمة</th>
                                                    <th class="span4">الكمية</th>
                                                    <th>تكلفة الخدمة</th>
                                                    <th>ملاحظات</th>
                                                    <th width="8%"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="rows">
                                                <tr id="service1">
                                                    <td><input style="width:90%;" type="text" id="service_name" placeholder="إسم الخدمة" /></td>
                                                    <td><input style="width:90%;" type="text" id="quantity" placeholder="الكمية" /></td>
                                                    <td><input style="width:90%;" type="text" id="service_cost" placeholder="تكلفة الخدمة" /></td>
                                                    <td><input style="width:90%;" type="text" id="notes" placeholder="ملاحظة" /></td>
                                                    <td><button style="width:42%;" onclick="addnew_service(this)" id="more" class="btn-info"><i class="icon-plus"></i></button>    
                                                        <button style="width:42%;" onclick="remove_row(this)" id="remove" class="btn-danger"><i class="icon-remove"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td ><input style="width:90%;" readonly type="text" id="final_cost2" placeholder="إجمالي التكلفة" /></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-success" onclick="insert_service()">حـفظ</button>
                                            <button type="reset" id="reset" class="btn">إلغاء</button>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script>
            var data = new Array();
            var SecData = new Array();
            var count = 2;
            var SecCount = 2;
            var insert_number;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
                get_insert_number();
            });
            
            $('.date-picker').datepicker({
                format: "yyyy/mm/dd"
            });
            
            function addnew_row(current){
                var new_row = jQuery('<tr id=row'+count+'>'+
                '<td><select style="width:100%;" id=product_id'+count+' onchange="product_unit_names(this)" class="chosen" data-placeholder="رقم الصنف - إسم الصنف" tabindex="1">'+
                     '<option value=""></option>'+
                     '<?php foreach ($products as $product) {?>'+
                     '<option value="<?= $product['PRODUCT_ID'] ?>"><?= $product['PRODUCT_ID'].'  -  '.$product['PRODUCT_NAME']; ?></option>'+
                     '<?php } ?>'+
                     '</select>'+
                '</td>'+
                '<td><select style="width:100%;" id="unit_type" name="unit_type" data-placeholder="الوحدة" tabindex="1"><option value="">إختيار</option></select></td>'+
                '<td><input style="width:90%;" type="text" oninput="calculate_cost(this,1)" id="quantity" placeholder="الكمية بالأرقام" /></td>'+
                '<td><input style="width:90%;" type="text" oninput="calculate_cost(this,2)" id="unit_price" placeholder="سعر الوحدة" /></td>'+
                '<td><input style="width:90%;"  type="text" oninput="calculate_cost(this,3)" id="total_cost" placeholder="التكلفة" /></td>'+
                '<td><button style="width:42%;" onclick="addnew_row(this)" id="more" class="btn-info"><i class="icon-plus"></i></button>'+
                '&nbsp;<button style="width:42%;" onclick="remove_row(this)" id="remove" class="btn-danger"><i class="icon-remove"></i></button></td>'+
                '</tr>');
                $(current).closest('TR').after(new_row);
                $("#row"+count +" #product_id"+count).chosen();
                count++;
            }
            
            function addnew_service(current){
                var new_row = jQuery('<tr id=service'+SecCount+'>'+
                '<td><input style="width:90%;" type="text" id="service_name" placeholder="إسم الخدمة" /></td>'+
                '<td><input style="width:90%;" type="text" id="quantity" placeholder="الكمية" /></td>'+
                '<td><input style="width:90%;" type="text" id="service_cost" placeholder="تكلفة الخدمة" /></td>'+
                '<td><input style="width:90%;" type="text" id="notes" placeholder="ملاحظة" /></td>'+
                '<td><button style="width:42%;" onclick="addnew_service(this)" id="more" class="btn-info"><i class="icon-plus"></i></button>'+
                '&nbsp;<button style="width:42%;" onclick="remove_row(this)" id="remove" class="btn-danger"><i class="icon-remove"></i></button></td>'+
                '</tr>');
                $(current).closest('TR').after(new_row);
                SecCount++;
            }
            
            function get_products_added(){
                var index = 0;
                for(var i=1; i < count; i++){
                    if (jQuery.contains(document, $('#row'+i)[0])) {
                        var d=new Array();
                        d[0]=$('#row'+i +' #product_id'+i).val();
                        d[1]=$('#received_from').val();
                        d[2]=$('#billing_id').val();
                        d[3]=$('#notes').val();
                        d[4]=$('#row'+i +' #quantity').val();
                        d[5]=$('#row'+i +' #unit_type').val();
                        d[6]=$('#row'+i +' #unit_price').val();
                        d[7]=$('#currency_type').val();
                        d[8]=$('#received_date').val();
                        d[9]=$('#insert_number').val();
                        data[index]=d;
                        index++;
                    }
                }
            }
            
            function remove_row(current){
                $(current).parents('tr').remove();
            }
            
            var x = 0;
            var temp =false;
            var quantity=0;
            var total_cost = 0;
            var unit_price = 0;
            var q= false;
            var p= false;
            var c= false;
            var sum= 0;
            var costt =new Array();
            function calculate_cost(current,flag){
                var i = ($(current).parents('tr').attr('id')).split('row')[1];
                quantity = $(current).parents('tr').children().find($('td #quantity')).val();
                unit_price = $(current).parents('tr').children().find($('td #unit_price')).val();
                total_cost = $(current).parents('tr').children().find($('td #total_cost')).val();
                if(flag == 1){
                    q=true;
                    if(p){
                        $(current).parents('tr').children().find($('td #total_cost')).empty();
                        $(current).parents('tr').children().find($('td #total_cost')).val(quantity*unit_price);
                        sum=0;
                        sum= quantity*unit_price;
                        temp = true;
                        c=false;
                    }else if(c){
                        $(current).parents('tr').children().find($('td #unit_price')).empty();
                        sum=0;
                        if(quantity!=0){
                            $(current).parents('tr').children().find($('td #unit_price')).val(total_cost/quantity);temp = true;
                            
                            sum= total_cost;
                        p=false;
                        }
                    }
                }else if(flag == 2){
                    p= true;
                    sum=0;
                    if(quantity){
                        $(current).parents('tr').children().find($('td #total_cost')).empty();
                        $(current).parents('tr').children().find($('td #total_cost')).val(quantity*unit_price);temp = true;
                        
                        sum= quantity*unit_price;
                        c= false;
                    }
                }else if(flag == 3){ 
                    c = true;
                    p = false;
                    if(q){
                        $(current).parents('tr').children().find($('td #unit_price')).empty();
                        sum=0;
                        if(quantity!=0){
                            $(current).parents('tr').children().find($('td #unit_price')).val(total_cost/quantity);temp = true;
                            
                            sum= total_cost;
                        }
                        p = false;
                    }
                }
                if(temp){
                    if(costt[i]){
                        delete costt[i];
                    }
                    costt[i] = sum;
                sum=0;
                var finalCost=0;
                for(var x=1; x< costt.length; x++){
                    finalCost ++;
                    console.log(">>"+finalCost);
                }
                console.log("***"+finalCost);
                $('#final_cost').empty();
                $('#final_cost').val(finalCost);
                finalCost=0;sum=0;
            }
                }

            function insert_product() {
                get_products_added();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/do_insert_product/"; ?>',
                    data: {insert_orders: JSON.stringify(data)},
                    dataType: "json",
                    success: function(json) {
                        if (json == 1) {
                            $('#status').removeClass('alert-error').addClass('alert alert-success');
                            $('#message').text("تم إدخال الكمية بنجاح");
                            //$('#reset').click();
                        } else {
                            $('#status').addClass('alert alert-error');
                            $('#message').removeClass('alert-success').text("يجب عليك التأكد من البيانات المدخلة");
                        }
                    }, error: function() {
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
            }

            function product_unit_names(current) {
            if ($(current).val()) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/product_unit_names/"; ?>',
                    data: {
                        product_id: $(current).val()
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json.length != 0) {
                            $(current).parents('tr').children().find($('td #unit_type')).empty().append('<option value=primary>' + json[0]['PRIMARY_UNIT_NAME'] + '</option>');
                            $(current).parents('tr').children().find($('td #unit_type')).append('<option value=secondary>' + json[0]['SECONDARY_UNIT_NAME'] + '</option>').selectmenu('refresh');
                        } else {
                            $(current).parents('tr').children().find($('td #unit_type')).empty().append('<option value=nothing>لا يوجد وحدات مدخلة</option>').selectmenu('refresh');
                        }
                    }
                });
              }
            }
            
            function get_services_added(){
                var SecIndex=  0;
                for(var i=1; i < SecCount; i++){
                    if (jQuery.contains(document, $('#service'+i)[0])) {
                        var d=new Array();
                        d[0]=$('#service'+i +' #service_name').val();
                        d[1]=$('#received_from').val();
                        d[2]=$('#billing_id').val();
                        d[3]=$('#service'+i +' #notes').val();
                        d[4]=$('#service'+i +' #service_cost').val();
                        d[5]=$('#service'+i +' #currency_type').val();
                        d[6]=$('#received_date').val();
                        d[7]=$('#insert_number').val();
                        d[8]=$('#service'+i +' #quantity').val();
                        SecData[SecIndex]=d;
                        SecIndex++;
                    }
                }
            }
            
            function insert_service(){
                get_services_added();
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "services/insert_multiple_service/"; ?>',
                    data: {services: JSON.stringify(SecData)},
                    dataType: "json",
                    success: function(json) {
                        if (json == 1) {
                            $('#status2').removeClass('alert-error').addClass('alert alert-success');
                            $('#message2').text("تم إضافة الخدمة  بنجاح");
                            $('#reset').click();
                        }else{
                            $('#status2').addClass('alert alert-error');
                            $('#message2').removeClass('alert-success').text("يجب عليك التأكد من البيانات المدخلة");
                        }
                    }, error: function() {
                        $('#message').text("هناك خطأ في تخزين البيانات");
                    }
                });
                return false;
            }
            
            function get_insert_number() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/get_insert_number/"; ?>',
                    dataType: "json",
                    success: function(json) {
                        $('#insert_number').val(json);
                        insert_number = json;
                    }, error: function() {
                        $('#message').text("خطأ في جلب رقم السند");
                    }
                });
            }
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>