<?php

class DataoutModel extends Model
{
    public function getCitys()
    {

        $sql = "select typename ,cityId from ajk_commtype where parentId='0' ";
        return $this->db->fetchAll($sql);
    }

    public function getData($cityId)
    {
        $sql 	= "select typename,namecode from ajk_commtype where cityId=$cityId and parentId=0";
        $res =  $this->db->fetchRow($sql);
        $cityname = $res['typename'];
        $namecode = $res['namecode'];

        echo $cityname . '<br/>';

        /*
        导出单个城市的所有小区到一张表中
        字段：typeflag：代表数据类型，线上类型(0)还有测试类型(非0)
        字段：whoadd：数据来源，安居客认证(0) 还有来源经纪人(非0)
         */
        // $sql = "select a.commid as 小区id,c.typename as 区域,b.typename as 商圈,a.commname as 小区名称,a.CommOtherName as 小区别名,a.commlocal as 小区地址 from ajk_communitys a  left join ajk_commtype b on a.areacode = b.typecode left join ajk_commtype as c on b.parentid = c.typeid where a.cityid = $cityId and a.TypeFlag = 0 and whoadd =0 into outfile 'f:$namecode.xls'";

        /*
        每个城市循环多张规格张表，表容量为5000
         */
        $table_size   = 5000;

        $sql   = "select count(*) as total  from ajk_communitys where cityid = $cityId and TypeFlag = 0 and whoadd =0";

        $res   = $this->db->fetchRow($sql);
        $total = $res['total'];

        $tables = ceil($total / $table_size);

        for ($i = 0; $i < $tables ; $i++) {

            $offset = $table_size * $i;

            $sql = "select a.commid as 小区id,c.typename as 区域,b.typename as 商圈,a.commname as 小区名称,a.CommOtherName as 小区别名,a.commlocal as 小区地址 from ajk_communitys a  left join ajk_commtype b on a.areacode = b.typecode left join ajk_commtype as c on b.parentid = c.typeid where a.cityid = $cityId and a.TypeFlag = 0 and whoadd =0 limit $offset,$table_size into outfile 'f:$namecode($i).xls'";

            $this->db->query($sql);
        }
    }

    public function collcomms()
    {
        //$sql = "select count(*),cityId from ajk_communitys where cityId in (select CityId from ajk_commtype where  parentId=0)";

        $sql = "select count(*),cityId from ajk_communitys where areacode <=000000000";

        $res = $this->db->fetchAll($sql);
        echo '<pre/>';
        var_dump($res);
    }
}
