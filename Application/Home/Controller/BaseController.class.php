<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {

    public function _before_index(){    
        if(!session('?user_name')) {
            $this->display('Login/index');
            exit;
        } else {
            $user_con = session('user_con');
            $user = session('user');
            $this->assign('user',$user);
            $this->assign('user_con',$user_con);
        }
    }

    public function destroySession(){
        session(null);
        $this->redirect(CONTROLLER_NAME . 'Index/index');
    }
}