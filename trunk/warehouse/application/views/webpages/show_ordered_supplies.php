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
        <link href="<?php echo base_url(); ?>resource/css/style.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_default.css" type="text/css" rel="stylesheet"/>

        <link href="<?php echo base_url(); ?>resource/assets/fancybox/source/jquery.fancybox.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
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
            <?php $this->load->view('includes/sidebar_view');?>
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
                                    <h4><i class="icon-reorder"></i>جدول يحتوي على طلبات صرف لوازم</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
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
                                    <table class="table table-bordered table-hover" id="sample">
                                        <thead>
                                            <tr>
                                                <th style="width:8px;" >الرقم</th>
                                                <th class="hidden-phone">رقم الطلب</th>
                                                <th class="hidden-phone">إسم الإدارة</th>
                                                <th class="hidden-phone">إسم الدائرة</th>
                                                <th class="hidden-phone">نوع الأصناف</th>
                                                <th class="hidden-phone">تاريخ الطلب</th>
                                                <th class="hidden-phone">قائـمة المهام</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
<!--                                        <tbody>
                                            <?php foreach ($orders as $value) { ?>
                                                <tr class="odd gradeX">
                                                    <td status="<?= $value['STATUS'] ?>"><input type="checkbox" class="checkboxes" value="1" /></td>
                                                    <td class="hidden-phone"><?= $value['ORDER_NUMBER'] ?></td>
                                                    <td class="hidden-phone"><?= $value['DEPARTMENT_NAME'] ?></td>
                                                    <td class="hidden-phone"><?= $value['MAIN_DEPARTMENT'] ?></td>
                                                    <td class="hidden-phone">
                                                    <?php if($value['PRODUCT_TYPE'] == '1'){?>
                                                        <span class="text-info">مـواد مستهلكة</span>
                                                    <?php }else if($value['PRODUCT_TYPE'] == '2'){?>
                                                        <span class="text-info">مواد دائـمة</span>
                                                    <?php }?>
                                                    </td>
                                                    <td class="hidden-phone"><?= $value['ADDED_DATE'] ?></td>
                                                    <td class="hidden-phone">
                                                        <a href='#' onclick="redirect(this);return false;" order_number="<?=$value["ORDER_NUMBER"]?>" product_type="<?=$value['PRODUCT_TYPE']?>" class="btn mini purple">صرف لوازم</a>
                                                        <a href='#' class="btn mini purple"><i class="icon-edit"></i> عرض</a>
                                                        <button id="refuse" class="btn mini purple" onclick="refuse_order('<?= $value['ORDER_NUMBER'] ?>', this)"><i class="icon-edit"></i> رفـض</button>
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
                
                
                
                //alert(<?php //echo $this->session->userdata('per_page') ?>);
                
                $('#per_page').val('<?php echo $this->session->userdata('per_page')?>');
                $('#search_').val('<?php echo $this->session->userdata('search')?>');
                
                tableActions();
                
                $('table').after('<?php echo $paging; ?>');
                
                $('#search_').keypress(function (){
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "product/pagein_ordered_supplies/"; ?>',
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
                
                $('#per_page').change(function (){
                    //alert('<?php //echo $this->uri->segments[3];?>');
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() . "product/pagein_ordered_supplies/"; ?>',
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
            
            function redirect (current){
                var number = $(current).attr('order_number').replace('/', '-');
                var type = $(current).attr('product_type');
                if(type == 1){
                   window.location = '<?php echo base_url() . "product/manage_temp_orders/" ?>'+ number;
                }else if(type = 2){
                   window.location = '<?php echo base_url() . "product/manage_static_orders/" ?>'+ number;
                }
            }

            function refuse_order(current) {
                $.confirm({
                    text: "<h4>هل أنت متأكد من رفض هذا الطلب("+$(current).attr('order_number')+") ؟</h4>",
                    confirm: function() {
                        $.ajax({type: "POST",
                            url: '<?php echo base_url() . "product/do_refuse_order/"; ?>',
                            data: {order_number: $(current).attr('order_number')},
                            dataType: "json",
                            success: function(json) {
                                var column = $(current).parents('tr').children('td[status]');
                                $(column).fadeOut().fadeIn().addClass('label-important');
                            }
                        });
                    }
                });
            }
            
             function initTable(){
    //var oTable = $('#sample_1').dataTable();
      return $("#sample").dataTable({
          //"bServerSide": true,
        "bDestroy":true,
        "bStateSave": true,
        "aaSorting": [[1, "asc"]], 
        "bProcessing": false,
        "bServerSide": true,
        "sAjaxSource": "<?php echo base_url() . "product/set_data_ordered_supplies/"; ?>",
        "bJQueryUI": true,
        "bAutoWidth": false,
        "bFilter":false,
        "bLengthChange": false,
        "bPaginate": false,
        "bSort": true,
        "iDisplayLength": 10,
        "bInfo": true,
        //"sPaginationType": "full_numbers",
          "fnDrawCallback": function( oSettings ) {
            //alert( 'DataTables has redrawn the table' );
           },
           "fnServerParams": function ( aoData ) {
                aoData.push( { "name": "search", "value": $('#search_').val() },
                        { "name": "offset", "value": <?php echo ($this->uri->segment(3)) ? $this->uri->segment(3) : 0?> },
                        { "name": "per_page", "value":  $('#per_page').val() });
            },
//          "fnInfoCallback": function( oSettings, iStart, iEnd, iMax, iTotal, sPre ) {
//                //$(oTable).empty();
//                return iStart +" to "+ iEnd;
//          },
          "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                "dataType": 'json',
                "type": "POST",
                "url": sSource,
                "data": aoData,
                "success": fnCallback
                } );
          },
          //"sDom": '<"top"i>rt<"bottom"flp><"clear">',
          "aoColumnDefs":[{
                "mData":"RNUM"
              , 'bSortable': false
              , "aTargets": [ 0 ]
              , "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  if (oData['STATUS'] == "refuse") {
                       $(nTd).attr('status', oData['STATUS']);
                       $(nTd).append("<span class='label label-important'>"+oData['RNUM']+"</span>");
                    } else if (oData['STATUS'] == "accept") {
                        $(nTd).attr('status', oData['STATUS']);
                        $(nTd).append("<span class='label label-success'>"+oData['RNUM']+"</span>");
                    } else if (oData['STATUS'] == "some") {
                        $(nTd).attr('status', oData['STATUS']);
                        $(nTd).append("<span class='label label-info'>"+oData['RNUM']+"</span>");
                    }else{
                        $(nTd).attr('status', oData['STATUS']);
                        $(nTd).append("<span class='label'>"+oData['RNUM']+"</span>");
                    }
                  //$(nTd).attr('status', oData['STATUS']).addClass('label-important');
              }, "mRender": function ( url, type, full )  {
                  return  null;
              }
          },{
                "aTargets": [ 1 ]
              ,  "mData":"ORDER_NUMBER"
              , "sClass": "hidden-phone"
            },{
                "aTargets": [ 2 ]
              ,  "mData":"DEPARTMENT_NAME"
              , "sClass": "hidden-phone"
            },{
                "aTargets": [ 3 ]
              ,  "mData":"MAIN_DEPARTMENT"
              , "sClass": "hidden-phone"
            },{
                "aTargets": [ 4 ]
              ,  "mData":"PRODUCT_TYPE"
              , "sClass": "hidden-phone"
              , "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  if(oData['PRODUCT_TYPE'] == '1'){
                      $(nTd).empty();
                      $(nTd).append("<span class='text-info'>مـواد مستهلكة</span>");
                  }else if(oData['PRODUCT_TYPE'] == '2'){
                      $(nTd).empty();
                      $(nTd).append("<span class='text-info'>مواد دائـمة</span>");
                  }
              }
            },{
                "aTargets": [ 5 ]
              ,  "mData":"ADDED_DATE"
              , "sClass": "hidden-phone"
            },{
                "aTargets": [ 6 ]
              , "mData": "TASKS"  
              , "sClass": "hidden-phone"
              , "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                  $(nTd).append("<a href='#' onclick='redirect(this);return false;' order_number='"+oData['TASKS']+"' product_type='"+oData['PRODUCT_TYPE']+"' class='btn mini purple'>صرف لوازم</a>");
                  $(nTd).append("<span>     </span>");
                  $(nTd).append("<a href='#' class='btn mini purple'><i class='icon-edit'></i> عرض</a>");
                  $(nTd).append("<span>     </span>");
                  $(nTd).append("<button id='refuse' class='btn mini purple' onclick='refuse_order(this)' order_number='"+oData['TASKS']+"'><i class='icon-edit'></i> رفـض</button>");
              }, "mRender": function ( url, type, full )  {
                  return  null;
              }
          }]
        });
        //$(oTable).parent().parent().fadeOut("slow", function () {
            //data_table(data_source);
        //});

        //$('#sample_1').dataTable().fnDestroy();
        //$("#data_").empty();
        //jQuery.uniform.update(jQuery("#sample_1"));
    }
    
    function tableActions (){
        var oTable = initTable();
       
        //oTable.fnDraw();
    }

        </script>
    </body>
    <!-- END BODY -->
</html>
