<?php
namespace app\common\model;
use think\Model;
class Minghua extends Model{	
	public function add($data){
		return $this->save($data);
	}
	public function getList(){
		$where=[
			'status'=>0,
		];
		return $this->field('id,title,create_time,liupai_id,user_id,price')
		->where($where)
		->paginate(3);
	}
	public function liupai(){
		return $this->belongsTo('Liupai');
	}
	public function user(){
		return $this->belongsTo('User');
	}
}