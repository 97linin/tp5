<?php
namespace app\common\service;
use PHPExcel_IOFactory;
use PHPExcel;
class ExcelService{
	public static function upload($filePath,$num=0){
		$fileinfo=pathinfo($filePath);
		$suffix=strtolower($fileinfo["extension"]);
		if($suffix=="xlsx"){
			$reader=PHPExcel_IOFactory::createReader('Excel2007');
		}else{
			$reader=PHPExcel_IOFactory::createReader('Excel5');
		}
		$objContent=$reader->load($filePath,$encode='utf-8');
		$sheetContent=$objContent->getSheet($num)->toArray();
		unset($sheetContent[$num]);
		return $sheetContent;
	}
	public static function createXls($data,$title='sheet1',$filename='simple.xlsx'){
		ini_set('max_execution_time','0');
		$filename=str_replace('.xls','',$filename).'.xls';
		$phpexcel=new PHPExcel();
		$phpexcel->getActiveSheet()->fromArray($data);
		$phpexcel->getActiveSheet()->setTitle($title);
		$phpexcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;filename=$filename");
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header ('Cache-Control: cache, must-revalidate');
		header ('Pragma: public');
		$objwriter=PHPExcel_IOFactory::createWriter($phpexcel,'Excel2007');
		$objwriter->save('php://output');
		exit;
	}
}