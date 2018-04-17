<?php
/**
 * 数据处理中心
 * User: tan
 * Date: 2018/4/17
 * Time: 11:33
 */

namespace MDP;


use Model\UserModel;
use Server\StaticService;

class User extends Base{
    /**
     * @return User
     * */
    public static function getInstance() {
        return StaticService::getInstance(__CLASS__);

    }

    /**
     * @return mixed
     * */
    public function getUser(){

        return UserModel::getInstance()->getData();
    }
}