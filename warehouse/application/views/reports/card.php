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
             . '<div align = "center" style = "width:33.3%;float:left;"><br/><img src="resource/css/pic22.png" width = "30%" height = "35%"></div>'
             . '<div style = "width:33.3%;float:left;"><br/><h4 align ="center" style = "margin:5;">السـلطـة الوطــنـية الـفـلـسـطـيـنـة</h4><h4 align = "center" style = "margin:5;">المجلس الأعلى للقضاء</h4><h4 align = "center" style = "margin:5;">دائرة المخازن</h4></div>'
             . '<hr/>'
             . '</div>'
             . '<div align = "center"><label>بطاقة اللوازم / العهدة في المخزن</label></div>'

              . '<div class="row">
                                             <div style = "float:left;width:25%;text-align: center">
                                                المقاس : ......
                                            </div>
                                            <div style = "float:left;width:25%;text-align: center">
                                               الوحدة : عدد
                                            </div>
                                            <div style = "float:left;width:25%;text-align: center">
                                               اسم الصنف : اقلام رصاص
                                            </div>
                                            <div style = "float:left;width:24.5%;text-align: center">
                                                رقم الصنف : 3212
                                            </div>
                                           
                                           
                                           
                   </div>' 
             . '<div class = "row"><table border="1">
                                        <thead>
                                            <tr>
                                                <!--data-set="#sample_1 .checkboxes"-->
                                                <th style = "width:20%"><p align = "center">التاريخ</p></th>
                                                <th style = "width:10%"><p align = "center">رقم سند الإضافة\الإخراج</p></th>
                                                <th style = "width:10%"><p align = "center">ادخال</p></th>
                                                <th style = "width:10%"><p align = "center">اخراج</p></th>
                                                <th style = "width:10%"><p align = "center">الرصيد</p></th>
                                                 <th style = "width:30%"><p align = "center"> الجهة الموردة أو المصروف لها أو المعار لها</p></th>



                                        </thead>
                                        <tbody>
                                                <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>30</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                        <td>40</td>
                                                  

                                                </tr>
                                                 <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>جهاز حاسوب لابتوب</td>
                                                    <td>30</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                        <td>40</td>
                                                  

                                                </tr>
                                                 <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>جهاز حاسوب لابتوب</td>
                                                    <td>30</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                        <td>40</td>
                                                  

                                                </tr>
                                                 <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>جهاز حاسوب لابتوب</td>
                                                    <td>30</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                        <td>40</td>
                                                  

                                                </tr>
                                                 <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>جهاز حاسوب لابتوب</td>
                                                    <td>30</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                        <td>40</td>
                                                  

                                                </tr>
                                                 <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>جهاز  لابتوب</td>
                                                    <td>30</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                        <td>40</td>
                                                  

                                                </tr>
                                                 <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>جهاز حاسوب </td>
                                                    <td>30</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                        <td>40</td>
                                                  

                                                </tr>
                                              
                                        </tbody>
                                    </table></div>'
                                  
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
