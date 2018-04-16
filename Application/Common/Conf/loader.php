<?php
/**
 * 定义模块地址
 * User: tan
 * Date: 2018/4/16
 * Time: 16:23
 */

$url = array();

if(C('APP_SUB_DOMAIN_DEPLOY')){ // 是否开启多域名
    foreach (C('MODULE_ALLOW_LIST') as $v){

        $url[$v] = $v.'.'.TOP_HOST;
    }



}else{

    foreach (C('MODULE_ALLOW_LIST') as $v){
        $url[$v] = TOP_HOST.'/'.$v;
    }

}
return $url;