<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.2
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title> الصفحة الرئيسية</title>
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
        <link href="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
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
                                الصفحة الرئيسية
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
                        <!-- BEGIN OVERVIEW STATISTIC BLOCKS-->
                        <div class="row-fluid circle-state-overview">

                        </div>
                        <!-- END OVERVIEW STATISTIC BLOCKS-->

                        <div class="row-fluid">
                            <div class="span8">
                                <!-- BEGIN SITE VISITS PORTLET-->
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-bar-chart"></i> معدل تزايد الطلب على الأصناف</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <div id="site_statistics_loading">
                                            <img src="img/loading.gif" alt="loading" />
                                        </div>
                                        <div id="site_statistics_content" class="hide">
                                            <div id="site_statistics" class="chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SITE VISITS PORTLET-->
                            </div>
                            <div class="span4">
                                <!-- BEGIN SERVER LOAD PORTLET-->
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-umbrella"></i> مدى إستخدام النظام</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <div id="load_statistics_loading">
                                            <img src="img/loading.gif" alt="loading" />
                                        </div>
                                        <div id="load_statistics_content" class="hide" style="margin: 0px 0 20px 0">
                                            <div id="load_statistics" class="chart" style="height: 280px"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END SERVER LOAD PORTLET-->
                            </div>

                        </div>
                        <!-- BEGIN SQUARE STATISTIC BLOCKS-->
                        <div class="square-state">
                            <div class="row-fluid">
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-group"></i>
                                    <div>المستخدمين</div>
                                    <span class="badge badge-important">2</span>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-barcode"></i>
                                    <div>الاصناف</div>
                                    <span class="badge badge-success">4</span>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-bar-chart"></i>
                                    <div>التقارير</div>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-calendar"></i>
                                    <div>المهام</div>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-sitemap"></i>
                                    <div>الفئات</div>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-tasks"></i>
                                    <div>جدولة</div>
                                    <span class="badge badge-important">3</span>
                                </a>
                            </div>
                            <div class="row-fluid">
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-envelope"></i>
                                    <div>البريد</div>
                                    <span class="badge badge-info">12</span>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-bullhorn"></i>
                                    <div>اشعارات</div>
                                    <span class="badge badge-warning">3</span>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-plane"></i>
                                    <div>عهد</div>
                                    <span class="badge badge-info">21</span>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-money"></i>
                                    <div>امور مالية</div>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-thumbs-up"></i>
                                    <div>مراجعة</div>
                                    <span class="badge badge-info">2</span>
                                </a>
                                <a class="icon-btn span2" href="#">
                                    <i class="icon-wrench"></i>
                                    <div>اعدادت</div>
                                </a>
                            </div>
                        </div>
                        <!-- END SQUARE STATISTIC BLOCKS-->
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
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resource/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>resource/assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="<?php echo base_url(); ?>resource/assets/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>resource/assets/flot/jquery.flot.resize.js"></script>

        <script src="<?php echo base_url(); ?>resource/assets/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>resource/assets/flot/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url(); ?>resource/assets/flot/jquery.flot.crosshair.js"></script>

        <script src="<?php echo base_url(); ?>resource/js/jquery.peity.min.js"></script>
        <script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                App.setMainPage(true);
                App.init();
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>