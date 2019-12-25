<?php
namespace app\admin\controller;
class Category extends Base{
	public function index(){
		$category=model('Category');
		$data=$category->getList();
		$this->assign('data',$data);
		return $this->fetch();
	}


	public function edit($id=0){
		//id 获取网站栏目的对象
		$data=model('Category')->get($id);
		$this->assign('data',$data);
		return $this->fetch('edit1',[
		'test'=>'324234',
		]);
	}
	public function update(){
		//先要获取数据
		$data=input('post.');
		model('Category')->update([
		'title'=>$data['title'],
		'id'=>$data['id'],
		]);
		$this->success('修改成功，','category/index');
	}
	
	public function add(){
		return $this->fetch();
	}
	public function del($id){
		$Category=model('Category')->get($id);
		if(!is_null($Category)){
			$res=$Category->delete();
			if($res){
				$this->success('删除成功',url('Category/index'));
			}
			$this->error('删除失败',url('Category/index'));
		}
		$this->error('参数有误，删除失败',url('Category/index'));	
	}
	public function save(){
		if(request()->isAjax()){
			$post=input('post.');
			$category=model('Category');
			$res=$category->add($post);
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