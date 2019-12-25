<?php
namespace app\index\model;
use think\Model;
class Notice extends Model
{
	
	public function add($data){
		return $this->save($data);
	}
	
}