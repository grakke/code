<?php

header("Content-Type:text/html;charset=utf-8");
$dir = dirname(__FILE__);//当前脚本所在路径

require $dir . "/PHPExcel/Classes/PHPExcel/IOFactory.php";//引入读取excel的类文件
$filename = $dir . "/tests.xls";
$fileType = PHPExcel_IOFactory::identify($filename);//自动获取文件的类型提供给phpexcel用
$objReader = PHPExcel_IOFactory::createReader($fileType);//获取文件读取操作对象
$sheetName = array("Sheet1");
$objReader->setLoadSheetsOnly($sheetName);//只加载指定的sheet
$objPHPExcel = $objReader->load($filename);//加载文件
/**$sheetCount=$objPHPExcel->getSheetCount();//获取excel文件里有多少个sheet
 * for($i=0;$i<$sheetCount;$i++){
 * $data=$objPHPExcel->getSheet($i)->toArray();//读取每个sheet里的数据 全部放入到数组中
 * print_r($data);
 * }**/
$i = 0;
foreach ($objPHPExcel->getWorksheetIterator() as $sheet) {//循环取sheet
    foreach ($sheet->getRowIterator() as $row) {//逐行处理
        if ($row->getRowIndex() < 3) {
            continue;
        }
        $da = array();
        foreach ($row->getCellIterator() as $cell) {//逐列读取
            $data = $cell->getValue();//获取单元格数据
            $da[] = $data;
        }
        $d[] = $da;
    }
}

$dd = json_encode($d);
touch('o.html');
file_put_contents('o.html', $dd);
echo "成功";
