<?php
/**
 * Created by PhpStorm.
 * User: Haku
 * Date: 15/8/10
 * Time: 15:31
 */

namespace Home\Controller;
use Think\Controller;
use Think\Exception;

class EmptyController extends Controller {
    public function index(){
        $this->display('404/index');
    }

    public function _empty() {
        $this->display('404/index');
    }
}