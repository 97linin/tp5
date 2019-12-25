<?php
namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
		'id'  =>  'require|number',
		'username'  =>  'max:30|checkUsername',
		'email'  =>  'checkEmail:',
		'phone'  =>  'checkPhone:',
    ];
	
	protected $scene=[
		'add'  =>  ['username','phone'],
		'edit'  =>  ['id','username','phone','email','password'],
		'del'	=>['id'],
		
	];
	protected function checkUsername($value,$rule,$data=[]){
		$where=[
			['username','=',$value],
		];
		$obj=new \app\index\model\User();
		//$user=model('User')->where($where)->find();
		$user=$obj->where($where)->find();
		if(!empty($user)) return '已存在此用户名，请更换再进行注册！';
		return true;
	}
	protected function checkEmail($value,$rule,$data=[]){
		$where=[
			['email','=',$value],
		];
		$obj=new \app\index\model\User();
		//$user=model('User')->where($where)->find();
		$user=$obj->where($where)->find();
		if(!empty($user)) return '已存在此邮箱，请更换再进行注册！';
		return true;
	}
	protected function checkPhone($value,$rule,$data=[]){
		$where=[
			['phone','=',$value],
		];
		$obj=new \app\index\model\User();
		//$user=model('User')->where($where)->find();
		$user=$obj->where($where)->find();
		if(!empty($user)) return '已存在此手机号，请更换再进行注册！';
		return true;
	}
}