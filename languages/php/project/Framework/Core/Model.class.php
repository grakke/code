<?php
/**
*   继承模型类，所有模型类的父类
*   abstract用来阻止实例化Model类
*/
abstract class Model  {
    protected $db;
    
    public function __construct() {
        $this->initDB();
    }
    /*
     * 功能：初始化数据库操作对象，并加载到构造函数中
     */
    private function initDB() {
	$this->db=MySQLDB::getInstance();
    }
/*
 * 功能：获取该对象表名称（即模型名称）
 */
    private function getTableName() {
        return substr(get_class($this),0, -5);
    } 
    /*
     * 功能：取得上一步 INSERT 操作产生的 ID
     * 知识点：mysql_insert_id — 取得上一步 INSERT 操作产生的 ID 
     * 用于连表操作
     */
    private function getInsertId() {
        return mysql_inset_id();
    }
    /*
     * 功能：获取表的主键
     */
    private function getPrimaryKey($table){
        $rs=$this->db->query("desc `{$table}`");
        while($rows=mysql_fetch_assoc($rs)){
            if($rows['Key']=='PRI'){//Key 与Field对应
                return $rows['Field'];
                }
            }
    }
    
    /*
     * 功能：取出表中所有数据
     */
    public function getList($order_field='',$order_by='asc'){
        $table = $this->getTableName();
        if($order_field==''){
            $order_field=  $this->getPrimaryKey($table);
        }
        $sql = "select * from `{$table}` order by `{$order_field}` {$order_by}";
        return $this->db->fetchAll($sql);         
    }
    
    //获取分页
 
    public function getPageList($pageno,$pagesize,$order_field='',$order_by='asc'){
        $table = $this->getTableName();
        $pagestart=($pageno-1)*$pagesize; //使用时对pageno做上下限制（1，pagecount）
        if($order_field==''){
            $order_field=  $this->getPrimaryKey($table);
        }
        $sql = "select * from `{$table}` order by `{$order_field}` {$order_by} limit $pagestart,$pagesize";
        return $this->db->fetchAll($sql);
    }
 
    public function getRecordCount() {
        $table = $this->getTableName();
        $sql = "select count(*) from `{$table}`";
        return $this->db->fetchColumn($sql);
    }
    
    public function getInfoByPk($id) {
        $table = $this->getTableName();
        $pk = $this->getPrimaryKey($table);
        $sql = "select * from `{$table}` where `{$pk}`={$id}";
        return $this->db->fetchRow($sql);
    }
    
    public function insert($data) {
        $fields = array_keys($data);        
        $fields = array_map(function($field){return "`{$field}`";},$fields);
        $fields = implode(',',$fields);
        
        $values = array_values($data);
        $values = array_map(function($value){
            return "'".mysql_real_escape_string($value)."'";},$values);//注意，有字段加引号，数字加引号也可以
        $values = implode(',',$values);
        $table  = $this->getTableName();
        $sql    = "insert into `{$table}` ({$fields}) values ({$values})";
        return $this->db->query($sql);
    }

    public function update($data) {
        
        $table  = $this->getTableName();
        $pk     = $this->getPrimaryKey($table);// :id        
        $fields = array_keys($data); 
        $index  = array_search($pk,$fields);
        unset($fields[$index]);
        $fields = array_map(function($field) use($data){
            $data[$field]=  htmlspecialchars($data[$field]);
        return "`$field`='".mysql_real_escape_string($data[$field])."'";},$fields);//?
        $fields = implode(',',$fields);
        $sql    = "update `{$table}` set {$fields} where {$pk}='{$data[$pk]}'";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $table  = $this->getTableName();
        $pk     = $this->getPrimaryKey($table);
        $sql    = "delete from `{$table}` where {$pk}=$id";
        return $this->db->query($sql);
    }
    /*
     *  @param $data array
     */
    
    public function getInfoByFields($data){
        $table  = $this->getTableName();
        $fields = array_keys($data);
        $values = array_values($data);
        $fields = array_map(function($field){return "`$field`";}, $fields);
        $values = array_map(function($value){ return "'".mysql_escape_string("$value")."'";}, $values);
        $sql    = "select * from `{$table}` where 1=1 ";  //拼接SQL语句
        foreach ($fields as $index => $field) {
               $sql .= ' and '.$field.'='."$values[$index]";
        }
       return  $this->db->fetchAll($sql); 
    }
    
}