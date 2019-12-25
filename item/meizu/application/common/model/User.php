<?php
namespace app\common\model;

use think\Model;

class User extends Model
{
	public function getList(){
		$where=[
			'state'=>0,
		];
		return $this->field('id,username,nickname,email,phone,create_time')
		->where($where)
		->paginate(2);
	}
	public function add($data){
		return $this->save($data);
	}
	public function searchbyusername($username){
		$where=[
			'username'=>$username,
		];
		return $this->where($where)->find();
	}
	public function searchbyphone($phone){
		$where=[
			'phone'=>$phone,
		];
		return $this->where($where)->find();
	}
	public function loginbyusername($username,$password){
		$where=[
			'username'=>$username,
			'password'=>$password,
		];
		return $this->where($where)->find();
	}
	public function loginbyphone($phone){
		$where=[
			'phone'=>$phone,
		];
		return $this->where($where)->find();
	}
	public function searchbyemail($email){
		$where=[
			'email'=>$email,
		];
		return $this->where($where)->find();
	}
	public function Updatepwdemail($data){
		$res=$this->where('email',$data['email'])
				  ->update(['password'=>$data['password']]);
		if($res>=1){
			return 0;//成功
		}
		return 1;
	}
	public function Updatepwdphone($data){
		$res=$this->where('phone',$data['phone'])
				  ->update(['password'=>$data['password']]);
		if($res>=1){
			return 0;//成功
		}
		return 1;
	}
}