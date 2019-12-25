<?php
namespace app\api\controller;
use think\Controller;
class Category extends Controller{
	public function top(){
		$categorys=model('Category')->getTop(5);
		return json($categorys);
	}
}