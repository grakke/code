<?php

# /jobs/bin/ 导出安居客小区信息：

$config['pathCursor']             = '/data/file/cursor/';
$config['initCursor']             = array('maxCommId' => 0, 'totalCount' => 0);

/*数据处理文件存放目录*/
$config['pathFile']               = '/home/www/file/datafile/';
$config['pathExportFile']         = '/data/file/datafile/export/';


$resArr = $this->getOptions();
$cityName = array_shift($resArr);

/*游标的初始化*/
$controllerName = __CLASS__;
$cursorObj = new Jobs_CursorLocal($controllerName);
$controllerName = $cursorObj->controllername;
$cursorData = $cursorObj->getCursor();

/*日志文件初始化*/
$logPath = APF::get_instance()->get_config('pathLog', 'jobs');
$log = Jobs_Log::getInstance($logPath, $controllerName);
$log->init($controllerName);

$cityId = Dao_AjkCommtype::cityNameToCityId($cityName);
if ($cityId) {
    $msg = $cityName . '城市存在！';
    $log->setMessage($msg);
} else {
    $msg = $cityName . '城市不存在！';
    echo $msg;
    $log->setMessage($msg);
    exit;
}

$objExport = new Jobs_ExportCommInfo();

$log->setMessage($$cityName . '一共写入条' . $cursorData['totalCount'] . '小区信息，最后一条小区ID为' . $cursorData['maxCommId'] . "\n");
$cursorObj->setCursor($objExport->cityIdWriteXLS($cityId, $cursorData));

echo 'no data fix' . "\n";
