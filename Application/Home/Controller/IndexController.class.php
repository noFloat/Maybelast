<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	echo session('user_nickname');
    	if(session('user_nickname') == 'visitor' || !session('?user_nickname')){
    		session('user_nickname' ,'visitor');
    		$user_con['content'] = 'login';
    		$this->assign('user_con',$user_con);
	        session('user_nickname','visitor');
	        $visitor['nick_name'] = session('user_nickname');
	        $this->assign('user',$visitor);
    	}else{
    	}
			$this->display('Index/index');
    }
    public function destroy(){
    	if(session('user_nickname') == 'visitor'){
    		$this->display('Login/index');
    	}else{
    		session(null);
	        $this->index();
    	}
    }
    public function _empty() {
        $this->display('Empty/index');
    }
}