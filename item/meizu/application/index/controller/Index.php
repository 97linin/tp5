<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index(){
	   return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
    public function show(){
        return $this->fetch();
    }
	public function search(){
		$this->assign('title','搜索公告');
		$keyword=input('param.keyword');
		if($keyword){
			$res=model('Index')->search($keyword);
			$this->assign([
				'data'=>$res,
				'keyword'=>$keyword
			]);
		}else{
			$this->assign(array(
				'data'=>null,
				'keyword'=>''
			));
		}
		return $this->fetch();
	}
}
