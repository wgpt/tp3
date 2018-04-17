<?php
/**
 *
 * User: tan
 * Date: 2018/4/17
 * Time: 10:48
 */

namespace Model;


use Server\StaticService;

class UserModel extends BaseModel {

    /**
     * @return UserModel
     * */
    public static function getInstance() {
        return StaticService::getInstance(__CLASS__);

    }

    public function getData(){

        return $this->select();
    }

}