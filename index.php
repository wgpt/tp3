<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tzw (782093540@qq.com)
// +----------------------------------------------------------------------

// 应用入口文

if (version_compare(PHP_VERSION, '5.3.0', '<')) die('require PHP > 5.3.0 !');


function get_host(){ // 获取
    $url   = $_SERVER['HTTP_HOST'];
    $data = explode('.', $url);
    $co_ta = count($data);
    //判断是否是双后缀
    $zi_tow = true;
    $host_cn = 'com.cn,net.cn,org.cn,gov.cn';
    $host_cn = explode(',', $host_cn);
    foreach($host_cn as $host){
        if(strpos($url,$host)){
            $zi_tow = false;
        }
    }
    //如果是返回FALSE ，如果不是返回true
    if($zi_tow == true){
        $host = $data[$co_ta-2].'.'.$data[$co_ta-1];
    }else{
        $host = $data[$co_ta-3].'.'.$data[$co_ta-2].'.'.$data[$co_ta-1];
    }
    return $host;
}

$host = get_host(); // 顶级域名
define('TOP_HOST',$host);

define('ENV_ARR',array('dev','test','prod')); // 可配置开发模式数组


$var = true; // debug 是不开启
$env = 'dev'; // 环境标志 'dev','test','prod'

// 根据域名开发模式
if ($host == 'tpm.com') { // dev
    $var = true;
    $env = 'dev';
} else if ($host == 'tt.com') { // test
    $var = true;
    $env = 'test';
} else if ($host == 'tp.com') { // prod
    $var = false;
    $env = 'prod';
} else {
    exit('非法域名');
}

//配置开发模式
define('TP_ENV',$env);

//开发阶段为 true, 部署阶段为 fales
define('APP_DEBUG', $var);
//缓存目录设置，此目录必须可写
define('RUNTIME_PATH', './Runtime/');
//定义公共目录
define('PUBLIC_PATH', './Public/');
//关闭目录安全文件的生成
define('BUILD_DIR_SECURE', false);
// 定义应用目录
define('APP_PATH', './Application/');
//定义公共模块的目录，放到应用目录外
define('COMMON_PATH', APP_PATH . 'Common/');
//定义网站根目录
define('WEB_PATH', dirname(__FILE__));
// 引入ThinkPHP入口文件
require './System/Runtime.php';

