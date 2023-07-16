<?php

class AttrTypeModel extends Model{
    
    public function getAttrTypePageList($pageno,$pagesize){
        $pagestart=($pageno-1)*$pagesize;
        $sql = "select a.type_id,a.type_name,count(b.attr_name) count from attrtype a left join attribute b using (type_id) group by type_id limit $pagestart,$pagesize";
        return $this->db->fetchAll($sql);
    }
    
    
}