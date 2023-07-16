<?php

class CategoryController extends BaseController {
        
    public function listAction() {
        $model= new CategoryModel();
        $list = $model->getCategoryTree();
        require __VIEW__.'cat_list.html';
    } 
    
    public function addAction() {
        $model= new CategoryModel();//连接数据库
        $list = $model->getCategoryTree();
        if(!empty($_POST)){
            $data['cat_name']   = $_POST['cat_name'];
            $data['parentid']   = $_POST['parent_id'];
            $data['unit']       = $_POST['measure_unit'];
            $data['sort_order'] = $_POST['sort_order'];
            $data['is_show']    = $_POST['is_show'];
            $data['cat_desc']   = $_POST['cat_desc'];  
            
            foreach ($data as $key => $value) {
                    if($value==''){
                        $this->jump('index.php?p=Admin&c=Category&a=add',"添加{$key}不能为空",3);
                        exit;                            
                    }
            }

            if($model->insert($data)){
                $this->jump('index.php?p=Admin&c=Category&a=list','添加分类成功',1);
            }else {
                $this->jump('index.php?p=Admin&c=Category&a=add','添加分类失败',1);
            }
            exit;
        } 
        require __VIEW__.'cat_add.html';        
    }
    
    public function editAction() {
        $id         =$_GET['id'];
        $model      = new CategoryModel();      //实例化
        $info       =$model->getInfoByPk($id);  //通过id查询获取数据
        $cat_list   = $model->getCategoryTree();//创建树形类
        
        if(!empty($_POST)){
            $data['cat_name']   = $_POST['cat_name'];
            $data['parentid']   = $_POST['parent_id'];
            $data['unit']       = $_POST['measure_unit'];
            $data['sort_order'] = $_POST['sort_order'];
            $data['is_show']    = $_POST['is_show'];
            $data['cat_desc']   = $_POST['cat_desc']; 
            $data['cat_id']     = $id;
            
            if($data['cat_id']==$data['parentid']){
                $this->jump('index.php?p=Admin&c=Category&a=edit&id='.$id,'自己不能为自己的子级');
                exit;
            }
            $sub_list = $model->getCategoryTree($id);
            foreach($sublist as $rows){
                if($rows['cat_id']==$data['parentid']){
                    $this->jump('index.php?p=Admin&c=Category&a=edit&id='.$id,'父级不能为自己的子级');
                exit;
                }
            }
            
            if($model->update($data)){
                $this->jump('index.php?p=Admin&c=Category&a=list', '修改分类成功',1);
            }else {
                $this->jump('index.php?p=Admin&c=Category&a=edit','修改分类失败',1);
            }
            exit;
        }  
        require __VIEW__.'cat_edit.html';
    } 
    
    public function delAction() {
        $id=$_GET['id'];
        $model = new CategoryModel();        
        if($model->delete($id)){
                $this->jump('index.php?p=Admin&c=Category&a=list', '删除成功',1);
            }else {
                $this->jump('index.php?p=Admin&c=Category&a=list','删除失败',1);
            }
        exit;
    }
}

