<?php
/**
 * 数据库数据操作中心
 * BaseModel.class.php
 */

namespace Model;
use Server\ServiceInterFace;
use Server\StaticService;
use Think\Model;

abstract class BaseModel extends Model implements ServiceInterFace {

    /**
     * 实例化对象
     * @return BaseModel
     */
    public static function getInstance() {
        return StaticService::getInstance(__CLASS__);
    }


}