<?php
class AttributeModel extends Model{
    
    public function getAttribute($type_id){
        $sql = "select * from attrtype left join attribute using(type_id) where 1=1 ";
        if($type_id>0){
            $sql .= " and type_id=$type_id";
        }
        return $this->db->fetchAll($sql);
    }
}

