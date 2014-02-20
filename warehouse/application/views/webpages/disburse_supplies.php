<?php $i = 0; ?>
<div class="span12">
    <!-- BEGIN SAMPLE FORM widget-->
    <div class="widget">
        <!--<button class="btn btn-success" onclick="do_all_disburse_supplies()">صرف الطلب</button>-->
        <div class="widget-title">
            <h4><i class="icon-reorder"></i>صرف لوازم</h4>
        </div>
        <div class="widget-body form">
            <div class="accordion" id="accordion1">
                <?php foreach ($supplies as $info) { ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?= $i ?>">
                                <i class="icon-plus"></i>
                                <?= '# ' . $info['PRODUCT_NAME'] ?>
                                <span class="left_info" status="<?=$info['STATUS']?>"></span>
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
                                        <label class="control-label">مقدم من</label>
                                        <div class="controls">
                                            <label class="control-label"><?= $info['PROVIDED_FROM'] ?></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">رقم الطلب</label>
                                        <div class="controls">
                                            <label id="order_number" class="control-label" order_id="<?= $info['ORDER_ID'] ?>"><?= $info['ORDER_NUMBER'] ?></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">إسم الصنف</label>
                                        <div class="controls">
                                            <label class="control-label"><?= $info['PRODUCT_NAME'] ?></label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">الكمية المطلوبة</label>
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
                                        <label class="control-label">الكمية المتوفرة</label>
                                        <div class="controls">
                                            <label class="control-label"><?php echo $info['PRIMARY_UNIT_NAME'] . $info['PRIMARY_UNIT_QUANTITY'] . ' || ' . $info['SECONDARY_UNIT_NAME'] . $info['SECONDARY_UNIT_QUANTITY'] ?></label>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">الكمية المراد صرفها</label>
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
                                            <input type="text" id="quantity_disbursed" placeholder="الكمية بالأرقام" value="<?= $info['QUANTITY'] ?>" class="input-small" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">ملاحـظات</label>
                                        <div class="controls">
                                            <textarea id="notes" class="span10 prevent_resize" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-success" onclick="do_disburse_supplies(this)">إرسال</button>
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
    function do_disburse_supplies(ref) {
        var form = ref.form;
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() . "product/do_disburse_supplies/"; ?>',
            data: {
                order_number: $('#' + $(form).attr('id') + ' #order_number').attr('order_id'),
                quantity_disbursed: $('#' + $(form).attr('id') + ' #quantity_disbursed').val(),
                unit_type: $('#' + $(form).attr('id') + ' #unit_type').val(),
                notes: $('#' + $(form).attr('id') + ' #notes').val()
            },
            dataType: "json",
            success: function(json) {
                if (json == 1) {
                    $('#' + $(form).attr('id') + ' #status').removeClass('alert-error').addClass('alert alert-success');
                    $('#' + $(form).attr('id') + ' #message').text("تم صرف الكمية");
                    reloadPage = '<?php echo base_url() . "product/show_ordered_supplies/"; ?>';
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
        if (status == "refuse") {
            $(this).addClass('badge badge-important').text("لم يصرف");
        } else if (status == "accept") {
            $(this).addClass('badge badge-success').text("تم صرفة");
        } else if (status == "waiting") {
            $(this).addClass('badge badge-info').text("بإنتظار الصرف");
        }
    });

    function do_all_disburse_supplies() {
        for (i = 0; i < <?= $i ?>; i++) {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() . "product/do_all_disburse_supplies/"; ?>',
                data: {
                    order_number: $('#add_form' + i + ' #order_number').attr('order_id'),
                    quantity_disbursed: $('#add_form' + i + ' #quantity_disbursed').val(),
                    unit_type: $('#add_form' + i + ' #unit_type').val(),
                    notes: $('#add_form' + i + ' #notes').val(),
                    size: <?php echo $i - 1 ?>,
                    index: i
                },
                dataType: "json",
                success: function(json) {
                    if (json == 1) {
                        $('#add_form' + i + ' #status').removeClass('alert-error').addClass('alert alert-success');
                        $('#add_form' + i + ' #message').text("تم صرف الكمية");
                        reloadPage = '<?php echo base_url() . "product/show_ordered_supplies/"; ?>';
                    } else {
                        $('#add_form' + i + ' #status').addClass('alert alert-error');
                        $('#add_form' + i + ' #message').removeClass('alert-success').text("يجب عليك التأكد من البيانات المدخلة");
                    }
                }, error: function() {
                    $('#message').text("هناك خطأ في تخزين البيانات");
                }
            });
        }
    }
</script>