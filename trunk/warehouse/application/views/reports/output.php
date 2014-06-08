<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
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
         $ttt = '<div class = "wrapper">'
             . '<div class = "header">'
             . '<div style = "width:33.3%;float:left;"><br/><h4 align = "center" style="font-family: Times New Roman;font-size:12pt;margin:5">Palestine National Authority</h4><h4 align = "center" style="font-size:12pt;margin:5;">High Judicial Council</h4><h4 align = "center" style = "margin:0;">Stores Department</h4></div>'
             . '<div align = "center" style = "width:33.3%;float:left;"><br/><img src="resource/img/logo.png" width = "30%" height = "35%"></div>'
             . '<div style = "width:33.3%;float:left;"><br/><h4 align ="center" style = "margin:5;">السـلطـة الوطــنـية الـفـلـسـطـيـنـة</h4><h4 align = "center" style = "margin:5;">المجلس الأعلى للقضاء</h4><h4 align = "center" style = "margin:5;">دائرة المخازن</h4></div>'
             . '<hr/>'
             . '</div>'
             .'<div class="row">
              <div style = "float:left;width:33.3%;text-align: center">رقم ...'.$disbursed[0][5].'... :</div>
              <div style = "float:left;width:33.3%;text-align: center">مستند إخراج اللوازم</div>
              <div style = "float:left;width:33%;"></div>
              
              </div>  
           
             <div class="row">
              <div style = "float:left;width:30%;text-align: center">بتاريخ ...'.date('y/m/d').'... :</div>
              <div style = "float:left;width:69.5%;text-align: right">بموجب طلب لوازم / ...'.$disbursed[0][5].'...</div>
              
          </div> '
             
             . '<div class = "row"><table border="1">
                                        <thead>
                                            <tr>
                                                <!--data-set="#sample_1 .checkboxes"-->
                                                <th style = "width:10%"><p align = "center">الرقم</p></th>
                                                <th style = "width:10%"><p align = "center">إســـــــــــم الصنف</p></th>
                                                <th style = "width:10%"><p align = "center">الوحدة</p></th>
                                                <th style = "width:10%"><p align = "center">الكمية</p></th>
                                                <th style = "width:10%"><p align = "center">لغايات</p></th>

                                        </thead>
                                        <tbody>';
                                        $i=1;
                             foreach ($disbursed as $value) {
    
                                               $ttt.='<tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$value[6].'</td>
                                                    <td>'.$value[7].'</td>
                                                    <td>'.$value[1].'</td>
                                                    <td>'.$value[3].'</td>
                                                </tr>';
                                             $i++;
                             }
                                        $ttt.='</tbody>
                                    </table></div>'
                 .'<div class="row">
                                            <div style = "float:left;width:50%;">
                                                اسم المستلم :     ـــــــــــــــــــــــــــ
                                            </div>
                                            <div style = "float:left;width:49.5%;text-align: right">
                                                استلمت اللوازم المذكورة اعلاه.
                                            </div>
                                        </div>
                                        
                                   
                                        <div class="row">
                                            <div style = "float:left;width:33.3%;">
                                                توقيعه : ــــــــــــــــ
                                            </div>
                                            <div style = "float:left;width:33.3%;">
                                                الوظيفة : ـــــــــــــــــــــــ
                                            </div>
                                            <div style = "float:left;width:33%;text-align: right">
                                                التاريخ : ــــــــــــــــــ
                                            </div>
                                        </div>'
                                   
             . '</div><!--end of wrapper-->'
            . '<div id = "footer">'
             . '<p style = "margin-bottom:10px">غزة - شارع المحاكم - مجمع المحاكم - مقابل ملعب اليرموك</p>'
             . '<p>TEL: 2829289     FAX: 2829289     E-MAIL: adminfa@moj.ps</p>'
             . '</div>'
             . '<div id = "note">'
             . '<label>ملاحظة / أية تغيير أو شطب في البيانات يلغي المستند</label>'
            
             . '</div>';
        //Now generate pdf from html

    //A4 paper
    
    $mpdf = new mPDF('ar' , 'A4' , '' , '' , 0 , 0 , 0 , 0 , 0 , 0); 
         $mpdf->SetDirectionality('rtl');
         
        // $mpdf->SetAutoFont();
        //$mpdf = new mPDF();
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
     //$stylesheet = file_get_contents('resource/assets/temp/bootstrap.min.css'); // external css
     $stylesheet = file_get_contents('resource/css/custom_style.css'); // external css

    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($ttt,2);
 
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
