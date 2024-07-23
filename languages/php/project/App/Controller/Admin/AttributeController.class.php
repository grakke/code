<?php

class AttributeController extends BaseController{
    
    public function listAction(){
        $type_id         = (int)(isset($_GET['type_id']) ? $_GET['type_id'] : 0);
        $model           = new AttributeModel();
        $attr_list       = $model->getAttribute($type_id);//根据GET参数联合查询两个表的所有字段
        $attr_type_model = new AttrTypeModel();
        $attr_type_list  = $attr_type_model->getList();//获取所有分类
        
        require __VIEW__.'attribute_list.html';
    }
    
    public function addAction() {
        $attr_type_model = new AttrTypeModel();
        $attr_type_list  = $attr_type_model->getList();//获取所有分类
        
        if(!empty($_POST)){
           $data['attr_name']        = $_POST['attr_name'];
           $data['type_id']          = $_POST['cat_id']; 
           $data['attr_show_type']   = $_POST['attr_type']; 
           $data['attr_input_type']  = $_POST['attr_input_type'];
           $data['attr_input_value'] = isset($_POST['attr_value']) ? $_POST['attr_value'] : '' ; 
           if($_POST['attr_value']!=''){
               $data['attr_input_value'] = str_replace(array("\r\n","\r","\n"), ',', $data['attr_input_value']);
           }  
           $model   = new AttributeModel();
        if($model->insert($data)){            
            $this->jump('index.php?p=Admin&c=Attribute&a=list','Add Atrribute  Success',1);
        }  else {
             $this->jump('index.php?p=Admin&c=Attribute&a=add','Add Atrribute  Failed',3);
        }
        exit();
        }
        require __VIEW__.'attribute_add.html';
    }
    
    public function editAction(){
        $attr_id         = $_GET['attr_id'];
        $model           = new AttributeModel();
        $list            = $model->getInfoByPk($attr_id);
        $attr_type_model = new AttrTypeModel();
        $attr_type_list  = $attr_type_model->getList();//获取所有分类
        //$list['attr_input_value'] = str_replace(array(','), '<br/>', $list['attr_input_value']); //读取格式与添加不一致
        
        if(!empty($_POST)){
           $data['attr_id']          = $attr_id;
           $data['attr_name']        = $_POST['attr_name'];
           $data['type_id']          = $_POST['cat_id']; 
           $data['attr_show_type']   = $_POST['attr_type']; 
           $data['attr_input_type']  = $_POST['attr_input_type'];
           $data['attr_input_value'] = isset($_POST['attr_value']) ? $_POST['attr_value'] : '' ; 
           if($_POST['attr_value']!=''){
               $data['attr_input_value'] = str_replace(array("\r\n","\r","\n"), ',', $data['attr_input_value']);
           }  
           
        if($model->update($data)){            
            $this->jump('index.php?p=Admin&c=Attribute&a=list','修改属性成功',1);
        }  else {
             $this->jump('index.php?p=Admin&c=Attribute&a=edit','修改属性失败',3);
        }
        exit();
        }
        require __VIEW__.'attribute_edit.html';
    }
    
    public function delAction() {
        $attr_id = $_GET['attr_id'];
        $model   = new AttributeModel();        
        if($model->delete($attr_id)){
                $this->jump('index.php?p=Admin&c=Attribute&a=list', '删除属性成功',1);
            }else {
                $this->jump('index.php?p=Admin&c=Attribute&a=list','删除属性失败',1);
            }
        exit;
    }
}

