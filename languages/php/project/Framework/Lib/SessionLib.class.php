<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SessionLib {
    private $db;
    public function __construct(){
           session_set_save_handler(
            array($this,'open'),
            array($this,'close'),
            array($this,'read'),
            array($this,'write'),
            array($this,'destroy'),
            array($this,'gc')
        );
        @session_start();
    }
    
    function open(){
        $this->db=MySQLDB::getInstance();
    }

    function close(){

    }

    function read($sess_id){
            $sql = "select sess_value from session where sess_id='$sess_id'";
            return $this->db->fetchColumn($sql);
    }
    
    function write($sess_id,$sess_value) {
            $time=time();
            $sql="insert into session values ('$sess_id','$sess_value',$time) on duplicate key update sess_value='$sess_value',sess_expires=$time";
            return $this->db->query($sql);
    }


    function destroy($sess_id){
            $sql = "delete from session where sess_id='$sess_id'";
            return $this->db->query($sql);
    }

    function gc($maxlifetime){
            $expires=time()-$maxlifetime;
            $sql =  "delete from session where sess_expires<$expires";
            return $this->db->query($sql);
    }
}

