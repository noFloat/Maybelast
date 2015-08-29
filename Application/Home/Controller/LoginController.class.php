<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends BaseController {
	private $userNum = '';
	private $password = '';
    public function index(){
    	$this->userNum = I('post.userNum');
        $this->password = I('post.password');
        $this->_getInfo();
    }

    private function _getInfo(){
    	$cinfo = M('users');
    	$nowtime = time();
    	session('testnum') = '0';
    	$condition['usernum'] = $this->userNum;
    	$condition['password'] = $this->password;
    	$stu = $cinfo->where($condition)->find();
    	if($cinfo){
    		$this->initSession($stu);
    		$content['updated_at'] = date("Y-m-d H:i:s", time());
    		$cinfo->where($condition)->save($content);
    	}elseif(session('testnum') == 5){
    		if(!session('?lasttime')){
    			session('lasttime') = $nowtime;
    		}elseif{$nowtime - session('lasttime') < 600}{
    			echo 0;
    		}else{
    			session('testnum') = 0;
    		}
    	}else{
    		session('testnum') = session('testnum') + 1;
    	}
    }
    
    private function initSession($stu){
    	session('name') = $stu['name'];
    	session('usernum') = $stu['usernum'];
    	session('gender') = $stu['gender'];

    }

    public function _empty() {
        $this->display('404/index');
    }
}