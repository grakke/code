<?php

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli') {
    die('This example should only be run from a Web Browser');
}

/** Include PHPExcel */
require_once dirname(__FILE__) . '\PHPExcel\Classes\PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A1", '城市名称')
    ->setCellValue("B1", '楼盘标准名称')
    ->setCellValue("C1", '小区标准地址')
    ->setCellValue("D1", '楼盘ID')
    ->setCellValue("E1", '行政区')
    ->setCellValue("F1", '小区地址GIS（百度）')
    ->setCellValue("G1", '小区地址GIS（SOSO）')
    ->setCellValue("H1", '小区别名')
    ->setCellValue("I1", '竣工年限')
    ->setCellValue("J1", '绿化率')
    ->setCellValue("K1", '容积率')
    ->setCellValue("L1", '开发商名称')
    ->setCellValue("M1", '物业公司名称')
    ->setCellValue("N1", '物业费');


$filenamew ="json";//读取出来的json
$json_sw = file_get_contents($filenamew);

$data[2] = array(2 => json_decode($json_sw, true));
$data[] = array(2 => json_decode($json_sw, true));

echo '<pre/>';
var_dump($data);
exit;
$out = $data;
for ($i = 2; $i < count($data)+2; $i++) {
    // foreach ($data as $ind => $value) {
    //   	foreach ($value as $key => $val1) {
    // 		$out[$i] = $val1;
    //   	}
    //   }
    $out[$i]['baidu_GIS'] = $out[$i]['geolocation']['baidu']['lng'].','.$out[$i]['geolocation']['baidu']['lat'];
    $out[$i]['soso_GIS'] = $out[$i]['geolocation']['baidu']['lng'].','.$out[$i]['geolocation']['baidu']['lat'];
    /*城市与行政区转换*/
    switch ($out[$i]['city_id']) {
        case 11:
            $out[$i]['city_id'] = "上海市";
            break;
        case 16:
            $out[$i]['city_id'] = "南京";
            break;
        case 19:
            $out[$i]['city_id'] = "苏州";
            break;
        case 18:
            $out[$i]['city_id'] = "杭州";
            break;
        case 33:
            $out[$i]['city_id'] = "合肥";
            break;
        case 14:
            $out[$i]['city_id'] = "北京";
            break;
        case 23:
            $out[$i]['city_id'] = "济南";
            break;
        case 17:
            $out[$i]['city_id'] = "天津";
            break;
        case 21:
            $out[$i]['city_id'] = "大连";
            break;
        case 30:
            $out[$i]['city_id'] = "青岛";
            break;
        case 31:
            $out[$i]['city_id'] = "西安";
            break;
        case 15:
            $out[$i]['city_id'] = "成都";
            break;
        case 20:
            $out[$i]['city_id'] = "重庆";
            break;
        case 26:
            $out[$i]['city_id'] = "郑州";
            break;
        case 27:
            $out[$i]['city_id'] = "长沙";
            break;
        case 22:
            $out[$i]['city_id'] = "武汉";
            break;
        case 12:
            $out[$i]['city_id'] = "广州";
            break;
        case 13:
            $out[$i]['city_id'] = "深圳";
            break;
        case 46:
            $out[$i]['city_id'] = "厦门";
            break;
        case 35:
            $out[$i]['city_id'] = "福州";
            break;
        default:
            echo $out[$i]['city_id'];
    }

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$i}", $out[$i]['city_id'])
        ->setCellValue("B{$i}", $out[$i]['name'])
        ->setCellValue("C{$i}", $out[$i]['address'])
        ->setCellValue("D{$i}", $out[$i]['comm_id'])
        ->setCellValue("E{$i}", $out[$i]['area_code'])
        ->setCellValue("F{$i}", $out[$i]['baidu_GIS'])
        ->setCellValue("G{$i}", $out[$i]['soso_GIS'])
        ->setCellValue("H{$i}", $out[$i]['alias'])
        ->setCellValue("I{$i}", $out[$i]['completion_date'])
        ->setCellValue("J{$i}", $out[$i]['floor_area_ratio'])
        ->setCellValue("K{$i}", $out[$i]['green_plot_ratio'])
        ->setCellValue("L{$i}", $out[$i]['developer'])
        ->setCellValue("M{$i}", $out[$i]['property_mgmt'])
        ->setCellValue("N{$i}", $out[$i]['mgmt_fee']);
}

$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
