<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends BaseController {
    public function index(){
    	// if(session('?studentnum')) {
			$this->display('User/index');
		// }
    }
    
    public function _empty() {
        $this->display('Empty/index');
    }
}