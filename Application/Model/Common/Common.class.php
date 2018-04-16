<?php
/**
 * 共同类
 * Common.class.php
 * @author tzw
 */
namespace Model\Common;
use Server\ServiceInterFace;
use Server\StaticService;
class Common implements ServiceInterFace{

    /**
     * 实例化对象
     * @return object Common
     */
    public static function getInstance(){
        return StaticService::getInstance(__CLASS__);
    }



}