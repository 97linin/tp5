<?php
namespace app\admin\controller;
class Notice extends Base{
	public function index(){
		$notice=model('Notice');
		$data=$notice->getList();
		$this->assign('data',$data);
		return $this->fetch();
	}
	
	public function add(){
		return $this->fetch();
	}
	
	public function save(){
		if(request()->isAjax()){
			$post=input('post.');
			$notice=model('Notice');
			$res=$notice->add($post);
			if($res>0){
				return json(['code'=>0,'msg'=>'添加成功']);
				//$this->success('增加成功',url('category/index'));
			}else{
				return json(['code'=>1,'msg'=>'添加失败']);
				//$this->error('新增失败');
			}
		}
	}
}