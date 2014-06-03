<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>الصفحة الرئيسية</title>
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
        <link href="<?php echo base_url(); ?>resource/assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
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
                                <small></small>
                                إحصائيات
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">إحصائيات</a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">الصفحة الرئيسية</a><span class="divider-last">&nbsp;</span></li>
                                <li class="pull-right search-wrap">
                                    <form class="hidden-phone">
                                        <div class="search-input-area">
                                            <input id=" " class="search-query" type="text" placeholder="Search">
                                            <i class="icon-search"></i>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div id="page" class="dashboard">
                        <!-- BEGIN OVERVIEW STATISTIC BARS-->
                        <div class="row-fluid metro-overview-cont">
                            <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                                <div class="metro-overview turquoise-color clearfix">
                                    <div class="display">
                                        <i class="icon-group"></i>
                                        <div class="percent"><a href="#" onclick="usersInfo();" data-reveal-id="myModal">ملخص</a></div>
                                    </div>
                                    <div class="details">
                                        <div class="numbers"><?= $statistics['USERS_COUNT'][0] ?></div>
                                        <a href="<?php echo base_url() . "users/users_management/"; ?>">
                                            <div class="title">المستخدمـين</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                                <div class="metro-overview red-color clearfix">
                                    <div class="display">
                                        <i class="icon-tags"></i>
                                        <div class="percent">ملخص</div>
                                    </div>
                                    <div class="details">
                                        <div class="numbers"><?= $statistics['PRODUCTS_COUNT'][0] ?></div>
                                        <a href="<?php echo base_url() . "product/show_all_products/"; ?>">
                                            <div class="title">الأصـناف</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                                <div class="metro-overview green-color clearfix">
                                    <div class="display">
                                        <i class="icon-shopping-cart"></i>
                                        <div class="percent">ملخص</div>
                                    </div>
                                    <div class="details">
                                        <div class="numbers"><?= $statistics['SUBDEPARTMENTS_COUNT'][0] ?></div>
                                        <a href="<?php echo base_url() . "departments/manage_departments/"; ?>">
                                            <div class="title">الدوائر والإدارات</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-desktop="span2" data-tablet="span4 fix-margin" class="span2 responsive">
                                <div class="metro-overview gray-color clearfix">
                                    <div class="display">
                                        <i class="icon-comments-alt"></i>
                                        <div class="percent">ملخص</div>
                                    </div>
                                    <div class="details">
                                        <div class="numbers"><?= $statistics['ORDERS_COUNT'][0] ?></div>
                                        <a href="<?php echo base_url() . "product/show_ordered_supplies/"; ?>">
                                            <div class="title">الطلبيات</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                                <div class="metro-overview purple-color clearfix">
                                    <div class="display">
                                        <i class="icon-envelope"></i>
                                        <div class="percent">ملخص</div>
                                    </div>
                                    <div class="details">
                                        <div class="numbers">1130</div>
                                        <div class="title">بريد الرسائل</div>
                                    </div>
                                </div>
                            </div>
                            <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                                <div class="metro-overview blue-color clearfix">
                                    <div class="display">
                                        <i class="icon-bell"></i>
                                        <div class="percent">ملخص</div>
                                    </div>
                                    <div class="details">
                                        <div class="numbers">170</div>
                                        <div class="title">الإشـعارات</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END OVERVIEW STATISTIC BARS-->
                        <div class="row-fluid">
                            <div class="span8">
                                <!-- BEGIN SITE VISITS PORTLET-->
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-bar-chart"></i> معدل الطلب على الأصناف</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <div id="site_statistics_loading">
                                            <img src="<?php echo base_url(); ?>resource/img/loading.gif" alt="loading" />
                                        </div>
                                        <div id="site_statistics_content" class="hide">
                                            <div id="site_statistics" class="chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SITE VISITS PORTLET-->
                            </div>
                            <div class="span4">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-book"></i>الأصناف الأكثر طلباً</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>إسم الصنف</th>
                                                    <th>عدد الطلبات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($top_ordered as $product) { ?>
                                                    <tr>
                                                        <td><?= $product['PRODUCT_NAME'] ?></td>
                                                        <td><strong><?= $product['ORDERS_COUNT'] ?></strong></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <!-- BEGIN SERVER LOAD PORTLET-->
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-umbrella"></i> مدى إستخدام الموقع</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <div id="load_statistics_loading">
                                            <img src="<?php echo base_url(); ?>resource/img/loading.gif" alt="loading" />
                                        </div>
                                        <div id="load_statistics_content" class="hide">
                                            <div id="load_statistics" class="chart"></div>
                                            <div class="btn-toolbar no-bottom-space clearfix">
                                                <div class="btn-group" data-toggle="buttons-radio">
                                                    <button class="btn btn-mini">Web</button><button class="btn btn-mini">Database</button><button class="btn btn-mini">Static</button>
                                                </div>
                                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                                                    <button class="btn btn-mini active">Asia</button><button class="btn btn-mini">
                                                        <span class="visible-phone">Eur</span>
                                                        <span class="hidden-phone">Europe</span>
                                                    </button><button class="btn btn-mini">USA</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SERVER LOAD PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->
            <!-- START POPUP PAGE -->
            <div id="myModal" class="reveal-modal large">
                <div class="widget">
                    <div class="widget-title">
                        <h4 id="titlePop"><i class="icon-user"></i></h4>
                    </div>
                    <div class="widget-body">
                        <!-- BEGIN FORM-->
                        <form method="POST" id="infoForm" onsubmit="return false;" class="form-horizontal">
                            <div id="modal"><h4>لم يتم إيجاد الصفحة التي قمت بطلبها</h4></div>
                        </form>
                    </div>
                </div>
                <a class="close-reveal-modal">&#215;</a>
            </div>
            <!-- END POPUP PAGE -->
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <?php $this->load->view('includes/footer_view'); ?>
            <!-- END FOOTER -->
            <!-- BEGIN JAVASCRIPTS -->
            <!-- Load javascripts at bottom, this will reduce page load time -->
            <script src="<?php echo base_url(); ?>resource/js/jquery-1.8.3.min.js"></script>
            <script src="<?php echo base_url(); ?>resource/assets/bootstrap-rtl/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url(); ?>resource/js/jquery.blockui.js"></script>
            <script src="<?php echo base_url(); ?>resource/js/jquery.cookie.js"></script>
            <!-- ie8 fixes -->
            <!--[if lt IE 9]>
            <script src="js/excanvas.js"></script>
            <script src="js/respond.js"></script>
            <![endif]-->
            <script src="<?php echo base_url(); ?>resource/assets/flot/jquery.flot.js"></script>
            <script src="<?php echo base_url(); ?>resource/assets/flot/jquery.flot.pie.js"></script>
            <script src="<?php echo base_url(); ?>resource/js/jquery.peity.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>resource/assets/uniform/jquery.uniform.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>resource/js/scripts.js"></script>
            <script src="<?php echo base_url(); ?>resource/assets/custombox/jquery.reveal.js" type="text/javascript"></script>

            <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
            <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.setMainPage(true);
                App.init();
            });

            function usersInfo() {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "users/users_statistics/"; ?>',
                    dataType: "json",
                    success: function(data) {
                        
                        var info = '<div class="control-group">'+
                            '<label class="control-label">عدد المستخدمين المتاحين</label>'+
                            '<div class="controls">'+
                                '<label class="control-label span12">' + data['info'][0].ACTIVE_USERS+ '</label>'+
                            '</div>'+
                        '</div>'+
                        '<div class="control-group">'+
                            '<label class="control-label">عدد المستخدمين الغير متاحين</label>'+
                            '<div class="controls">'+
                                '<label class="control-label span12">' + data['info'][0].INACTIVE_USERS + '</label>'+
                            '</div>'+
                        '</div>';
                        $('#titlePop').text('الإحصائيات المتعلقة بالمستخدمين');
                        $('#infoForm').html(info);
                    }
                });
            }
            </script>
            <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>