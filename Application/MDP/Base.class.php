<?php
/**
 * 共同类
 * Base.class.php
 */

namespace MDP;
use Server\ServiceInterFace;
use Server\StaticService;

abstract class Base implements ServiceInterFace {

    /**
     * 实例化对象
     * @return Base
     */
    public static function getInstance() {
        return StaticService::getInstance(__CLASS__);
    }


}