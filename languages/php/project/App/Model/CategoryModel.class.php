<?php

class CategoryModel extends Model{
    /*
     * 通过递归方法创建树形商品分类
     */
    private function createTree($list,$parentid=0,$deep=0) {
        static $tree = array();
        foreach ($list as $rows ) {
            if($rows['parentid']==$parentid){
                $rows['deep']=$deep;
                $tree[] =$rows;
                $this->createTree($list,$rows['cat_id'],$deep+1);
            }
        }
        return $tree;
    }
    
       public function getCategoryTree($parentid=0){
        $list=$this->getList();
        return $this->createTree($list,$parentid,0);
    }
}

