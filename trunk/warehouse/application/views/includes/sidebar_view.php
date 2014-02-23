<div id="sidebar" class="nav-collapse collapse">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler hidden-phone"></div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
            <input type="text" class="search-query" placeholder="Search" />
        </form>
    </div>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="sidebar-menu">
        <li class="has-sub">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="index.html">Dashboard 1</a></li>
                <li><a class="" href="index_2.html">Dashboard 2</a></li>

            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-dashboard"></i></span> إدارة الأصناف
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="<?php echo base_url() . "product/add_product"; ?>">إضافة صنف جديد </a></li>
                <li><a class="" href="<?php echo base_url() . "product/show_all_products"; ?>">حذف وتعديل الأصناف</a></li>
                <li><a class="" href="<?php echo base_url() . "product/insert_products"; ?>">نموذج إدخال لوازم</a></li>
                <li><a class="" href="<?php echo base_url() . "product/supplies_order"; ?>">نموذج طلب لوازم</a></li>
                <li><a class="" href="<?php echo base_url() . "product/show_ordered_supplies"; ?>">إدارة صرف اللوازم</a></li>
                <li><a class="" href="<?php echo base_url() . "departments/inventory_supplies"; ?>">جـرد اللوازم</a></li>
                <li><a class="" href="<?php echo base_url() . "departments/add_department"; ?>">إضافة دائرة جديدة</a></li>
                <li><a class="" href="<?php echo base_url() . "product/show_all_borrowing"; ?>">إدارة الأصناف المعارة</a></li>
            </ul>
        </li>
        <!-- END SIDEBAR MENU -->
</div>