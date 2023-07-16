<?php

class AdminModel extends Model{
/*
 * 判断是否登录：
 * 成立返回用户信息
 * 不成立返回false
 */    
    public function checkLogin() {
        $data['name'] = $_POST['username'];
        $data['pwd']  = md5($_POST['password']);        
        if($list=$this->getInfoByFields($data)){
            $info = $list[0];
            $_SESSION['admin'] = $info;
            $this->updateLoginInfo();           
            return $info;
        }else{
            return false;            
        }
    }
    //更新登录信息
    public function updateLoginInfo() {
        $data['last_login_ip']=ip2long($_SERVER['REMOTE_ADDR']);
        $data['last_login_time'] = time();
        $data['id']   = $_SESSION['admin']['id'];
        return $this->update($data);
    }
}