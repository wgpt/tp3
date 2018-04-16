<?php

namespace Web\Controller;


class IndexController extends BaseController {

    public function index() {

        $this->assign(get_defined_vars());
        $this->display();

    }


}


