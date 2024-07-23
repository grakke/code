<?php

class Framework {
    
    public static function run() {//static作用
        self::initConst();//用self不用Framework
        self::initConfig();
        self::initRoutes();
        self::initAutoload();
        self::initDispatch();
    }
    //定义框架各级路径为常量
    private static function initConst() {
        define('DS', DIRECTORY_SEPARATOR);
        define('ROOT_PATH', getcwd().DS);   //别忘带DS     
        
        define('APP_PATH', ROOT_PATH.'App'.DS);        
        define('FRAMEWORK_PATH', ROOT_PATH.'Framework'.DS);
        define('PUBLIC_PATH', ROOT_PATH.'Public'.DS);
        
        define('CONFIG_PATH', APP_PATH.'Config'.DS);
        define('CONTROLLER_PATH', APP_PATH.'Controller'.DS);
        define('MODEL_PATH', APP_PATH.'Model'.DS);
        define('VIEW_PATH', APP_PATH.'View'.DS);
        
        define('CORE_PATH', FRAMEWORK_PATH.'Core'.DS);
        define('LIB_PATH', FRAMEWORK_PATH.'Lib'.DS);
        define('DATABASE_PATH', FRAMEWORK_PATH.'Database'.DS);
        define('FUNCTION_PATH', FRAMEWORK_PATH.'Function'.DS);
        define('UPLOADS_PATH', PUBLIC_PATH.'Uploads'.DS);
    }
    //导入参数配置，设置为超全局变量
    private static function initConfig(){
        $GLOBALS['config'] = require CONFIG_PATH.'config.php';
    }
    //确定常量与路径
    private static function initRoutes() {
        $p = isset($_REQUEST["p"]) ? $_REQUEST["p"] : $GLOBALS['config']['app']['platform'];//自己用了单引号
        $c = isset($_REQUEST["c"]) ? $_REQUEST["c"] : $GLOBALS['config']['app']['controller'];
        $a = isset($_REQUEST["a"]) ? $_REQUEST["a"] : $GLOBALS['config']['app']['action'];
        define('PLATFORM', $p);
        define('CONTROLLER', $c);
        define('ACTION', $a);
        define('__URL__', CONTROLLER_PATH.PLATFORM.DS);
        define('__VIEW__', VIEW_PATH.PLATFORM.DS);
    }
    
    private static function  autoLoad($class_name) {
        $class_map  = array(
            'MySQLDB'   => CORE_PATH.'MySQLDB.class.php',
            'Model'     => CORE_PATH.'Model.class.php',
            'Controller'=> CORE_PATH.'Controller.class.php'
        );
        
        if(isset($class_map[$class_name])){//isset 函数的使用
            require $class_map[$class_name];//
        }elseif(substr($class_name, -10)=='Controller'){
            require __URL__.$class_name.'.class.php';
        }elseif(substr($class_name, -5)=='Model'){
            require MODEL_PATH.$class_name.'.class.php';
        }elseif(substr($class_name, -3)=='Lib'){
            require LIB_PATH.$class_name.'.class.php';        
        }
    }
    private static function initAutoload(){
        spl_autoload_register('self::autoLoad');
    }
    /*
     *分发为关键：通过表单跳转的参数获取文件名称：Config确定pca
     *自动加载函数通过路径加载文件---定义路径常量、与__URL__
     * 
     */
    private static function initDispatch(){
        $controller_name = CONTROLLER.'Controller';
        $action_name     = ACTION.'Action';
        $controller      = new $controller_name();
        $controller->$action_name();
    }
    
}

