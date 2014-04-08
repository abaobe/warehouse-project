<?php $i = 0; ?>
<div class="span12">
    <!-- BEGIN SAMPLE FORM widget-->
    <div class="widget">
        <!--<button class="btn btn-success" onclick="do_all_disburse_supplies()">صرف الطلب</button>-->
        <div class="widget-title">
            <h4><i class="icon-reorder"></i>ارجاع الأصناف المعارة</h4>
        </div>
        <div class="widget-body form">
            <div class="accordion" id="accordion1">
                <?php foreach ($borrowing as $info) { ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?= $i ?>">
                                <i class="icon-plus"></i>
                                <?= '# ' . $info['PRODUCT_NAME'] ?>
                                <span class="left_info" status="<?= $info['STATUS'] ?>"></span>
                            </a>
                        </div>
                        <div id="collapse_<?= $i ?>" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <!-- BEGIN FORM-->
                                <form method="POST" id="add_form<?php echo $i++; ?>" onsubmit="return false;" class="form-horizontal">
                                    <!-- Start Alert Message -->
                                    <div id="status" class="alert">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <span id="message"></span>
                                    </div>
                                    <!-- End Alert Message -->
                                    <div class="control-group">
                                        <label class="control-label">المستعير</label>
                                        <div class="controls">
                                            <label class="control-label"><?= $info['DEPARTMENT_NAME'] ?></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">رقم طلب الاعارة</label>
                                        <div class="controls">
                                            <label id="order_number" class="control-label" order_id="<?= $info['ORDER_ID'] ?>"><?= $info['ORDER_NUMBER'] ?></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">تاريخ الاعارة</label>
                                        <div class="controls">
                                            <label class="control-label"><?= $info['ADDED_DATE'] ?></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">إسم الصنف</label>
                                        <div class="controls">
                                            <label class="control-label"><?= $info['PRODUCT_NAME'] ?></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">حالة الصنف عند الاعارة</label>
                                        <div class="controls">
                                            <label class="control-label"><?= $info['STATUS_PRODUCT'] ?></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">الكمية المعارة</label>
                                        <div class="controls">
                                            <?php
                                            $unit_name = null;
                                            if ($info['UNIT_TYPE'] == 'primary') {
                                                $unit_name = $info['PRIMARY_UNIT_NAME'];
                                            } else {
                                                $unit_name = $info['SECONDARY_UNIT_NAME'];
                                            }
                                            ?>
                                            <label class="control-label"><?= $info['QUANTITY'] . ' ' . $unit_name ?></label>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">الكمية المراد ارجاعها</label>
                                        <div class="controls">
                                            <select class="span6" id="unit_type" name="unit_type" data-placeholder="الوحدة" tabindex="1">
                                                <option value="">إختيار</option>
                                                <?php if ($unit_name == $info['PRIMARY_UNIT_NAME']) { ?>
                                                    <option selected value="primary"><?= $info['PRIMARY_UNIT_NAME'] ?></option>
                                                    <option value="secondary"><?= $info['SECONDARY_UNIT_NAME'] ?></option>
                                                <?php } else { ?>
                                                    <option value="primary"><?= $info['PRIMARY_UNIT_NAME'] ?></option>
                                                    <option selected value="secondary"><?= $info['SECONDARY_UNIT_NAME'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="text" id="quantity_returned" placeholder="الكمية بالأرقام" value="<?= $info['QUANTITY'] ?>" class="input-small" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">حالة الصنف عند الارجاع</label>
                                        <div class="controls">
                                            <select id="status_returned" name="status_returned" >
                                                <option value="ممتازة">ممتازة</option>
                                                <option selected value="جيدة">جيدة</option>
                                                <option value="سيئة">سيئة</option>
                                            </select>
                                            <!--<input type="text" id="status_returned" placeholder="الحالة" class="input-small" />-->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">ملاحـظات</label>
                                        <div class="controls">
                                            <textarea id="notes" class="span10 prevent_resize" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-success" id="back_btn" borrowing_id="<?= $info['VOUCHER_ID'] ?>" onclick="do_return_borrowing(this)">إرجـاع</button>
                                        <button type="reset" id="reset" class="btn">إلغاء</button>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- END SAMPLE FORM widget-->
</div>
<script>
    function do_return_borrowing(ref) {
        var form = ref.form;
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() . "product/do_return_borrowing/"; ?>',
            data: {
                borrowing_id: $('#' + $(form).attr('id') + ' #back_btn').attr('borrowing_id'),
                quantity_returned: $('#' + $(form).attr('id') + ' #quantity_returned').val(),
                unit_type: $('#' + $(form).attr('id') + ' #unit_type').val(),
                status_returned: $('#' + $(form).attr('id') + ' #status_returned').val(),
                notes: $('#' + $(form).attr('id') + ' #notes').val()
            },
            dataType: "json",
            success: function(json) {
                //alert(json[0]['']);
                if (json == 1) {
                    $('#' + $(form).attr('id') + ' #status').removeClass('alert-error').addClass('alert alert-success');
                    $('#' + $(form).attr('id') + ' #message').text("تم اعادة الكمية");
                    reloadPage = '<?php echo base_url() . "product/show_all_borrowing/"; ?>';
                } else {
                    $('#' + $(form).attr('id') + ' #status').addClass('alert alert-error');
                    $('#' + $(form).attr('id') + ' #message').removeClass('alert-success').text("يجب عليك التأكد من البيانات المدخلة");
                }
            }, error: function() {
                $('#message').text("هناك خطأ في تخزين البيانات");
            }
        });
    }

    $("div span[status]").each(function() {
        var status = $(this).attr('status');
        if (status == "false") {
            $(this).addClass('badge badge-important').text("لم يتم الارجاع");
        } else if (status == "true") {
            $(this).addClass('badge badge-success').text("تم الارجاع");
        } else if (status == "some") {
            $(this).addClass('badge badge-info').text("تم إرجاع جزء");
        }
    });
    
</script>