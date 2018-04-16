<?php
/**
 * 共同类
 * BaseCommon.class.php
 */

namespace Model\Common;
use Server\StaticService;

class BaseCommon {

    /**
     * 实例化对象
     * @return object BaseCommon
     */
    public static function getInstance() {
        return StaticService::getInstance(__CLASS__);
    }


}