<?php
namespace app\common\controller;
use think\Controller;
use think\facade\Session;
class Base extends Controller{
	public function isLogin(){
		if(Session::has('user')){
			$this->error('您已经登录了','index/index');
		}
	}
}