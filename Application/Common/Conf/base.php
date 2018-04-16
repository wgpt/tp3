<?php
/**
 * 配置基础
 * User: tan
 * Date: 2018/4/16
 * Time: 17:55
 */

$config_arr = array(
    /*模板设置*/
    'TMPL_PARSE_STRING' => array (
        '__THEME_PL__' => '/Public/Plugins',
        '__THEME_JS__' => '/Public/Js',
        '__THEME_CSS__' => '/Public/Css',
        '__THEME_IMG__' => '/Public/Images',
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__STATIC_VERSION__' => 'abcnkidjbem20171103', // 版本号
    ),
    'SHOW_PAGE_TRACE' => true,

    'COOKIE_KEY' => 'tp',
    'COOKIE_TIME' => 86400,

    /*表单令牌验证*/
    'TOKEN_ON' => true,  // 是否开启令牌验证
    'TOKEN_NAME'=>'token',    // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true



    /*页面title*/
    'WEB_TITLE' => 'tp3.2.3',

);

$loader = require ('loader.php');

return array_merge($config_arr,$loader);