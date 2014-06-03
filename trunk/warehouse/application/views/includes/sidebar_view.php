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
                <li><a class="" href="<?php echo base_url() . "product/statistics"; ?>">الصفحة الرئيسية</a></li>
            </ul>
        </li>
        <?php if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO || USER_ROLE == ROLE_THREE) { ?>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <span class="icon-box"> <i class="icon-tasks"></i></span> قسم الأصناف
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                <?php 
                switch (USER_ROLE) {
                    case ROLE_ONE:
                        echo "<li><a class='' href=".base_url() . "product/add_product".">إضافة صنف جديد </a></li>";
                        echo "<li><a class='' href=".base_url() . "product/show_all_products".">حذف وتعديل الأصناف</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/insert_products".">نموذج إدخال لوازم</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/insert_static_product".">إضـافة مواد طويلة الأجل</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/show_ordered_supplies".">إدارة صرف اللوازم</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/show_static_products".">إدارة المواد الطويلة الأجل</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/audit_returns".">تدقيق العهد المرجعه والمستحقه</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/damage_products".">إدارة العهد التالفة</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/manage_temp_output".">إدارة المخرجات مؤقتا </a></li>";
                        echo "<li><a class='' href=".base_url() . "departments/inventory_supplies".">جـرد اللوازم</a></li>";
                        echo "<li><a class='' href=".base_url() . "services/add_service".">إضـافة خـدمة</a></li>";
                    break;
                    case ROLE_TWO:
                        echo "<li><a class='' href=".base_url() . "product/show_all_products"."> عرض الأصناف والإدخالات</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/show_ordered_supplies".">إدارة صرف اللوازم</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/show_static_products".">إدارة المواد الطويلة الأجل</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/audit_returns".">تدقيق العهد المرجعه والمستحقه</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/damage_products".">إدارة العهد التالفة</a></li>";
                        echo "<li><a class='' href=".base_url() . "departments/inventory_supplies".">جـرد اللوازم</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/manage_temp_output".">إدارة المخرجات مؤقتا </a></li>";
                    break;
                    case ROLE_THREE:
                        echo "<li><a class='' href=".base_url() . "product/supplies_order".">طلب لوازم مستهلكة</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/static_supplies_order".">طلب لوازم ثابتة</a></li>";
                        echo "<li><a class='' href=".base_url() . "product/department_borrowing".">العهد الموجود في الدائر</a></li>";
                    break;
                    default:
                    break;
                }?>
               </ul>
            </li>
        <?php } ?>
        <?php if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) { ?>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <span class="icon-box"> <i class="icon-sitemap"></i></span> قسم الإدارات والدوائر 
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                <?php
                switch (USER_ROLE) {
                    case ROLE_ONE:
                        echo "<li><a class='' href=".base_url() . "departments/add_department".">إضافة دائرة جديدة</a></li>";
                        echo "<li><a class='' href=".base_url() . "departments/manage_departments".">إدارة الدوائر والإدارات</a></li>";
                        break;
                    case ROLE_TWO:
                        echo "<li><a class='' href=".base_url() . "departments/manage_departments".">إدارة الدوائر والإدارات</a></li>";
                    break;
                    default:
                    break;
                }?>    
                </ul>
            </li>
        <?php } ?>
        <?php if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) { ?>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <span class="icon-box"> <i class="icon-reorder"></i></span> قسم الفئات والفروع  
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <?php switch (USER_ROLE) {
                        case ROLE_ONE:
                            echo "<li><a class='' href=".base_url() . "categories/add_category"."> إضـافة فئـه </a></li>";
                            echo "<li><a class='' href=".base_url() . "categories/manage_categories".">إدراة الفئات</a></li>";
                            break;
                        case ROLE_TWO:
                            echo "<li><a class='' href=".base_url() . "categories/manage_categories".">إدراة الفئات</a></li>";
                        break;
                        default:
                        break;
                    }?>    
                </ul>
            </li>
        <?php } ?>
        <?php if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_TWO) { ?>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <span class="icon-box"> <i class="icon-briefcase"></i></span> قسم الشركات   
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <?php switch (USER_ROLE) {
                        case ROLE_ONE:
                            echo "<li><a class='' href=".base_url() . "companies/add_company".">إضافة شركة</a></li>";
                            echo "<li><a class='' href=".base_url() . "companies/manage_companies".">إدارة الشركات</a></li>";
                            break;
                        case ROLE_TWO:
                            echo "<li><a class='' href=".base_url() . "companies/manage_companies".">إدارة الشركات</a></li>";
                        break;
                        default:
                        break;
                    }?>    
                </ul>
            </li>
        <?php } ?>
        <?php if (USER_ROLE == ROLE_ONE || USER_ROLE == ROLE_FOUR || USER_ROLE == ROLE_TWO) { ?>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <span class="icon-box"><i class="icon-user"></i></span> قسم شؤون الموظفين
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <?php switch (USER_ROLE) {
                        case ROLE_ONE:
                            echo "<li><a class='' href=".base_url() . "users/add_user".">إضـافة مستخدم جديد</a></li>";
                            echo "<li><a class='' href=".base_url() . "users/users_management".">إدراة المستخدمين</a></li>";
                        break;
                        case ROLE_FOUR:
                            echo "<li><a class='' href=".base_url() . "users/add_user".">إضـافة مستخدم جديد</a></li>";
                            echo "<li><a class='' href=".base_url() . "users/users_management".">إدراة المستخدمين</a></li>";
                        break;
                        case ROLE_TWO:
                            echo "<li><a class='' href=".base_url() . "users/users_management".">إدراة المستخدمين</a></li>";
                        break;
                        default:
                        break;
                    }?>  
                </ul>
            </li>
        <?php } ?>
        <li class="has-sub">
            <a href="javascript:;" class="">
                <span class="icon-box"><i class="icon-file-alt"></i></span> قسم التقارير
                <span class="arrow"></span>
            </a>
            <ul class="sub">

            </ul>
        </li>
        <?php if (USER_ROLE == ROLE_ONE) { ?>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <span class="icon-box"><i class="icon-cogs"></i></span> إعدادات الموقع
                    <span class="arrow"></span>
                </a>
                <ul class="sub">

                </ul>
            </li>
        <?php } ?>
        <!-- END SIDEBAR MENU -->
</div>