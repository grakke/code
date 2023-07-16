<?php
class CaptchaLib{
    private $length;
    private $font;
    
    public function __construct($length=4,$font=5) {
        $this->length   = $length;
        $this->font     = $font;
    }
    
    private function generateCode() {
       //生成4位随机字符串
        $char_array	= array_merge(range('A','Z'),range(0,9));
        $index	= array_rand($char_array,$this->length);
        shuffle($index);
        $str='';
        foreach($index as $key){
                $str .= "$char_array[$key]";
        } 
        $_SESSION['captcha'] = $str;
        return $str;
    }

    public function generateCaptcha() {
        $str = $this->generateCode();
        //读取图片
        $bg  =  './Public/captcha/captcha_bg'.rand(1,5).'.jpg';
        $img = imagecreatefromjpeg($bg);

        $textcolor = rand(0,1) ? imagecolorallocate($img,0,0,0): imagecolorallocate($img,0xff,0xff,0xff);
        $x = (imagesx($img)-imagefontwidth($this->font)*strlen($str))/2;
        $y = (imagesy($img)-imagefontheight($this->font))/2;
        imagestring($img,  $this->font,$x,$y,$str,$textcolor);
        header('Content-type:image/png');
        imagepng($img);
        imagedestroy($img);
    }
    /*核对输入的验证码
     * @param $captcha string 输入的验证码
     * @return bool 正确返回true，错误返回false
     */
    public function checkCaptcha($captcha) {
        return strtolower($captcha) == strtolower($_SESSION['captcha']) ? TRUE : FALSE;
    }
}