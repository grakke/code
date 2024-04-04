<?php

use syntax\security\DES;

/**
 * md5加密
 */
function sign($params)
{
    $strSalt = 'sfdsagretrbfdbfd';
    $strVal = '';
    if ($params) {
        ksort($params);
        $strVal = http_build_query($params, '', '&', PHP_QUERY_RFC1738);
    }

    return md5(md5($strSalt) . md5($strVal));
}

$password = "12324434";
$strPwdHash = password_hash($password, PASSWORD_DEFAULT);
if (password_verify($password, $strPwdHash)) {
    echo 'Logged in!';
}

$aes = new Aes('sfgafgrrerd');
$encrypted = $aes->encrypt('锄禾日耽误');
echo '加密前：锄禾日耽误<br>加密后：', $encrypted, '<hr>';

$decrypted = $aes->decrypt($encrypted);
echo '加密后 ：', $encrypted, '<br>解密后：', $decrypted;

$des = new DES();
$temp = $des->encrypt('hello');
echo $temp;
echo $des->decrypt($temp);
