<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>إدارة الإدخالات</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url().'resource/css/'.CUSTOM_THEME.'.css'?>" rel="stylesheet" id="style_color" />

        <link href="<?php echo base_url(); ?>resource/assets/custombox/reveal.css" type="text/css" rel="stylesheet">	
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
                                <li><a href="#">إدارة الإدخالات الثابتة</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>جدول على  جميع الإدخالات الخاصة بالأصناف طويلة الأجل </h4>
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
                                                <th class="hidden-phone">تاريخ الإنتهاء</th>
                                                <th class="hidden-phone">الرقم التسلسلي</th>
                                                <th class="hidden-phone">ملاحظات</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0;
                                            foreach ($product_info as $value) { ?>
                                                <tr class="odd gradeX">
                                                    <td><input type="checkbox" class="checkboxes" /></td>
                                                    <td class="hidden-phone"><?= $value['ADDED_DATE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['COMPANY_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['BILLING_ID'] ?></td>
                                                    <td class="hidden-phone"><?= $value['QUANTITY'] ?><?=' '.$value['UNIT_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['UNIT_PRICE'].' '.$value['CURRENCY_TYPE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['PRODUCT_NATURE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['PRODUCT_STATUS'] ?></td>
                                                    <td class="hidden-phone"><?= $value['EXPIRE_DATE'] ?></td>
                                                    <td class="hidden-phone"><?= $value['SERIAL_NUMBER'] ?></td>
                                                    <td class="hidden-phone"><?= substr($value['NOTES'], 0, 10).'...' ?></td>
                                                    <td class="hidden-phone">
                                                        <?php if($value['RESERVE_STATUS'] == 'متاح'){ ?>
                                                        <a href='<?php echo base_url() . "product/update_static_product/" . $value['VOUCHER_ID']; ?>' class="btn mini purple"><i class="icon-edit"></i> تعديل</a>
                                                        <a id="delete" href="javascript:delete_inserted_product(<?= $value['VOUCHER_ID'] ?>)" class="btn mini purple"><i class="icon-trash"></i> حـذف</a>
                                                        <a id="temporary_disburse" href="javascript:temporary_disburse(<?= $value['VOUCHER_ID'] ?>)" class="btn mini purple small"><i class="icon-magnet"></i> إخراج مؤقت</a>
                                                        <?php }else if($value['RESERVE_STATUS'] == 'محجوز'){ echo '<span class="label label-warning">محجوز</span>';?>
                                                        <?php }else if($value['RESERVE_STATUS'] == 'تالف'){echo '<span class="label label-danger">تالف</span>';?>
                                                        <?php }else if($value['RESERVE_STATUS'] == 'إخراج مؤقت'){echo '<span class="label label-info">إخراج مؤقت</span>';?>
                                                        <a href='<?php echo base_url() . "product/update_static_product/" . $value['VOUCHER_ID']; ?>' class="btn mini purple"><i class="icon-edit"></i> تعديل</a>
                                                        <?php }else if($value['RESERVE_STATUS'] == 'تم إتلافة'){echo '<span class="label btn-danger">تم إتلافة</span>';}?>
                                                        
                                                    </td>
                                                </tr>
                                            <?php ++$i;} ?>
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
        <!-- START MODAL FORM -->
            <div id="myModal" class="reveal-modal large">
                <a class="close-reveal-modal">&#215;</a>
                <div class="widget">
                    <form method="POST" id="add_form" onsubmit="return false;" class="form-horizontal">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>طلب لوازم</h4>
                    </div>
                    <div class="widget-body" id="orderInfo">
                        <div class="control-group">
                        <label class="control-label">الجهة المرسل إليها الصنف</label>
                        <div class="controls">
                            <select id="companies" class="chosen span3" placeholder="إستلمت من" tabindex="1">
                                <option value="">إختيار</option>
                            </select>
                        </div>
                        </div>
                            <div id="reasons" class="control-group">
                            <label class="control-label">أسباب إخراج الصنف</label>
                            <div class="controls">
                                <input type="text" id="way_1" class="span3" />
                                <button id="more" class="btn btn-info"><i class="icon-plus icon-white"></i> مزيد</button>
                            </div>
                            <br/>
                        </div>
                        <div class="controls">
                        <button id="accept" onclick="accept_disburse()" class="btn btn-success"><i class="icon-plus icon-ok"></i> إعتماد</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END MODAL FORM -->
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
            var count = 2;
            var voucher_id;
            var isLoaded = false;
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
            });

            function temporary_disburse(voucher_id){
                this.voucher_id = voucher_id;
                if(isLoaded == false){
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "companies/get_companies_id_name/"; ?>',
                        dataType: "json",
                        success: function(json) {
                            if (json.length != 0) {
                                var data = json.companies;
                                for (var i in data) {
                                    $('#companies').append('<option value='+data[i]['COMPANY_ID']+'>' + data[i]['COMPANY_NAME'] + '</option>');
                                }
                                isLoaded = true;
                            }
                        },error: function() {
                            $('#status').removeClass().addClass('alert alert-error');
                            $('#message').text("هناك خطأ في تخزين البيانات");
                        }
                    });
                }
                $('#myModal').reveal();
            }
            
            $('#more').click(function() {
                var new_way = '<div class="control-group"><div class="controls"><input type="text" class="span3" id="way_' + count + '"/></div></div>';
                $('#reasons').append(new_way);
                count++;
            });
            
            function accept_disburse() {
                var reasons = "";
                for (var i = 1; i < count; i++) {
                    if ($("#way_" + i).val() != null || $("#sub_" + i).val() != '')
                        reasons += $("#way_" + i).val() + ',';
                }
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "product/disburse_servicing/"; ?>',
                    data: {
                        voucher_id: voucher_id,
                        reasons: reasons,
                        company_id: $('#companies').val()
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json['status'] == true) {
                            $('#status').removeClass().addClass('alert alert-success');
                            $('#message').html(json['msg']);
                            $('#reset').click();
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
