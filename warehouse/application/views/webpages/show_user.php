<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-title">
                <h4><i class="icon-user"></i>بيانات المستخدم</h4>
            </div>
            <div class="widget-body">
                <div class="span9">
                    <!-- BEGIN FORM-->
                    <form method="POST" onsubmit="return false;" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">إسم المستخدم بالكامل</label>
                            <div class="controls">
                                <label class="control-label span12"><?= $info[0]['FIRST_NAME'] . ' ' . $info[0]['MIDDLE_NAME'] . ' ' . $info[0]['LAST_NAME'] ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">إسم الإدارة</label>
                            <div class="controls">
                                <label id="order_number" class="control-label"><?= $info[0]['DEPARTMENT_NAME'] ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">الرقم الوظيفي</label>
                            <div class="controls">
                                <label class="control-label"><?= $info[0]['EMPLOYEE_NUMBER'] ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">صلاحية المستخدم</label>
                            <div class="controls">
                                <label class="control-label"><?= $info[0]['ROLE_NAME'] ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">رقم الجوال</label>
                            <div class="controls">
                                <label class="control-label"><?= $info[0]['MOBILE_NUMBER'] ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">رقم الهاتف</label>
                            <div class="controls">
                                <label class="control-label"><?= $info[0]['PHONE_NUMBER'] ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">البريد الإلكتروني</label>
                            <div class="controls">
                                <label class="control-label"><?= $info[0]['EMAIL'] ?></label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">إسم الدخول</label>
                            <div class="controls">
                                <label class="control-label"><?= $info[0]['USERNAME'] ?></label>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END FORM-->
                <div class="span3">
                    <div class="text-center profile-pic">
                        <?php if (file_exists('./uploads/'.$info[0]['USER_PICTURE'])) {?>
                        <img class="max_size border" src='<?=base_url().'uploads/'.$info[0]['USER_PICTURE']?>' alt="صورة المستخدم">
                        <?php }else{?>
                        <img class="max_size border" src="<?php echo base_url(); ?>resource/img/profile-pic.jpg" alt="صورة المستخدم">
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="space5"></div>
        </div>
    </div>
</div>
</div>