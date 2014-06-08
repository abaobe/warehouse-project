<table class="table table-striped table-bordered" id="sample_2">
    <thead>
        <tr>
            <th class="hidden-phone">تم شراءه من</th>
            <th class="hidden-phone">طبيعة الصنف</th>
            <th class="hidden-phone">السعر</th>
            <th class="hidden-phone">حالة الصنف</th>
            <th class="hidden-phone">المدة الزمنية</th>
            <th class="hidden-phone">تاريخ الإنتهاء</th>
            <th class="hidden-phone">الرقم التسلسلي</th>
            <th class="hidden-phone">معلومات الصرف</th>
            <th class="hidden-phone">قائـمة المهام</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; foreach ($product_info as $value) {
                ?>
                <tr class="odd gradeX" index="<?=$i?>" voucherID="<?=$value['VOUCHER_ID']?>" serial_number="<?= $value['SERIAL_NUMBER'] ?>" product_status="<?= $value['PRODUCT_STATUS'] ?>">
                    <td class="hidden-phone"><?= $value['COMPANY_NAME'] ?></td>
                    <td class="hidden-phone"><?= $value['PRODUCT_NATURE'] ?></td>
                    <td class="hidden-phone"><?= $value['UNIT_PRICE'] ?></td>
                    <td class="hidden-phone"><?= $value['PRODUCT_STATUS'] ?></td>
                    <td class="hidden-phone"><?= $value['SUPPLY_TYPE'] ?></td>
                    <td class="hidden-phone"><?= $value['EXPIRE_DATE'] ?></td>
                    <td class="hidden-phone"><?= $value['SERIAL_NUMBER'] ?></td>
                    <td class="hidden-phone">
                        <input id="return_date" class="m-ctrl-medium date-picker span4" placeholder="تـاريخ الإرجاع" size="16" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span>
                        <input type="text" id="notes" placeholder="ملاحظة" class="span5" />
                    <td class="hidden-phone">
                        <button class="btn btn-success" onclick="addToCart(this)"><i class="icon-ok"></i></button>
                    </td>
                </tr>
        <?php ++$i;} ?>
    </tbody>
</table>
<script>
    jQuery(document).ready(function() {
        $('#sample_2').dataTable();
    });
    $('.date-picker').datepicker({
        format: "yyyy/mm/dd"
    });
</script>