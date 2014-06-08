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
             . '<div class = "row">'
             . '<div style = "width:33.3%;float:left;"><br/><h4 align = "center" style="font-family: Times New Roman;font-size:12pt;margin:5">Palestine National Authority</h4><h4 align = "center" style="font-size:12pt;margin:5;">High Judicial Council</h4><h4 align = "center" style = "margin:0;">Stores Department</h4></div>'
             . '<div align = "center" style = "width:33.3%;float:left;"><br/><img src="resource/img/logo.png" width = "30%" height = "35%"></div>'
             . '<div style = "width:33.3%;float:left;"><br/><h4 align ="center" style = "margin:5;">السـلطـة الوطــنـية الـفـلـسـطـيـنـة</h4><h4 align = "center" style = "margin:5;">المجلس الأعلى للقضاء</h4><h4 align = "center" style = "margin:5;">دائرة المخازن</h4></div>'
             . '<hr/></div>'
             . ' <h4 align = "center">مستنـــد ارجاع</h4>'
             . '<div class = "bordered_row" style="padding: 4px 0;">
                              
                              <div  style=" width:30%;float:left;border:1px solid ;border-radius:10px;padding:4px"> 
                                 
                                  <div style="border:1px solid ;border-radius:5px; margin-bottom: 2px;">تاريخ الإعارة ...'.$products[0]['ADDED_DATE'].'...:</div>
                                  <div style="border:1px solid ;border-radius:5px;">التاريخ الإرجاع ...'.$products[0]['RETURN_DATE'].'...:</div>
                                  
                              </div>
                              
                                <div style="width:68.5%;float:left;padding:8px 0px 0px 0px "> 
                                 
                                   
                                 
                                  <div style="border-bottom:1px solid;padding: 0; margin-bottom: 2px;"><label style="display: inline; padding-right: 20px;padding-top: 30px">من/ ...'.$products[0]['MAIN_DEPARTMENT'].'-'.$products[0]['DEPARTMENT_NAME'].'-'.$products[0]['EMPLOYEE_NAME'].'...</label></div>
                                  <div><label style="display: inline;padding-right: 20px;">إلى/  دائرة المخازن والمستودعات </label></div>
                                  
                            
                                  
                              </div>
                          </div>'
                 . '<div align = "center"><label>أقر بهذا بأنني استلمت المواد التالية </label></div>'

             . '<div class = "row"><table border="1">
                                        <thead>
                                            <tr>
                                                <!--data-set="#sample_1 .checkboxes"-->
                                                <th style = "width:10%" rowspan="2"><p align = "center"> الرقم</p></th>
                                                <th style = "width:30%" rowspan="2"><p align = "center">وصف المادة ومواصفاتها</p> </th>
                                                
                                                <th style = "width:10%" colspan = "3"><p align = "center">المقاسات</p></th>
                                                <th style = "width:10%" rowspan="2">الحالة</th>
                                                 <th style = "width:10%" rowspan="2">S/N</th>
                                                <th style = "width:10%;text-align: start" rowspan="2">ملاحظات</th>
                                                
                                            </tr>
                                            
                                            <tr>
                                                <th><p class="rotate">الطول</p></th>

                                                <th><p class = "rotate">العرض</p></th>

                                                <th><p class = "rotate">الإرتفاع</p></th>
                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>'.$products[0]['PRODUCT_NAME'].'</td>
                                                    <td>'.$products[0]['H_LENGTH'].'</td>
                                                    <td>'.$products[0]['WIDTH'].'</td>
                                                    <td>'.$products[0]['HEIGHT'].'</td>
                                                    <td> '.$products[0]['PRODUCT_STATUS'].'</td>
                                                    <td> '.$products[0]['SERIAL_NUMBER'].'</td>
                                                    <td> '.$products[0]['NOTES'].'</td>

                                                </tr>
                                        </tbody>
                                    </table></div><br/>'
                                 .' <div class = "row">
                                            
                                            <div style=" width:50%;float:left;">
                                                <p style="text-align: center">اسم المسلم : ...........................</p>
                                                <br/>
                                                <p  style="text-align: center">التوقيع : .............................</p>
                                            </div>
                                          
                                              <div style=" width:49.5%;float:left;">
                                                <p>اسم المستلم : ...............................</p>
                                                <br/>
                                                <p>التوقيع : ...................................</p>
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
