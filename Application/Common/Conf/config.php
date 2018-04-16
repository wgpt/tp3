<?php

$base = require_once 'base.php';
$config = array();

foreach (ENV_ARR as $v){
    if(TP_ENV == $v){

        $config =  require_once $v.'.php';

        $config =  array_merge($base,$config);

        return $config;
    }

}