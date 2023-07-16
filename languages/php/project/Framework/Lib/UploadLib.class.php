<?php

class UploadLib {
    private $path;
    private $size;
    private $type_array;
    private $error;
    
    public function __construct($path,$size,$type) {
        $this->path=$path;
        $this->size=$size;
        $this->type_array=$type;        
    }
    public function getError() {
        return $this->error;
    }
    
    public function upload($file) {
        $error_num = $file['error'];
	//CHECK TYPE OF ERROR
	if($error_num!=0){
            switch($error_num){
		case 1:
			$this->error = 'UPLOAD_ERR_INI_SIZE';
			break;
		case 2:
			$this->error = 'UPLOAD_ERR_FORM_SIZE';
			break;
		case 3:
                        $this->error = 'UPLOAD_ERR_PARTIAL';
                        break;
		case 4:
			$this->error = 'UPLOAD_ERR_NO_FILE';
			break;
		case 6:
			$this->error = 'UPLOAD_ERR_NO_TMP_DIR';
			break;
		case 7:
			$this->error = 'UPLOAD_ERR_CANT_WRITE';
			break;
		default:
			$this->error = 'Unknow Error';		
            }
            return false;
	}
    
        
        $type=$file['type'];
	if(!in_array($type,$this->type_array)){
            $this->error = 'Wrong type!';
            return false;
	}
	//SIZE
	if($file['size']>$this->size){
		$this->error = 'Size bigger then 1M!';
                return false;
	}	
	//METHOD
	if(!is_uploaded_file($file['tmp_name'])){
		$this->error = 'Unlegal method!';
                return false;
	}
	//UPLOAD
        $foldername=date('Y-m-d');
        $folderpath=$this->path.$foldername;
        if(!file_exists($folderpath)){//file_exists
            mkdir($folderpath);
        }
	$filename = uniqid('',true).strrchr($file['name'],'.');//无后缀因为$_FILES['file']['name']
        $path = $folderpath.DS.$filename;
	if(move_uploaded_file($file['tmp_name'],$path)){
		return $foldername.'\\'.$filename;
	}else{
		$this->error = 'Failed!';
                return false;
	}
    }
}

