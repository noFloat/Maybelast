<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends BaseController {
    public function index(){
    	// if(session('?studentnum')) {
			$this->display('User/index');
		// }
    }
    
    public function changeInfo(){
    	$condition['user_name'] = session('user_name');
    	$info = M('user');
    	$origin_password = $info->where($condition)->field('password')->find();
    	$input_password = I('post.origin_password');
    	$new_password =I('post.new_password');
    	$confirm_password = I('post.confirm_password');
    	$user_qq = I('post.user_qq');
    	$content['qq'] = $user_qq;
    	if($origin_password['password'] != $input_password){
    		echo "原密码有误";
    	}elseif($new_password != $confirm_password){
    		$info->where($condition)->save($content);
    		echo "两次输入密码不同";
    	}else{
    		$content['password'] = $new_password;
    		$info->where($condition)->save($content);
    		echo "修改成功！";
    	}
    }
    public function _empty() {
        $this->display('Empty/index');
    }
}