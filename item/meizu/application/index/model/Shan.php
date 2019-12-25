<?php
namespace app\index\model;

use think\Model;

class shan extends Model
{
	public function getList(){
		$where=[
			'state'=>0,
		];
		return $this->field('id,title,price')
		->where($where)
		->paginate(3);
	}
//	public function add($data){
//		return $this->save($data);
//	}
//	public function UpdateData($data){
//		$res=$this->where('id',$data['id'])->update($data);
//		if($res>=1){
//			return 0;//成功
//		}
//		return 1;
//	}
//	public function search($keywords){
//		$where=[
//			['word','like','%'.$keywords.'%'],
//			['state','=',0],
//		];
//		$result=$this->field('id,word,explanation')
//		->where($where)
//		->order('id desc')
//		->paginate(2,false,[
//			'query'=>array('keyword'=>$keywords),
//		]);
//		return $result;
//	}
}