<head>
    <meta charset="utf-8" />
    <title>Data Tables</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
    <?php
    $this->load->library('MPDF57/mpdf');

    $aaa;
    $out_data.='
<div class = "wrapper" >
<div class = "header"><div style = "width:33.3%;float:left;"><br/>
<h4 align = "center" style="font-family: Times New Roman;font-size:12pt;margin:5">Palestine National Authority</h4><h4 align = "center" style="font-size:12pt;margin:5;">High Judicial Council</h4><h4 align = "center" style = "margin:0;">Stores Department</h4></div><div align = "center" style = "width:33.3%;float:left;"><br/><img src="resource/img/logo.png" width = "30%" height = "35%"></div><div style = "width:33.3%;float:left;"><br/><h4 align ="center" style = "margin:5;">السـلطـة الوطــنـية الـفـلـسـطـيـنـة</h4><h4 align = "center" style = "margin:5;">المجلس الأعلى للقضاء</h4><h4 align = "center" style = "margin:5;">دائرة المخازن</h4></div><hr/></div>
<div class = "row"><div style = "float:left;width:33%;text-align: left"><label>رقم ...' . $products[0][9] . '... :</label></div><div style = "float:left;width:33%;text-align: center"><label>مستند إدخال اللوازم</label></div><div style = "float:left;width:33%"></div></div><div class = "row" id="hide_header"><div style = "float:left;width:33%;text-align: left"><label>بتاريخ ...'.$products[0][8].'... :</p></div><div style = "float:left;width:33%;text-align: center"><label>بموجب فاتورة رقم ...' .$products[0][2].'... :</label></div><div style = "float:left;width:33%"><label>استلمت من ...'.$products[0][11].'... :</label></div></div>
    <div class = "row">
        <table border="1">
            <thead>
                <tr>
                    <th style = "width:10%" rowspan="2"><p align = "center"> الرقم</p></th>
            <th style = "width:30%" rowspan="2"><p align = "center">وصف المادة ومواصفاتها</p> </th>
            <th style = "width:10%" colspan = "3"><p align = "center">المقاسات</p></th>
            <th style = "width:10%" rowspan="2">الحالة</th>
            <th style = "width:10%" rowspan="2">الوحدة</th>
            <th style = "width:10%" rowspan="2">الكمية</th>
            <th style = "width:10%" rowspan="2">التكلفة</th>
            <th style = "width:10%" rowspan="2">S/N</th>
            <th style = "width:10%;text-align: start" rowspan="2">ملاحظات</th>
            </tr>
            <tr>
                <th><p class="rotate">الطول</p></th>
            <th><p class = "rotate">العرض</p></th>
            <th><p class = "rotate">الإرتفاع</p></th>
            </tr>
            </thead>
            <tbody>';
                
                $i = 1;
                foreach ($products as $item) {
                    
                    $out_data.='<tr>
                        <td>'.$i.'</td>
                        <td>'.  $item[10][0]['PRODUCT_NAME'] .'</td>
                        <td>'.$item[10][0]['H_LENGTH'] .'</td>
                        <td>'.$item[10][0]['WIDTH'].'</td>
                        <td>'.$item[10][0]['HEIGHT'].'</td>
                        <td> </td>';
                    $unit_name;
                    if ($item[5]=='primary') {
                        $unit_name=$item[10][0]['PRIMARY_UNIT_NAME'];
                    }else{
                        $unit_name=$item[10][0]['SECONDARY_UNIT_NAME'];
                    }
                       $out_data.=' <td>'.  $unit_name .'</td>
                        <td>'.$item[4].'</td>
                        <td> '.$item[6]*$item[4].'</td>
                        <td> </td>
                        <td>مستهلكة</td>
                    </tr>';
                    
                    $i++;
                }
                
                foreach ($services as $item) {
                    
                    $out_data.='<tr>
                        <td>'.$i.'</td>
                        <td>'. $item[0] .'</td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>'.$item[8].'</td>
                        <td>'.$item[4].'</td>
                        <td> </td>
                        <td>'.$item[3].'(خدمة)</td>
                    </tr>';
                    
                    $i++;
                }
            
            $out_data.='</tbody>
        </table></div>
    <div class = "row" ><div style = "float:left;width:50%;text-align: center"><label>التاريخ : .............</label></div><div style = "float:left;width:49.5%;text-align: right;"><label>استلمت اللوازم المذكورة أعلاه حسب الأصول</label></div></div>
    <div class = "row">
        <div style = "float:left;width:50%;text-align: center"><label>توقيعه : .............</label></div>
        <div style = "float:left;width:49.5%;text-align: right;"><label>اسم المستلم / أمين المستودع ........................</label></div>
    </div>                        
</div><!--end of wrapper-->
<div id = "footer" >
    <p style = "margin-bottom:10px">غزة - شارع المحاكم - مجمع المحاكم - مقابل ملعب اليرموك</p>
    <p>TEL: 2829289     FAX: 2829289     E-MAIL: adminfa@moj.ps</p>
</div>
<div id = "note">
    <label>ملاحظة / أية تغيير أو شطب في البيانات يلغي المستند</label>
</div>';

    $this->load->library('MPDF57/mpdf');
    $mpdf = new mPDF('ar', 'A4', '', '', 0, 0, 0, 0, 0, 0);
    $mpdf->SetDirectionality('rtl');
// $mpdf->SetAutoFont();
//$mpdf = new mPDF();
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
//$stylesheet = file_get_contents('resource/assets/temp/bootstrap.min.css'); // external css
    $stylesheet = file_get_contents('resource/css/custom_style.css'); // external css

    $mpdf->WriteHTML($stylesheet, 1);
    $mpdf->WriteHTML($out_data, 2);

    ob_end_clean();
//echo $stylesheet;
//
//
    $mpdf->Output();


    //exit;
    ?>
</body>
<!-- END BODY -->
</html>

