<?php
namespace app\common\model;
use think\Model;
class Article extends Model{	
	public function add($data){
		return $this->save($data);
	}
	public function getList(){
		$where=[
			'status'=>0,
		];
		return $this->field('id,title,create_time,category_id,user_id,price')
		->where($where)
		->paginate(3);
	}
	public function category(){
		return $this->belongsTo('Category');
	}
	public function user(){
		return $this->belongsTo('User');
	}
}