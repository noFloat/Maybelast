<?php
namespace Home\Controller;
use Think\Controller;

class AdminController extends BaseController {
    public function index(){
    	if(session('user_role') > 1) {
			$this->error('您没有权限访问');
		}else{
			$this->user_info();
			$this->display('');
		}
    }
    
    public function user_info(){
    	$User = M('role_user');
    	$condition['role_id'] = '3';
    	$count= $User->where($condition)->count();
    	$Page = new \Think\Page($count,10);
    	$show  = $Page->show();
    	$user_role = $User->where($condition)->getField('user_id');
    	var_dump($user_role['']);
    	$condition2['id'] = $user_role;
    	$user_in = M('user');
    	$list = $user_in->where($condition2)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$list);
    	$this->assign('page',$Page);	
    }

    public function _empty() {
        $this->display('Empty/index');
    }
}