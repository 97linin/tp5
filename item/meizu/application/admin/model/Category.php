<?php
namespace app\common\model;
use think\Model;
class Category extends Model{	
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
}