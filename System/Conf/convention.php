<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: zhoubot <zhoubot@163.com>
// +----------------------------------------------------------------------

/**
 * ThinkPHP惯例配置文件
 * 该文件请不要修改，如果要覆盖惯例配置的值，可在应用配置文件中设定和惯例不符的配置项
 * 配置名称大小写任意，系统会统一转换成小写
 * 所有配置参数都可以在生效前动态改变
 */
defined('THINK_PATH') or exit();

$base = require_once 'base.php';
$config = '';



foreach (ENV_ARR as $v){
    if(TP_ENV == $v){
      $config =  require_once $v.'.php';

      $config =  array_merge($base,$config);

      continue;
    }

}

if($config['APP_SUB_DOMAIN_DEPLOY']){ // 自动生成多域名模块入口

    foreach ($config['MODULE_ALLOW_LIST'] as $v){
        $config['APP_SUB_DOMAIN_RULES'][$v.'.'.TOP_HOST] = $v;

    }


}

return $config;
