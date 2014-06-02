<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>تعديل بيانات الدائرة</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/css/bootstrap-responsive-rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/css/style_default.css" rel="stylesheet" id="style_color" />
        <link href="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>resource/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
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
                                قسم الإدارات والدوائر 
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#"> قسم الإدارات والدوائر</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">إدارة الدوائر والإدارات</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">تعديل بيانات الدائرة</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>يمكنك تعديل بيانات دائرة أو إدارة</h4>
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
                                    <form method="POST" id="add_form" onsubmit="return false;" class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">نوع الإدخال</label>
                                            <div class="controls">
                                                <label class="radio">
                                                    <input type="radio" name="insertType" value="main" onclick="checkType()" />
                                                    محكمة 
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="insertType" value="sub" checked="checked" onclick="checkType()" />
                                                    دائرة 
                                                </label>
                                            </div>
                                        </div>
                                        <div id="main">
                                            <div class="control-group">
                                                <label class="control-label">إسم المحكمة/الإدارة</label>
                                                <div class="controls">
                                                    <input type="text" value="<?=$department_info[0]['ROOT_NAME']?>" id="department_name" class="span6" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">العنوان</label>
                                                <div class="controls">
                                                    <input type="text" value="<?=$department_info[0]['ROOT_ADDRESS']?>" id="address" class="span6 " />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">ملاحـظات</label>
                                                <div class="controls">
                                                    <textarea id="notes" class="span6 " rows="3"><?=$department_info[0]['ROOT_NOTES']?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-success" onclick="update_department()">حـفظ</button>
                                                <button type="reset" id="reset" class="btn">إلغاء</button>
                                            </div>
                                        </div>    
                                        <div id="sub">
                                            <div class="control-group">
                                                <label class="control-label">إسم الدائرة</label>
                                                <div class="controls">
                                                    <input type="text" value="<?=$department_info[0]['DOWN1_NAME']?>" id="branch_name" class="span6" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">إسم المحكمة</label>
                                                <div class="controls">
                                                    <select id="parent_id" onchange="check_parent()" class="span6 chosen" data-placeholder="المحكمة التي تنتمي إليها" tabindex="1">
                                                        <option value=""></option>
                                                        <?php
                                                        $current_main = "";
                                                        foreach ($departments as $department) {
                                                            if ($current_main != $department['ROOT_NAME']) {
                                                                $current_main = $department['ROOT_NAME'];
                                                                ?>
                                                                <option <?php if (!(strcmp($department_info[0]['ROOT_ID'],$department['ROOT_ID']))) {echo "selected=\"selected\"";} ?> class="text-success bold large" value="<?= $department['ROOT_ID'] ?>"><?= $department['ROOT_NAME'] ?></option>
                                                                <?php if ($department['DOWN1_NAME'] != null){ ?>
                                                                <option value="not-accepted"><?php if ($department['DOWN1_NAME'] != null) echo '>'.$department['DOWN1_NAME'] ?></option>
                                                                <?php }?>
                                                            <?php } else { ?>
                                                                <option value="not-accepted"><?php if ($department['DOWN1_NAME'] != null) echo '>'.$department['DOWN1_NAME'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="help-inline">يجب إختيار إسم الإدارة فقط</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">رقم الهاتف</label>
                                                <div class="controls">
                                                    <input type="text" value="<?=$department_info[0]['PHONE']?>" id="phone" class="span6 " />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">العنوان</label>
                                                <div class="controls">
                                                    <input type="text" value="<?=$department_info[0]['DOWN1_ADDRESS']?>" id="addressSub" placeholder="يجب إدخالة إذا كان مخالفا لمكان المحكمة" class="span6 " />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">رقم الجوال</label>
                                                <div class="controls">
                                                    <input type="text" value="<?=$department_info[0]['MOBILE']?>" id="mobile" class="span6 " />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">رقم الفاكس</label>
                                                <div class="controls">
                                                    <input type="text" value="<?=$department_info[0]['FAX']?>" id="fax" class="span6 " />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">ملاحـظات</label>
                                                <div class="controls">
                                                    <textarea id="notesSub" class="span6 " rows="3"><?=$department_info[0]['DOWN1_NOTES']?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-success" onclick="update_department()">حـفظ</button>
                                                <button type="reset" id="reset" class="btn">إلغاء</button>
                                            </div>
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
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>resource/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.init();
                $('#main').hide();
                $('#sub').show();
            });
            
            function check_parent(){
                var x = $('#parent_id').val();
                var y = $( "#parent_id option:selected" ).text();
                if (y.indexOf(">") !=-1) {
                     $('#parent_id').val('').trigger('liszt:updated');;
                }
            }
            
            var checked= 'sub';
            function checkType() {
                if ($("input:radio[name=insertType]:checked").val() == 'main') {
                    checked = 'main';
                    $('#sub').hide();
                    $('#main').show();
                } else if ($("input:radio[name=insertType]:checked").val() == 'sub') {
                    checked = 'sub';
                    $('#main').hide();
                    $('#sub').show();
                }
            }
            
            function update_department() {
                if (checked == 'main') {
                    var department_id = '<?=$department_info[0]['ROOT_ID']?>';
                    var department_name = $('#department_name').val();
                    var address = $('#address').val();
                    var notes = $('#notes').val();
                    var phone = '';
                    var mobile = '';
                    var fax = '';
                    var parent_id = 0;
                } else if (checked == 'sub') {
                    var department_id = '<?=$department_info[0]['DOWN1_ID']?>';
                    var department_name = $('#branch_name').val();
                    var address = $('#addressSub').val();
                    var phone = $('#phone').val();
                    var mobile = $('#mobile').val();
                    var fax = $('#fax').val();
                    var parent_id = $('#parent_id').val();
                    var notes = $('#notesSub').val();
                }
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "departments/do_update_department/"; ?>',
                    data: {
                        department_id: department_id,
                        department_name: department_name,
                        address: address,
                        phone: phone,
                        notes: notes,
                        mobile: mobile,
                        fax: fax,
                        parent_id: parent_id
                    },
                    dataType: "json",
                    success: function(json) {
                        if (json['status'] == true) {
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
                return false;
            }
        </script>
        <!-- END JAVASCRIPTS -->   
    </body>
    <!-- END BODY -->
</html>