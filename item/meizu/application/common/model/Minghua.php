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
		return $this->field('id,title,create_time,liupai_id,user_id,remark')
		->order('id','desc')
		->where($where)
		->paginate(2);
	}
	public function liupai(){
		return $this->belongsTo('Liupai');
	}
	public function user(){
		return $this->belongsTo('User');
	}
	public function getTop($num=6){
		$where=[
			'status'=>0,
		];
		return $this->field('id,title,create_time,clicks,cover_img,liupai_id,user_id,remark')
		->order('clicks','desc')
		->where($where)
		->limit($num)
		->select();
	}

	public function getNews($num=6){
		$where=[
			'status'=>0,
		];
		return $this->field('id,title,praise,describe,create_time,clicks,cover_img,liupai_id,user_id,remark')
		->order('id','desc')
		->where($where)
		->limit($num)
		->select();
	}


	public function getByLiupai($cateid=0,$num=6){
		$where=[
			'status'=>0,
			'liupai_id'=>$cateid,
		];
		return $this->field('id,title,praise,describe,create_time,clicks,cover_img,liupai_id,user_id,remark')
		->order('id','desc')
		->where($where)
		->paginate($num);
	}
}