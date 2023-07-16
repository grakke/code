<?php

class ImageLib{
    private $error;
    
    public function getError() {
        return $this->error;
    }
    
    public function thumb($src_file,$max_w=300,$max_h=300,$is_proportion=true,$prefix='mini_') {
        $ext = strtolower(strrchr($src_file,'.'));//扩展名
        switch($ext) {
            case '.jpg':
		$type='jpeg';
		break;
            case '.gif':
	    	$type='gif';
		break;
	    case '.png':
                $type='png';
		break;
	    default:
                $this->error='类型错误';
		return false;
	}
        $fn_open = 'imagecreatefrom'.$type;
        $src   = $fn_open($src_file);
        $dst   = imagecreatetruecolor($max_w,$max_h);
        $color = imagecolorallocate($dst,255,255,255);
        //imagefill($dst,0,0,$color);
        $src_w=imagesx($src);
        $src_h=imagesy($src);
        if($is_proportion){
            if($src_w/$src_h>$max_w/$max_h){
                $dst_w=$max_w;
                $dsx_h=$max_w*$src_h/$src_w;
            }else{
                $dst_h=$max_h;
                $dst_w=$src_w*$max_h/$src_h;
                    }
        }else{
            $dst_w = $max_w;
            $dst_h = $max_h;
        }
            $dst_h=(int)$dst_h;
            $dst_w=(int)$dst_w;
            
            $dst_x=($max_w-$dst_w)/2;
            $dst_y=($max_h-$dst_h)/2;
            
            imagecopyresampled($dst,$src,$dst_x,$dst_y,0,0,$dst_w,$dst_h,$src_w,$src_h);
            $smallname = $prefix.basename($src_file);
            $samllpath = dirname($src_file).'/'.$smallname;
            $fn_save   = 'image'.$type;
            $fn_save($dst,$smallpath);
            imagedestroy($src); 
            imagedestroy($dst);
            return $smallname;
            }
}

