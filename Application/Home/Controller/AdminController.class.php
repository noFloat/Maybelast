<?php
namespace Home\Controller;
use Think\Controller;

class AdminController extends BaseController {
    public function index(){
    	if(session('user_role') > 1) {
			$this->error('您没有权限访问');
		}else{
			$this->user_info();
			$this->display('Admin/index');
		}
    }
    
    public function user_info(){
    	$User = M('role_user');
    	$user_in = M('user');
    	$condition['role_id'] = '3';
    	$condition['status'] = '1';
    	$count= $User->where($condition)->count();
    	$Page = new \Think\Page($count,10);
    	$show  = $Page->show();

    	// for($i = 0 ;$i < $count;$i++){
    	// 	echo $user_role[$i]['user_id']."</br>";
    	// 	$condition3['id'] = $user_role[$i]['user_id'];
    	// 	$list_in = $user_in->where($condition3)->find();
    	// 	var_dump($list_in);
    	// 	echo "</br>";
    	// 	array_push($list,$list_in);
    	// }
    	$list = $User->join('back_user ON back_role_user.user_id = back_user.id')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();

    	$this->assign('list',$list);
    	$this->assign('page',$Page);	
    }

    public function forbid(){
    	$for = M('user');
    	$condition['id'] = I('post.user_id');
    	$content['status'] = '0';
    	$for->where($condition)->save($content);
    	echo 1;
    }

    public function _empty() {
        $this->display('Empty/index');
    }
}