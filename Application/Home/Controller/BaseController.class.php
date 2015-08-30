<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {

    public function _before_index(){
        if(!session('?user_name')) {
            $this->display('Login/index');
            exit;
        } else {

        }
    }

    public function destroySession(){
        session(null);
        $this->redirect(CONTROLLER_NAME . 'Index/index');
    }
}