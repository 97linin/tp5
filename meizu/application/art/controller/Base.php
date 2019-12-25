<?php
namespace app\art\controller;
use think\Controller;
class Base extends Controller{
	protected function initialize(){
		$categorys=model('Category')->getTop(5);
		$articles=model('Article')->getTop(5);
		$liupais=model('Liupai')->getTop(5);
		$minghuas=model('Minghua')->getTop(5);
		$this->assign([
			'categorys'=>$categorys,
			'liupais'=>$liupais,
			'hotarticles'=>$articles,
		]);
	}
}
    
