<?php
namespace app\common\model;
use think\Model;
class Liupai extends Model{	
	public function add($data){
		return $this->save($data);
	}
	public function getList(){
		$where=[
			'status'=>0,
		];
		return $this->field('id,title')
		->order('id','desc')
		->where($where)
		->select();
	}
	public function getTop($num=6){
		$where=[
			'status'=>0,
		];
		return $this->field('id,title')
		->order('id','asc')
		
		->where($where) ->limit($num)
		->select();
	}
}