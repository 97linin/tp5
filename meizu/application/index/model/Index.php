<?php
namespace app\index\model;

use think\Model;

class Index extends Model
{
	
	public function search($keywords){
		$where=[
			['title','like','%'.$keywords.'%'],
			['content','like','%'.$keywords.'%'],
			['state','=',0],
		];
		$result=$this->field('id,title,content,')
		->where($where)
		->order('id desc')
		->paginate(2,false,[
			'query'=>array('keyword'=>$keywords),
		]);
		return $result;
	}
}