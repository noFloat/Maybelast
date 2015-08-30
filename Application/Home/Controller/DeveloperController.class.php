<?php
namespace Home\Controller;
use Think\Controller;

class DeveloperController extends BaseController {
    public function index(){
    	if(session('user_role') > 0) {
			$this->error('您没有权限访问');
		}else{
			$this->display('');
		}
    }
    
    public function _empty() {
        $this->display('Empty/index');
    }
}