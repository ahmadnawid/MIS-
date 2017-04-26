<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
 //save our workbook as this file name
            header('Content-Type: application/vnd.ms-excel'); //mime type for office 2003
            //mim type for office 2007
            //header('Content-Type: application/vnd.ms-excel');
            //header('Content-Disposition: attachment;filename="'.$filename.'"');
            //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
            header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format
            //$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
            //$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            //force user to download the Excel file without writing it to server's HD
            //$objWriter->save('php://output');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body dir="rtl">
<table border='1'>
   <tr><td colspan="4" style="background:#ddd;">نتایج شاگردان</td></tr>
  <tr>
    <td>ID</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Important info</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>Nothing really</td>
  </tr>
</table>
</body>