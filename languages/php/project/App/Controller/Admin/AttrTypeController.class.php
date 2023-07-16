<?php
class AttrTypeController extends BaseController{
    
public function listAction(){
    $model = new AttrTypeModel();    
    
    $pagesize   =  2;
    $recordcount= $model->getRecordCount();
    $pagecount  = ceil($recordcount/$pagesize);
    $pageno     = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
    $pageno     = ($pageno<1) ? 1 : $pageno;
    $pageno     = ($pageno>$pagecount) ? $pagecount : $pageno;
    $list       = $model->getAttrTypePageList($pageno,$pagesize); 
    require __VIEW__.'goods_type_list.html';
}

public function addAction() {
    if(!empty($_POST)){
        $data['type_name'] = $_POST['cat_name'];
        $model = new AttrTypeModel();
        if($model->insert($data)){            
            $this->jump('index.php?p=Admin&c=AttrType&a=list','Add Atrribute Type Success',1);
        }  else {
             $this->jump('index.php?p=Admin&c=AttrType&a=add','Add Atrribute Type Failed',3);             
        }
        exit();
    }    
    require __VIEW__.'goods_type_add.html';
}

public function editAction() {
    require __VIEW__.'goods_type_edit.html';
}

public function delAction() {
    $id=$_GET['type_id'];
        $model = new AttrTypeModel();        
        if($model->delete($id)){
                $this->jump('index.php?p=Admin&c=AttrType&a=list', '删除商品类型成功',1);
            }else {
                $this->jump('index.php?p=Admin&c=AttrType&a=list','删除商品类型失败',1);
            }
        exit;
    }
}

    


