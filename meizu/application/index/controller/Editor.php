<?php
namespace app\index\controller;
use think\Controller;
class Editor extends Controller{
	public function index(){
		$data=['navMenu'=>['首页','富文本框基本用法']];
		$this->assign($data);
		return $this->fetch();
	}
	public function save(){
		if(request()->isPost()){
			$post=input('post.');
			
			$res=model('Notice')->add($post);
			if($res>0){
				$this->success('新增成功',url('index/index'));
			}else{
				$this->error('新增失败');
			}
		}
	}
}