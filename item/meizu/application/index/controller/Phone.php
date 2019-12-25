<?php
namespace app\index\controller;
use think\Controller;
use app\common\service\PhoneService;
use app\common\service\MailService;
use think\captcha\Captcha;
use app\common\controller\Base;
class Phone extends Base{
	public function test(){
		$data=PhoneService::sendmsg('13543813346','6666');
		dump($data);
	}
	public function login(){
		$this->isLogin();
		$data=['navMenu'=>['首页','用户登录']];
		$this->assign($data);
		return $this->fetch();
	}
	public function register(){
		$data=['navMenu'=>['首页','用户注册']];
		$this->assign($data);
		return $this->fetch();
	}
	public function getcode(){
		$data=input('post.');
		$phone=$data['phone'];
		$code=rand(100000,999999);
		$data=PhoneService::sendmsg($phone,$code);
		if($data['code']==0){
			cache('phone_'.$phone,$code,18000);
		}
		return json($data);
	}
	public function save(){
		if(request()->isPost()){
			$post=input('post.');
			//验证码
			$phone=input('post.phone');
			$code=input('post.code');
			if(!($phone&&$code)){
				$this->error('输入错误，请重新输入');
			}
			/* if($code==cache('phone_'.$phone)){
				cache('phone_'.$phone,NULL);
			}else{
				$this->error('验证码错误，请重新输入');
			} */
			unset($post['code']);
			$val=validate('User');
			if(!$val->scene('add')->check($post)){
				$this->error($val->getError());
				
			}
			
			$res=model('User')->add($post);
			if($res>0){
				$this->success('注册成功',url('index/index'));
			}else{
				$this->error('新增失败');
			}
		}
	}
	public function checkusername(){
		$username=input('post.username');
		$data=model('User')->searchbyusername($username);
		if(is_null($data)){
			return json(['code'=>0]);//用户名不存在,用户名可用
		}
		return json(['code'=>1]);//此用户名不可用
	}
	public function checkphone(){
		$phone=input('post.phone');
		$data=model('User')->searchbyphone($phone);
		if(is_null($data)){
			return json(['code'=>0]);//手机号未注册,手机号可用
		}
		return json(['code'=>1]);//此手机号不可用
	}
	public function loginusername(){
		if(request()->isPost()){
			$post=input('post.');
			//验证码
			
			$username=input('post.username');
			$password=input('post.password');
			$data=model('User')->loginbyusername($username,$password);
			if(is_null($data)){
				$this->error('用户名或密码错误');
			}else{
				unset($data['password']);
				session('user',$data);
				$this->success('登录成功',url('admin/index/index'));
			}
		}	
	}
	public function loginphone(){
		if(request()->isPost()){
			$post=input('post.');
			//验证码
			$phone=input('post.phone');
			$code=input('post.code');
			if(!($phone&&$code)){
				$this->error('输入错误，请重新输入');
			}
			if($code==cache('phone_'.$phone)){
				cache('phone_'.$phone,NULL);
			}else{
				$this->error('验证码错误，请重新输入');
			}
			$data=model('User')->loginbyphone($phone);
			if(is_null($data)){
				$this->error('手机号错误');
			}else{
				unset($data['password']);
				session('user',$data);
				$this->success('登录成功',url('admin/index/index'));
			}
		}	
	}
	public function logout(){
		session('user',null);
		$this->success('成功退出',url('index/index'));
	}
	public function forget(){
		$data=['navMenu'=>['首页','忘记密码']];
		$this->assign($data);
		return $this->fetch();
	}
	public function forgetemail(){
		$post=input('post.');
		//验证码
		$email=input('post.email');
		$data=model('user')->searchbyemail($email);
		if(is_null($data)){
			$this->error('此邮箱不存在');
		}else{			 
			$msg=MailService::send($email,'密码找回','新密码是'.'888888');
			if($msg['code']==0){
			    $this->success('新密码已发送至邮箱','index/index');
			}
			$this->error('出错了');
		}
	}
	public function forgetphone(){
		$post=input('post.');
		//验证码
		$phone=input('post.phone');
		cache('phone_'.$phone,'8848',18000);
		$code=input('post.code');
		if(!($phone&&$code)){
			$this->error('输入错误，请重新输入');
		}
		if($code==cache('phone_'.$phone)){
			cache('phone_'.$phone,NULL);
		}else{
			$this->error('验证码错误，请重新输入');
		}
		$data=model('user')->searchbyphone($phone);
		if(is_null($data)){
			$this->error('此手机号不存在');
		}else{	
			$data=['phone'=>$phone,'password'=>'888888'];
			$res=model('user')->Updatepwdphone($data);
			if($res==0){
				$this->success('新密码已重置为888888','index/index');
			}
			$this->error('出错了');
		}
	}
}