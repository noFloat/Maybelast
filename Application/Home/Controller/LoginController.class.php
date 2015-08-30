<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {
	private $user_name = '';
	private $password = '';
    public function index(){
    	$this->user_name= I('post.user_name');
        $this->password = I('post.password');
        $this->_getInfo();
    }

    private function _getInfo(){
    	$cinfo = M('user');
    	$nowtime = time();
    	session('testnum','0');
    	$condition['user_name'] = $this->user_name;
    	$condition['password'] = $this->password;
    	$user = $cinfo->where($condition)->find();
        session('user',$user);
    	if($user['status'] == "0"){
            $this->error('您的号被封');
        }elseif($user){
            $this->assign('user',$user);
            $user_con['content'] = 'logout';
            session('user_con','logout');
            $this->assign('user_con',$user_con);
    		$this->initSession($user);
    		$content['last_login'] = date("Y-m-d H:i:s", time());
            $cinfo->where($condition)->setInc('login_time',1);
    		$cinfo->where($condition)->save($content);
            $this->position();
    	}elseif(session('testnum') == 5){
    		if(!session('?lasttime')){
    			session('lasttime',$nowtime);
                $this->error('密码错误');
    		}elseif($nowtime - session('lasttime') < 600){
                $this->error('尝试5次，10分钟后再登录');
    		}else{
    			session('testnum',0);
                $this->error('密码错误');                
    		}
    	}else{
            $testnum = session('testnum') + 1;
    		session('testnum',$testnum);
            $this->error('密码错误');
    	}
    }
    private function position(){
        if(session('user_role') == '2'){
            $this->display('User/index');
        }elseif(session('user_role') == '1'){
            $this->display('Admin/index');
        }elseif(session('user_role') == '0'){
            $this->display('Developer/index');
        }else{
            $this->error("密码错误");
        }
    }

    private function initSession($user){
    	session('user_name',$user['user_name']);
        session('user_nickname',$user['nick_name']);
    	session('bind_user_name', $user['bind_user_name']);
        session('user_id',$user['id']);
        $this->checkrole();

    }

    private function checkrole(){
        $cinfo = M('role_user');
        $condition['user_id'] = session('user_id');
        $user = $cinfo->where($condition)->find();
        $role_condition['id'] = $user['role_id'];
        $role = M('role');
        $user_role = $role->where($role_condition)->find();
        session('user_role',$user_role['pid']);
    }

    public function _empty() {
        $this->display('Empty/index');
    }
}