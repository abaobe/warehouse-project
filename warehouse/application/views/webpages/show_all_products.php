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
                                    <div id="sample_1_length_" class="dataTables_length">
                                            <span class="span9">
                                                <select name="sample_1_length_" id="per_page" size="1" aria-controls="sample_1">
                                                    <option selected value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                عدد الصفوف في الصفحة
                                            </span>
                                            <span> البحث عن: 
                                                <input type="text" id="search_" aria-controls="sample_1"></input>
                                            </span>
                                    </div>
                                    <table class="table table-striped table-bordered" id="sample">
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
                                        <tbody></tbody>
<!--                                        <tbody>
                                            <?php foreach ($products as $value) { ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <?php
                                                        if (!strcmp($value['QUANTITY_STATUS'], 'invisible')) {
                                                            echo '<i class="icon-eye-close"></i>';
                                                        }
                                                        ?> 
                                                        <?php
                                                        if (!strcmp($value['QUANTITY_STATUS'], 'visible')) {
                                                            echo '<i class="icon-eye-open"></i>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $value['PRODUCT_NUMBER'] ?></td>
                                                    <td class="text-info bold"><?= $value['PRODUCT_NAME'] ?></td>
                                                    <td><?= $value['PRIMARY_UNIT_NAME'] ?></td>
                                                    <td><?= $value['PRIMARY_UNIT_QUANTITY'] ?></td>
                                                    <td><?= $value['H_LENGTH'] ?></td>
                                                    <td><?= $value['WIDTH'] ?></td>
                                                    <td><?= $value['HEIGHT'] ?></td>
                                                    <td><?php
                                                        if ($value['PRIMARY_UNIT_QUANTITY'] <= $value['RE_DEMAND_BORDER']) {
                                                            echo'<span class="label label-important">' . $value['RE_DEMAND_BORDER'] . '</span>';
                                                        } else if ($value['PRIMARY_UNIT_QUANTITY'] <= $value['RE_DEMAND_BORDER'] + $value['RE_DEMAND_BORDER'] * 0.05) {
                                                            echo'<span class="label label-warning">' . $value['RE_DEMAND_BORDER'] . '</span>';
                                                        } else {
                                                            echo $value['RE_DEMAND_BORDER'];
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <?php if ($value['PRODUCT_TYPE'] == '1') { ?>
                                                            <span class="text-success bold">مـواد مستهلكة</span>
                                                        <?php } else if ($value['PRODUCT_TYPE'] == '2') { ?>
                                                            <span class="text-info bold">مواد دائـمة</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $value['NOTES'] ?></td>
                                                    <td>
                                                        <a href='<?php echo base_url() . "product/update_product/" . $value['PRODUCT_ID']; ?>' class="btn mini purple"><i class="icon-edit"></i> تعديل</a>
                                                        <a href="#" onclick="delete_product(<?= $value['PRODUCT_ID'] ?>, this);
                                                                    return false;" class="btn mini purple"><i class="icon-trash"></i> حـذف</a>
                                                        <?php if ($value['PRODUCT_TYPE'] == 1) { ?>
                                                            <a href='<?php echo base_url() . "product/inserted_temp_prod/" . $value['PRODUCT_ID']; ?>' class="btn mini purple"><i class="icon-th-list"> حركات الصنف</i></a>
                                                        <?php } else if ($value['PRODUCT_TYPE'] == 2) { ?>    
                                                            <a href='<?php echo base_url() . "product/inserted_static_prod/" . $value['PRODUCT_ID']; ?>' class="btn mini purple"><i class="icon-th-list"> حركات الصنف</i></a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                        </tbody>-->
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
                $('#per_page').val('<?php echo $this->session->userdata('per_page') ?>');
                $('#search_').val('<?php echo $this->session->userdata('search') ?>');

                tableActions();

                $('table').after('<?php echo $paging; ?>');

                $('#search_').keypress(function() {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "product/pagein_all_products/"; ?>',
                        data: {
                            per_page: $('#per_page').val(),
                            search: $('#search_').val()
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#pagein_div').remove();
                            $('table').after(data);
                        }
                    });
                    tableActions();
                });

                $('#per_page').change(function() {
                    //alert('<?php //echo $this->uri->segments[3]; ?>');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "product/pagein_all_products/"; ?>',
                        data: {
                            per_page: $('#per_page').val(),
                            search: $('#search_').val()
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#pagein_div').remove();
                            $('table').after(data);
                        }
                    });
                    tableActions();

                });
            });


            function delete_product(product_id, current) {
                $.confirm({
                    text: "<h4>هل أنت متأكد من حذف هذا الصنف ؟</h4>",
                    confirm: function() {
                        $.ajax({type: "POST",
                            url: '<?php echo base_url() . "product/do_delete_product/"; ?>',
                            data: {product_id: product_id},
                            dataType: "json",
                            success: function(json) {
                                if (json == 1) {
                                    $(current).parents('tr').remove();
                                    $('#status').removeClass('alert-error').addClass('alert alert-success');
                                    $('#message').text("تم تعديل الصنف بنجاح");
                                } else if (json == 0) {
                                    $('#status').addClass('alert alert-error');
                                    $('#message').removeClass('alert-success').text("يجب عليك التأكد من البيانات المدخلة");
                                }
                            }, error: function() {
                                $('#message').text("هناك خطأ في تخزين البيانات");
                            }
                        });
                    }
                });
            }


            function initTable() {
                //var oTable = $('#sample_1').dataTable();
                return $("#sample").dataTable({
                    //"bServerSide": true,
                    "bDestroy": true,
                    "bStateSave": true,
                    "aaSorting": [[1, "asc"]],
                    "bProcessing": false,
                    "bServerSide": true,
                    "sAjaxSource": "<?php echo base_url() . "product/set_data_all_products/"; ?>",
                    "bJQueryUI": true,
                    "bAutoWidth": false,
                    "bFilter": false,
                    "bLengthChange": false,
                    "bPaginate": false,
                    "bSort": true,
                    "iDisplayLength": 10,
                    "bInfo": true,
                    //"sPaginationType": "full_numbers",
                    "fnServerParams": function(aoData) {
                        aoData.push({"name": "search", "value": $('#search_').val()},
                        {"name": "offset", "value": <?php echo ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ?>},
                        {"name": "per_page", "value": $('#per_page').val()});
                    },
                    "fnServerData": function(sSource, aoData, fnCallback, oSettings) {
                        oSettings.jqXHR = $.ajax({
                            "dataType": 'json',
                            "type": "POST",
                            "url": sSource,
                            "data": aoData,
                            "success": fnCallback
                        });
                    },
                    //"sDom": '<"top"i>rt<"bottom"flp><"clear">',
                    "aoColumnDefs": [{
                            "mData": "QUANTITY_STATUS"
                            , 'bSortable': false
                            , "aTargets": [0]
                            , "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                                if (oData['QUANTITY_STATUS'] == "invisible") {
                                    $(nTd).append('<i class="icon-eye-close"></i>');
                                }
                                if (oData['QUANTITY_STATUS'] == "visible") {
                                    $(nTd).append('<i class="icon-eye-open"></i>');
                                }
                            }
                            , "mRender": function(url, type, full) {
                                return  null;
                            }
                        }, {
                            "aTargets": [1]
                            , "mData": "PRODUCT_NUMBER"
                        }, {
                            "aTargets": [2]
                            , "mData": "PRODUCT_NAME"
                            , "sClass": "text-info bold"
                        }, {
                            "aTargets": [3]
                            , "mData": "PRIMARY_UNIT_NAME"
                        }, {
                            "aTargets": [4]
                            , "mData": "PRIMARY_UNIT_QUANTITY"
                        }, {
                            "aTargets": [5]
                            , "mData": "H_LENGTH"
                        }, {
                            "aTargets": [6]
                            , "mData": "WIDTH"
                        }, {
                            "aTargets": [7]
                            , "mData": "HEIGHT"
                        },{
                            "aTargets": [8]
                            ,"mData": "RE_DEMAND_BORDER"
                            , "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                                if(oData['PRIMARY_UNIT_QUANTITY'] <= oData['RE_DEMAND_BORDER']){
                                    $(nTd).append("<span class='label label-important' > "+oData['RE_DEMAND_BORDER']+" </span>");
                                }else if(oData['PRIMARY_UNIT_QUANTITY'] <= (oData['RE_DEMAND_BORDER'] + oData['RE_DEMAND_BORDER']*0.05)) {
                                    $(nTd).append("<span class='label label-warning'>"+oData['RE_DEMAND_BORDER']+"</span>");
                                }else{
                                    $(nTd).append(oData['RE_DEMAND_BORDER']);
                                }
                            }
                            , "mRender": function(url, type, full) {
                                return  null;
                            }
                        }, {
                            "aTargets": [9]
                            , "mData": "PRODUCT_TYPE"
                            , "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                                if (oData['PRODUCT_TYPE'] == '1') {
                                    $(nTd).empty();
                                    $(nTd).append("<span class='text-info'>مـواد مستهلكة</span>");
                                } else if (oData['PRODUCT_TYPE'] == '2') {
                                    $(nTd).empty();
                                    $(nTd).append("<span class='text-info'>مواد دائـمة</span>");
                                }
                            }
                        }, {
                            "aTargets": [10]
                            , "mData": "NOTES"
                        }, {
                            "aTargets": [11]
                            , "mData": "PRODUCT_ID"
                            , "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                                $(nTd).append("<a href='<?php echo base_url() . "product/update_product/" ?>"+oData['PRODUCT_ID']+" ' class='btn btn-primary'> <i class='icon-pencil icon-white'></i> تعديل</a>");
                                $(nTd).append("<span>     </span>");
                                $(nTd).append("<button onclick='delete_product("+oData['PRODUCT_ID']+",this);return false;' class='btn btn-danger'><i class='icon-remove icon-white'></i> حـذف</button>");
                                $(nTd).append("<span>     </span>");
                                
                                if(oData['PRODUCT_TYPE'] == 1){ 
                                    $(nTd).append("<a href='<?php echo base_url() . "product/inserted_temp_prod/"?>"+oData['PRODUCT_ID']+"' class='btn mini purple'><i class='icon-th-list'> حركات الصنف</i></a>");
                                } else if(oData['PRODUCT_TYPE'] ==2){
                                    $(nTd).append("<a href='<?php echo base_url() . "product/inserted_static_prod/"?>"+oData['PRODUCT_ID']+"' class='btn mini purple'><i class='icon-th-list'> حركات الصنف</i></a>");
                                }
                            }, "mRender": function(url, type, full) {
                                return  null;
                            }
                        }]
                });
            }

            function tableActions() {
                var oTable = initTable();
            }

        </script>
    </body>
    <!-- END BODY -->
</html>
