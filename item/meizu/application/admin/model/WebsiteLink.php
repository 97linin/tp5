<?php
namespace app\common\model;
use think\Model;
class WebsiteLink extends Model{	
	public function add($data){
		return $this->save($data);
	}
	public function getList(){
		$where=[
			'status'=>0,
		];
		return $this->field('id,website_name,website_logo,href')
		->where($where)
		->paginate(3);
	}
	
}