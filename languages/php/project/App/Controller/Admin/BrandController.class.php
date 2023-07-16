<?php

class BrandController extends BaseController{
    
    public function listAction() {//可以将分页封装
        
        $pagesize   =  3;
        $model      = new BrandModel();
        $recordcount= $model->getRecordCount();
        $pagecount  = ceil($recordcount/$pagesize);
        $pageno     = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
        $pageno     = ($pageno<1) ? 1 : $pageno;
        $pageno     = ($pageno>$pagecount) ? $pagecount : $pageno;
        $lists      = $model->getPageList($pageno,$pagesize);        
        require __VIEW__.'brand_list.html';
    }
    
    public function addAction() {
        if(!empty($_POST)){
        $data['brand_name']  = $_POST['brand_name'];
        $data['brand_web']   = $_POST['site_url'];
        $data['brand_desc']  = $_POST['brand_desc'];
        $data['brand_order'] = $_POST['sort_order'];
        $data['is_show']     = $_POST['is_show'];
        foreach ($data as $key => $value) {
                if($value==''){
                    $this->jump('index.php?p=Admin&c=Brand&a=add',"添加{$key}不能为空",3);
                    exit;                            
                }
            }
        //传图片
       $path=PUBLIC_PATH.'Uploads'.DS;
       $size=100*1024;
       $type=array('image/jpg','image/png','image/gif');
       $upload = new UploadLib($path,$size,$type);
       if($filename=$upload->upload($_FILES['brand_logo'])){//图片存储无格式后缀
            $data['brand_logo'] = $filename;
            $model= new BrandModel();
            if($model->insert($data)){
                $this->jump('index.php?p=Admin&c=Brand&a=list', '添加成功',1);
            }else {
                $this->jump('index.php?p=Admin&c=Brand&a=add','添加失败',3);
            }
       }else{
           $this->jump('index.php?p=Admin&c=Brand&a=add',$upload->getError(),3);
       }
       exit;
        }
       require __VIEW__.'brand_add.html'; 
    }
    
    public function editAction() {
        $id=$_GET['id'];
        $model = new BrandModel();
        
        if(!empty($_POST)){            
            $data['brand_name']  = $_POST['brand_name'];
            $data['brand_web']   = $_POST['url'];
            $data['brand_desc']  = $_POST['brand_desc'];
            $data['brand_order'] = $_POST['sort_order'];
            $data['is_show']     = $_POST['is_show'];
            $data['brand_id']    = $id;
            
            foreach ($data as $key => $value) {
                if($value==''){
                    $this->jump('index.php?p=Admin&c=Brand&a=edit',"添加{$key}不能为空",3);
                    exit;                            
                    }
                }
            //传图片
            if($_FILES['brand_logo']['error']!=4){
                $path   = PUBLIC_PATH.'Uploads'.DS;
                $size   = 100*1024;
                $type   = array('image/jpg','image/png','image/gif');
                $upload = new UploadLib($path,$size,$type);
                if($filename=$upload->upload($_FILES['brand_logo'])){//图片存储无格式后缀
                    $data['brand_logo'] = $filename;
                    $old_img_path=$path.$_POST['brand_logo'];
                    if(file_exists($old_img_path)){
                        unlink($old_img_path);
                    }  else {
                        $this->jump('index.php?p=Admin&c=Brand&a=edit',$upload->getError(),3);
                        exit();
                    }
            }

            if($model->update($data)){
                $this->jump('index.php?p=Admin&c=Brand&a=list', '修改成功');
            }else {
                $this->jump('index.php?p=Admin&c=Brand&a=edit','修改失败',3);
            }
            exit;
        }
    }          
    $info = $model->getInfoByPk($id);
    require __VIEW__.'brand_edit.html'; 
    }
    
    public function delAction() {
        $id       = $_GET['id'];
        $logoName = $_GET['logo'];
        $logoFile = UPLOADS_PATH.$logoName;
        if(file_exists($logoFile)){
            unlink($logoFile);
        }
        $model = new BrandModel();
        $model->delete($id);
        $this->jump('index.php?p=Admin&c=Brand&a=list', '删除成功', 1);
    }
}