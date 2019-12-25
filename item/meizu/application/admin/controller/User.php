<?php
namespace app\admin\controller;
use think\Controller;
class User extends Base{
	public function index(){
		$user=new \app\index\model\User();
		$data=$user->getList();
		$this->assign('data',$data);
		$nav=['navMenu'=>['会员列表']];
		$this->assign($nav);
		return $this->fetch();
	}
	
	public function add(){
		return $this->fetch();
	}
	public function show(){
		$id=input('param.id');
		$user=new \app\index\model\User();
		$res=$user->get($id);
		$this->assign('data',$res);
		return $this->fetch();
	}
	public function info(){
		
		return $this->fetch();
	}
	public function edit($id=0){
		//id 获取网站栏目的对象
		$data=model('User')->get($id);
		$this->assign('data',$data);
		return $this->fetch('edit1',[
		'test'=>'324234',
		]);
	}
	public function update(){
		//先要获取数据
		$data=input('post.');
		model('User')->update([
		'password'=>$data['password'],
		'id'=>$data['id'],
		]);
		$this->success('修改成功，','user/index');
	}
	public function save(){
		if(request()->isAjax()){
			$post=input('post.');
			//验证码
			
			$val=new \app\index\validate\User();
			if(!$val->scene('add')->check($post)){
				$this->error($val->getError());
				
			}
			$user=new \app\index\model\User();
			$res=$user->add($post);
			if($res>0){
				$this->success('注册成功',url('index/index'));
			}else{
				$this->error('新增失败');
			}
		}
	}
}