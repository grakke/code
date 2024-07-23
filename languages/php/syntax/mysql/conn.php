<?php


header("content-type=text/html,charset=utf-8");
$db_host = "127.0.0.1";
$db_user = "root";
$db_pwd = "root";
$db_name = "db";
// $db_name = "english";
$link = @mysql_connect($db_host, $db_user, $db_pwd);
if (!$link) {
    echo "数据库连接失败！";
    exit();
}
if (!mysql_select_db($db_name, $link)) {
    echo "选择数据表{$db_name}失败！";
    exit();
}
mysql_query("set names utf8");


function areacode_to_districtname($areacode)
{
    $districtcode = substr($areacode, 4, 4);
    $districtcode = (int) $districtcode;
    $sql = "select typename from ajk_commtype where typeid = $districtcode";
    $res = mysql_query($sql);
    $districtname = mysql_fetch_row($res);
    return $districtname[0];
}

// echo areacode_to_districtname(330034743552);
static $startid = 0;
function get_ids_by_id($cityid, $startid)
{
    $sql = 'SELECT  CommId FROM ajk_communitys where CityId='.$cityid.' and TypeFlag=0 ORDER BY CommId ASC LIMIT '.$startid.',500';
    $res = mysql_query($sql);
    $info = array();
    while ($row = mysql_fetch_assoc($res)) {
        $info[] .= $row['CommId'];
    }
    return $info;
}

print_r(get_ids_by_id(11, 100));
