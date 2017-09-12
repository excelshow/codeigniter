<?php
$this->load->helper('excel');
$objPHPExcel = new PHPExcel();
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objPHPExcel->getActiveSheet()->setTitle('Simple');
$objPHPExcel->getActiveSheet()->setCellValue('A1', '序号');
$objPHPExcel->getActiveSheet()->setCellValue('B1', '名称');
$objPHPExcel->getActiveSheet()->setCellValue('A3', true);
$objPHPExcel->getActiveSheet()->setCellValue('C5', '=SUM(C2:C4)');
$objPHPExcel->getActiveSheet()->setCellValue('B8', '=MIN(B2:C5)');
$objWriter->save("xxx.xlsx");