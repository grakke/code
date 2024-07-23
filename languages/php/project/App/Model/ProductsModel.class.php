<?php

/**
 *ProductsModel用来操作products表
 *命名规则：表名+Model
 */
class ProductsModel extends Model
{
    /**
     *获取products表的所有商品
     *
     * @return array 商品的二维数组
     */
    public function getList()
    {
        return $this->db->fetchAll('select * from products');
    }

    //删除商品
    public function delProductsById($id)
    {
        return $this->db->query('delete from products where proid='.$id);
    }
}

?>
