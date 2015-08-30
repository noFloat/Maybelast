<?php
namespace Home\Controller;
use Think\Controller;

class DeveloperController extends BaseController {
    public function index(){
    	if(session('user_role') > 0) {
			$this->error('您没有权限访问');
		}else{
			$this->user_info();
			$this->display('Developer/index');
		}
    }
   
    public function user_info(){
    	$User = M('role_user');
    	$user_in = M('user');
    	$count= $User->where('role_id =2 or role_id = 3')->count();
    	$Page = new \Think\Page($count,10);
    	$show  = $Page->show();
    	$list = $User->join('back_user ON back_role_user.user_id = back_user.id')->where('role_id =2 or role_id = 3')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$list);
    	$this->assign('page',$Page);	
    }

    public function changeAccess(){
    	$for = M('role_user');
    	$condition['user_id'] = I('post.user_id');
    	$content['role_id'] = I('post.access');
    	if( 1 < $content['role_id'] && $content['role_id'] < 4){
	    	$for->where($condition)->save($content);
	    	echo 1;
    	}else{
    		echo 0;
    	}
    }
    public function _empty() {
        $this->display('Empty/index');
    }
}