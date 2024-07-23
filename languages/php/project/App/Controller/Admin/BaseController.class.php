<?php

class BaseController extends Controller{
    /*
     * use as token ,to vadivate identification 
     */
   
    public function __construct() {
        parent::__construct();
        $this->checkLogin();
    }
    
    //检查是否登录
    private function checkLogin() {
        if(strtolower(CONTROLLER)=='login')
            return true;
        if(empty($_SESSION['admin'])){
            header('location:index.php?p=Admin&c=Login&a=login');
            exit;
        }
    }
    
}

