<?php
class LoginController extends BaseController{

    public function loginAction() {  
       
        if(!empty($_POST)){ 
            $model=new AdminModel(); 
            $info=$model->checkLogin();
            if($model->checkLogin()){
                 $this->jump('index.php?p=Admin&c=Admin&a=index', '登录成功', 1);
            }  else {
                 $this->jump('index.php?p=Admin&c=Login&a=login', '登录失败', 1);               
            }
            exit;
        }   
        require __VIEW__.'login.html';
    }
    
    public function logoutActiong(){
        unset($_SESSION['admin']);
        session_destroy();
        header('index.php?p=Admin&c=Login&a=login');
    }
}


