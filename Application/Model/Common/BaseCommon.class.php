<?php
/**
 * 共同类
 * BaseCommon.class.php
 * @copyright (C) 2017 taotaole
 * @license http://www.taotaole.com/
 * @lastmodify 2017-8-10
 * @author zhoubot
 */
namespace Model\Common;
class BaseCommon{

    /**
     * 实例化对象
     * @return BaseCommon
     */
    public static function getInstance(){
        return StaticService::getInstance(__CLASS__);
    }



}