<?php
header("Content-Type:text/html;charset=utf-8");  

class DataoutController extends Controller{

 public function dataoutAction(){

 	$model 	= new DataoutModel();

 	// 根据获取按钮导出数据表格
 	if(isset($_POST['city'])){
 		$cityId = $_POST['city'];
 		$data 	= $model->getData($cityId);
 	}
    
    // 前端加载获取的城市单选框视图
     $data 	= $model->getCitys();
     require __VIEW__.'dataout.html';

     if(isset($_POST['out'])){
     	
 		$data 	= $model->collcomms($cityId);
 	}


 }


}

