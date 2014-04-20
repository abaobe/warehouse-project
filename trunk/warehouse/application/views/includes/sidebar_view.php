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
                <span class="icon-box"> <i class="icon-dashboard"></i></span> إحـصـائـيات
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="<?php echo base_url() . "product/main_page"; ?>">الصفحة الرئيسية</a></li>

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
                <li><a class="" href="<?php echo base_url() . "departments/inventory_supplies"; ?>">جـرد اللوازم</a></li>
                <li><a class="" href="<?php echo base_url() . "departments/add_department"; ?>">إضافة دائرة جديدة</a></li>
                
                <li><a class="" href="<?php echo base_url() . "product/insert_static_product"; ?>">إضـافة عهدة</a></li>
                <li><a class="" href="<?php echo base_url() . "product/show_static_products"; ?>">إدارة المواد الثابتة</a></li>
                <li><a class="" href="<?php echo base_url() . "product/audit_returns"; ?>">تدقيق العهد المرجعه والمستحقه</a></li>
                <li><a class="" href="<?php echo base_url() . "product/department_borrowing"; ?>">العهد الموجود في الدائر
                
                <li><a class="" href="<?php echo base_url() . "categories/add_category"; ?>"> إضـافة فئـه </a></li>
                <li><a class="" href="<?php echo base_url() . "categories/manage_categories"; ?>">إدراة الفئات</a></li>
                <li><a class="" href="<?php echo base_url() . "services/add_service"; ?>">إضـافة خـدمة</a></li>
                <li><a class="" href="<?php echo base_url() . "companies/add_company"; ?>">إضافة شركة</a></li>
                <li><a class="" href="<?php echo base_url() . "companies/manage_companies"; ?>">إدارة الشركات</a></li>                        
                
                <li><a class="" href="<?php echo base_url() . "product/supplies_order"; ?>">نموذج طلب لوازم</a></li>
                <li><a class="" href="<?php echo base_url() . "product/static_supplies_order"; ?>">طلب لوازم ثابتة</a></li>
                <li><a class="" href="<?php echo base_url() . "product/show_ordered_supplies"; ?>">إدارة صرف اللوازم</a></li>
                <li><a class="" href="<?php echo base_url() . "product/damage_products"; ?>">إدارة العهد التالفة</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <span class="icon-box"> <i class="icon-dashboard"></i></span>  إعدادات الموقع
                <span class="arrow"></span>
            </a>
            <ul class="sub">
            </ul>
        </li>
        <!-- END SIDEBAR MENU -->
</div>