<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller {

    private $status_code;
    private $status_msg;

    protected static $username;
    protected static $password;

    public function _before_index(){
        if(!session('?stu_id')) {
            // $this->assign(array(

            // ));
            // $this->display('Login/index');
            // exit;
            $this->display('Login/index');
            exit;
        } else {
            $this->assign(array(
                'login1' => 'loginnot1',
                'login2' => 'loginnot2',
                'checkLogin' => '退出登录',
                'checkState' => U(CONTROLLER_NAME . '/destroySession')
            ));
        }
        if(!cookie('IP_state')) {
            cookie('IP_state', 0, array('expire' => 3600, 'httponly' => 1));
        }
    }

    public function destroySession(){
        session(null);
        $this->redirect(CONTROLLER_NAME . '/index');
    }
}