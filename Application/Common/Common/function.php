<?php



//数组转换成对象
function array2object($array) {
  if (is_array($array)) {
    $obj = new StdClass();
    foreach ($array as $key => $val){
      $obj->$key = $val;
    }
  }
  else { $obj = $array; }
  return $obj;
}
//对象转换成数组
function object2array($object) {
  if (is_object($object)) {
    foreach ($object as $key => $value) {
      $array[$key] = $value;
    }
  }
  else {
    $array = $object;
  }
  return $array;
}
function ymdhis($time){
   return date('Y-m-d H:i:s',$time);
}
function money($money){
    return sprintf("%0.2f", $money/100);
}
//接口返回
function back($status,$msg,$data='',$page_num=0){
 $new_data = convertNullToStr($data);
 if(!empty($new_data)){
     if($page_num<=0){
         return json_encode(array('status'=>(int)$status,'msg'=>$msg,'data'=>$new_data));
     }else{
         return json_encode(array('status'=>(int)$status,'msg'=>$msg,'data'=>$new_data,'page_num'=>$page_num));
     }
 }else{
     return json_encode(array('status'=>(int)$status,'msg'=>$msg));
 }
}


/*
 * 保存图片
 * @params $fileName 文件夹名字
 * @params $extension 文件的后缀名字
 */
function saveImage($fileName,$extension,$productId){
    $return = [];
    $imge_url = C('IMAGE_PATH');
    $savaPath = $imge_url.'/'.$fileName.'/';
	if(!is_dir($savaPath)){
		mkdir($savaPath,0777,true);
                chmod($savaPath,0777);
	}
    $image_name = getRandomString(15);
    $return['fileName'] = $image_name.'.'.$extension;
    $return['img_url'] =  $savaPath.$return['fileName'];
    $return['save_path'] =  $savaPath;
    $return['save_url'] = $fileName.'/'.$return['fileName'];
    return $return;
}

//获取密码
function getPasswd($passWd,$key,$password_key){
    return md5(md5($passWd.$key).$password_key);
}




/**
 * 生成唯一uid
 */
function guid(){
    if (function_exists('com_create_guid')){

        return trim(com_create_guid(), '{}');
        //return com_create_guid();
        
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
                		
        return $uuid;
    }

}

/**
 *  生成6位随机验证码 
 *  since 2015-7-8
 **/
function GetRandStr($len) 
{ 
    $chars = array( 
        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 

/**
 * 保存cookie
 */
function saveCookit($name,$value,$time=''){
    $time = $time!='' ? $time :C('COOKIE_EXPIRE');
    $domain = C('COOKIE_DOMAIN');
    return cookie($name,$value,"expire={$time}&httponly=true&domain={$domain}");
}

/**
 *生成订单号
 * @return mixed
 */
function create_orderno()
{
	$orderNo=microtime_format('YmdHisx', microtime_float()).mt_rand(10000, 99999);
	return $orderNo;
}


//加密解密
 function encrypt($str, $opt) {
 	if($str==null)
 	return null;
	$aes = new \Org\Util\Encrypt(); // 把加密后的字符串按十六进制进行存储
	$aes->set_key("taozhicai"); // 密钥
	$aes->require_pkcs5();
	$returnStr = "";
	//0:加密 1：解密
	if ($opt == 0) {
		$returnStr = $aes->encrypt($str); //加密
	} else {
		$returnStr = $aes->decrypt($str); //解密
	}
	return $returnStr;
}



/**
 * 换图片信息
 * @param type $img
 * @param type $k
 * @param type $size
 * @return type
 */
function changeSize($img, $k, $size){
    $info = $img[$k];
    $infoName = substr($info,strrpos($info, '/')+1);
    $sizeName = substr($infoName, 0, strrpos($infoName, '_'));
    $name_arr = explode('_', $sizeName);
//        $file_800×800 =  str_replace($sizeName, $name_arr[0].'_800_800', $value[$k]); //800×800
//        $file_45×45 = str_replace($sizeName, $name_arr[0].'_45_45', $value[$k]);   //45×45
    
//    return str_replace($sizeName, $size.'_'.$size, $img[$k]);
    return str_replace($sizeName, $name_arr[0].'_'.$size.'_'.$size, $img[$k]);   //45×45
}



/**
 * url验证
 * @param $s
 * @return bool
 */
function isUrl($s)
{
    return preg_match('/^http[s]?:\/\/'.
        '(([0-9]{1,3}\.){3}[0-9]{1,3}'. // IP形式的URL- 199.194.52.184
        '|'. // 允许IP和DOMAIN（域名）
        '([0-9a-z_!~*\'()-]+\.)*'. // 域名- www.
        '([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\.'. // 二级域名
        '[a-z]{2,6})'.  // first level domain- .com or .museum
        '(:[0-9]{1,4})?'.  // 端口- :80
        '((\/\?)|'.  // a slash isn't required if there is no file name
        '(\/[0-9a-zA-Z_!~\'\(\)\[\]\.;\?:@&=\+\$,%#-\/^\*\|]*)?)$/',
        $s) == 1;
}




/**
 * 当月 第一天 最后一天
 * @return mixed
*/
function getLastDay(){

    $firstDay = date('Y-m-01', strtotime(date("Y-m-d")));
    $lastDay = date('d', strtotime("$firstDay +1 month -1 day"));
    return array($firstDay,$lastDay);

}

/**
 *CURL post
 *@param string $url 地址
 *@param mixed $post_data 数据
 *@return mixed
 */

function curl_post($url,$post_data){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output,true);
}


/**
 *CURL get
 *@param string $url 地址
 *@return mixed
 */

function curl_get($url){
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_URL,$url);

    $output =  curl_exec($ch);
    curl_close($ch);
    return $output;

}


/**
 * 判断微信浏览器
 * */
function isWeiXin(){
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
        return true;
    }
    return false;
}

/**
 * 返回中英文首字母
 *
 * @param string $str
 * @return string
 *
 * */

function getFirstChar($str) {
    $char = ord(substr($str, 0, 1));
    if (($char >= ord("a") and $char <= ord("z"))or($char >= ord("A") and $char <= ord("Z"))) return strtoupper(chr($char));
    $s = iconv("UTF-8", "GBK", $str);
    $asc = ord($s{0}) * 256 + ord($s{1})-65536;
    if ($asc >= -20319 and $asc <= -20284)return "A";
    if ($asc >= -20283 and $asc <= -19776)return "B";
    if ($asc >= -19775 and $asc <= -19219)return "C";
    if ($asc >= -19218 and $asc <= -18711)return "D";
    if ($asc >= -18710 and $asc <= -18527)return "E";
    if ($asc >= -18526 and $asc <= -18240)return "F";
    if ($asc >= -18239 and $asc <= -17923)return "G";
    if ($asc >= -17922 and $asc <= -17418)return "H";
    if ($asc >= -17417 and $asc <= -16475)return "J";
    if ($asc >= -16474 and $asc <= -16213)return "K";
    if ($asc >= -16212 and $asc <= -15641)return "L";
    if ($asc >= -15640 and $asc <= -15166)return "M";
    if ($asc >= -15165 and $asc <= -14923)return "N";
    if ($asc >= -14922 and $asc <= -14915)return "O";
    if ($asc >= -14914 and $asc <= -14631)return "P";
    if ($asc >= -14630 and $asc <= -14150)return "Q";
    if ($asc >= -14149 and $asc <= -14091)return "R";
    if ($asc >= -14090 and $asc <= -13319)return "S";
    if ($asc >= -13318 and $asc <= -12839)return "T";
    if ($asc >= -12838 and $asc <= -12557)return "W";
    if ($asc >= -12556 and $asc <= -11848)return "X";
    if ($asc >= -11847 and $asc <= -11056)return "Y";
    if ($asc >= -11055 and $asc <= -10247)return "Z";
    return "#";
}