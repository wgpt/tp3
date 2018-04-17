<?php

namespace Web\Controller;


use MDP\User;

class IndexController extends BaseController {

    public function index() {

        echo User::getInstance()->getUser();

        $this->assign(get_defined_vars());
        $this->display();

    }


}


