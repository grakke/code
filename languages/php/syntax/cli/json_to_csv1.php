<?php

//读取获取的json字符串，数组以下标2开始
$filenamew ="json";
$json_sw = file_get_contents($filenamew);
$json = json_decode($json_sw, true);
$data[2] = $json['items'][0];
$data[] = $json['items'][0];

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

foreach ($data as $key => $value) {
    $value['baidu_GIS'] = $value['geolocation']['baidu']['lng'].','.$value['geolocation']['baidu']['lat'];
    $value['soso_GIS'] = $value['geolocation']['baidu']['lng'].','.$value['geolocation']['baidu']['lat'];
    /*城市与行政区转换*/
    switch ($value['city_id']) {
        case 11:
            $value['city_id'] = "上海市";
            break;
        case 16:
            $value['city_id'] = "南京";
            break;
        case 19:
            $value['city_id'] = "苏州";
            break;
        case 18:
            $value['city_id'] = "杭州";
            break;
        case 33:
            $value['city_id'] = "合肥";
            break;
        case 14:
            $value['city_id'] = "北京";
            break;
        case 23:
            $value['city_id'] = "济南";
            break;
        case 17:
            $value['city_id'] = "天津";
            break;
        case 21:
            $value['city_id'] = "大连";
            break;
        case 30:
            $value['city_id'] = "青岛";
            break;
        case 31:
            $value['city_id'] = "西安";
            break;
        case 15:
            $value['city_id'] = "成都";
            break;
        case 20:
            $value['city_id'] = "重庆";
            break;
        case 26:
            $value['city_id'] = "郑州";
            break;
        case 27:
            $value['city_id'] = "长沙";
            break;
        case 22:
            $value['city_id'] = "武汉";
            break;
        case 12:
            $value['city_id'] = "广州";
            break;
        case 13:
            $value['city_id'] = "深圳";
            break;
        case 46:
            $value['city_id'] = "厦门";
            break;
        case 35:
            $value['city_id'] = "福州";
            break;
        default:
            echo $value['city_id'];
    }

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A{$key}", $value['city_id'])
        ->setCellValue("B{$key}", $value['name'])
        ->setCellValue("C{$key}", $value['address'])
        ->setCellValue("D{$key}", $value['comm_id'])
        ->setCellValue("E{$key}", $value['area_code'])
        ->setCellValue("F{$key}", $value['baidu_GIS'])
        ->setCellValue("G{$key}", $value['soso_GIS'])
        ->setCellValue("H{$key}", $value['alias'])
        ->setCellValue("I{$key}", $value['completion_date'])
        ->setCellValue("J{$key}", $value['floor_area_ratio'])
        ->setCellValue("K{$key}", $value['green_plot_ratio'])
        ->setCellValue("L{$key}", $value['developer'])
        ->setCellValue("M{$key}", $value['property_mgmt'])
        ->setCellValue("N{$key}", $value['mgmt_fee']);
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
