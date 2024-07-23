<?php

/* 
 * 基础控制器
 */
class Controller{
    
    public function __construct() {
        $this->initSession();
        $this->initCharset();
    }
    
    private function initSession() {
        session_start();
    }     
    
    //页面的显示字符编码
    private function initCharset() {
        header('Content-Type:text/html;charset=utf-8');
    }
    
    public function jump($url,$message='',$wait=3) {
        if($message==''){
            header($url);
        }else{
            require __VIEW__.'message.html';
        }
        
    }
}

