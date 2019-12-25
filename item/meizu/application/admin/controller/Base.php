<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller{
	protected function initialize(){
		if(is_null(session('user'))){
			$this->error('请先登录',url('index/phone/login'));
		}
	}
}