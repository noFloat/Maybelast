<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	if(session('user_nickname') == 'visitor' || !session('?user_nickname')){
    		session('user_nickname' ,'visitor');
    		$this->assign('user_con','login');
	        session('user_nickname','visitor');
	        $visitor['nick_name'] = session('user_nickname');
	        $this->assign('user',$visitor);
    	}else{
            $this->assign('user_con','logout');
            $visitor['nick_name'] = session('user_nickname');
            $this->assign('user',$visitor);
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