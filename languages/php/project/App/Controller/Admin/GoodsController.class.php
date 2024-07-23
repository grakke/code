<?php

class GoodsController extends BaseController{

    public function listAction() {
        
        $cat_model        = new CategoryModel();
        $cat_list         = $cat_model->getCategoryTree();
        $brand_model      = new BrandModel();
        $brand_list       = $brand_model->getList();        
        $attr_type_model  = new AttrTypeModel();
        $attr_type_list   = $attr_type_model->getList();
        $goods_model      = new GoodsModel();
        $goods_list       = $goods_model->getList();
        require __VIEW__.'goods_list.html';
    }
    
    public function addAction() {
        //show Category
        $cat_model = new CategoryModel();
        $cat_list = $cat_model->getCategoryTree();
        //show Brand
        $brand_model = new BrandModel();
        $brand_list = $brand_model->getList();
        
        $attr_type_model = new AttrTypeModel();
        $attr_type_list  = $attr_type_model->getList();
        
        if(!empty($_POST)){
            $data['goods_name']     = $_POST['goods_name'];
            $data['category_id']    = $_POST['cat_id'];
            $data['brand_id']       = $_POST['brand_id'];
            $data['shop_price']     = $_POST['shop_price'];
            $data['market_price']   = $_POST['market_price'];
            $data['goods_desc']     = $_POST['goods_desc'];
            $data['goods_id']        = $_POST['goods_type'];
            if(!empty($_POST['status'])){
                $data['status'] = implode(',', $_POST['status']);
            }
            $size = 1024*1024;
            $type = array('image/jpeg','image/png','image/gif');
            $upload = new UploadLib(UPLOADS_PATH, $size, $type);
            if($filename=$upload->upload($_FILES['goods_img'])){
                $data['goods_img'] = $filename;
                $image = new ImageLib();
                $thumb_path = substr($filename, 0,11);
                $thumb_name = $image->thumb($path.$filename,160,120,false,'s_');
                $data['thumb_img'] = $thumb_path.$thumb_name;
            }else{
                $this->jump('index.php?p=Admin&c=Goods&a=add', $upload->getError());
            }
            $model = new GoodsModel();
            if($goods_id=$model->insert($data)){
                $attr_id_list    = $_POST['attr_id_list'];
                $attr_value_list = $_POST['attr_value_list'];
                $model = new Goods_AttrModel();
                foreach ($attr_id_list as $index => $id) {
                    $attr_data['goodsid'] = $goods_id;
                    $attr_data['attr_id'] =$id;
                    $attr_data['attr_value'] = $attr_value_list[$index];
                    if(!$model->insert($attr_data)){
                        $this->jump('index.php?p=Admin&c=Goods&a=add','Add Failed!');
                        exit;
                    }
                }
                $this->jump('index.php?p=Admin&c=Goods&a=list', 'Add Success!');
            }else{
                $this->jump('index.php?p=Admin&c=Goods&a=add', 'Add Failed!');
            }
            exit;
        } 
        require __VIEW__.'goods_add.html';
    }
    
    public function getAttrListAction(){
    $type_id=$_GET['type_id'];
    $model=new AttributeModel();
    $list=$model->getInfoByFields(array('type_id'=>$type_id));
    $str='<table width="100%" id="attrTable">';
    foreach($list as $rows):
        $str.='<tr>';
        $str.='<td class="label">'.$rows['attr_name'].'</td>';
        $str.='<td>';
        $str.='<input type="hidden" name="attr_id_list[]" value="'.$rows['attr_id'].'">';
        switch($rows['attr_input_type']){
            case 0:
                $str.='<input name="attr_value_list[]" type="text"  size="40">';
                break;
            case 1:
                $str.='<select name="attr_value_list[]">';
                $str.='<option value="">请选择...</option>';
                $array=  explode(',', $rows['attr_input_value']);
                foreach($array as $v):
                    $str.='<option value="'.$v.'">'.$v.'</option>';
                Endforeach;
                $str.='</select>';
                break;
            case 2:
                $str.='<textarea  name="attr_value_list[]"></textarea>';
                break;
        }

        $str.='<input type="hidden" name="attr_price_list[]" value="0">';
        $str.='</td>';
        $str.='</tr>';
    endforeach;
    $str.='</table>';
    echo <<<str
    <script type="text/javascript">
    parent.document.getElementById('tbody-goodsAttr').innerHTML='$str';
    </script>
str;
}

    /*
*<tr>
*<td class="label">存储卡格式</td>
*<td>	
*<input type="hidden" name="attr_id_list[]" value="180">
*<input name="attr_value_list[]" type="text" value="MicroSD" size="40">  
*<input type="hidden" name="attr_price_list[]" value="0">								</td>
*</tr>
     */
   /* public function getAttrListAction() {
        
        $type_id = $_GET['type_id'];
        echo $type_id;
        $model = new AttrTypeModel();
        $list = $model->getInfoByFields(array('type_id'=>$type_id));
         
        $str = '<table width="100% id="attrTable">';
        foreach ($list as $rows) {
            $str .= '<tr>';
            $str .= '<td class="label">'.$rows['attr_name'].'</td>';
	    $str .= '<td>';
	    $str .= '<input type ="hidden" name="attr_id_list[]" value="'.$rows['attr_id'].'">';
            switch($rows['attr_input_type']){
                case 0:
                    $str .= '<input name="attr_value_list[]" type="text" size="40">';
                    break;
		case 1:
                    $str .= '<select name="attr_value_list[]">'; 
		    $str .= '<option value="">Choose...</option>';
                    $array = explode(',',$rows['attr_input_value']);
                    foreach($array as $v){
			$str .= '<option value="'.$v.'">'.$v.'</option>';
                    }
			$str .= '</select>';
			break;                    
		case 2:
                    $str .= '<textarea name="atte_value_list[]"></textarea>';
                    break;			  
            }
			  
            $str .= '<input type="hidden" name="attr_price_list[]" value="0">';
            $str .= '</td>';
            $str .= '</tr>';
        }        
            $str .= '</table>';
            echo <<<str
            <script type="text/javatext">
            parent.document.getElementById('tbody-goodsAttr').innerHTML='$str';
            </script>
str;
     }    
*/

    public function editAction() {
        require __VIEW__.'goods_edit.html';
    }
} 
     

