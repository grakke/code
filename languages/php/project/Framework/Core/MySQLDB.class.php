<?php
/*
	* core module class
	* instance MySql connection
	* method
	 */
class MySQLDB {
	/*
	* construct module:
	* 	initial the parameter
	*  	connect databse system
	*  	set charset
	*  	select database
	*  	
	 */
	private $host;	//主机IP
	private $port;	//端口号
	private $user;	//用户名
	private $pwd;	//密码;
	private $charset;	//字符编码
	private $dbname;	//数据库名
	private static $instance;	//保存MySQLDB类的事例

	/**
	*私有的构造函数，防止在类的外部实例化对象
	*给构造函数传递一个配置数组，初始化成员变量
	*/
	private function __construct() {
		$this->host=$GLOBALS['config']['db']['host'];//自己复制不同的变量，连接不到数据库
		$this->port=$GLOBALS['config']['db']['port'];
		$this->user=$GLOBALS['config']['db']['user'];
		$this->pwd=$GLOBALS['config']['db']['pwd'];
		$this->charset=$GLOBALS['config']['db']['charset'];
		$this->dbname=$GLOBALS['config']['db']['db_name'];
		$this->connect();
		$this->setCharacter();
		$this->selectDB();
	}
	//私有的__clone用来防止在类的外部克隆对象
	private function __clone() {
		
	}
	//static public 
	public static function getInstance() {
		if(!self::$instance instanceof self)
			self::$instance=new self();
		return self::$instance;	//返回该实例
	}

	//连接数据库
	private function connect() {
		mysql_connect("{$this->host}:{$this->port}",$this->user,$this->pwd) or die('数据库连接失败');
	}
	/**
	*执行SQL语句
	*执行“数据查询语句”，成功返回结果集，失败返回false.
	*执行“数据操作语句”，成功返回true,失败返回false
	*/
	public function query($sql) {
		if(!$result=mysql_query($sql)){
			echo 'SQL语句执行失败<br>';
			echo '错误编号：'.mysql_errno().'<br>';
			echo '错误信息：'.mysql_error().'<br>';
			echo '错误的SQL语句是：'.$sql.'<br>';
			exit;
		}
		return $result;
	}
	//设置字符编码
	private function setCharacter() {
		$sql="set names {$this->charset}";
		return $this->query($sql);
	}
	//选择数据库
	private function selectDB() {
		$sql="use `{$this->dbname}`";
		return $this->query($sql);
	}


	/**
	*function module:
	*get result method
	*/
/*
	*@param $sql sql
	*@param $fetch_type 匹配的方式  assoc|row|array
	*@return	返回二维数组
	*/
	public function fetchAll($sql,$fetch_type='assoc') {
		$result=$this->query($sql);
		//如果匹配方式不是指定三种，默认还指定assoc
		if(!in_array($fetch_type,array('assoc','row','array')))
			$fetch_type='assoc';
		$fn='mysql_fetch_'.$fetch_type;	//拼接一个匹配资源的函数
		$temp=array();
		while($rows=$fn($result)){	//通过循环将资源匹配成二维数组
			$temp[]=$rows;
		}
		return $temp;
	}
	/**
	*取出结果的一条数据，返回一个一维数组
	*/
	public function fetchRow($sql,$fetch_type='assoc') {
		$result=$this->fetchAll($sql,$fetch_type);
		return empty($result)?false:$result[0];
	}
	/**
	*取出第一行第一列的数据
	*/
	public function fetchColumn($sql) {
		$row=$this->fetchRow($sql,'row');
		return empty($row)?false:$row[0];
	}
        
        /*
         * get auto_increment field 
         */
        public function getInsertId(){
            return mysql_isnert_id();            
        }
        
        /*
         * Transaction
         */
        public function beginTransaction() {
            return $this->db->qurey('start transaction');
        }
        
        public function commit(){
            return $this->db->query('commit');
        }
        
        public function rollback(){
            return $this->db->query('rollback');
        }
}
