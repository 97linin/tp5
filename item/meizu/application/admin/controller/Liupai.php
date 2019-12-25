<?php
namespace app\admin\controller;
class Liupai extends Base{
	public function index(){
		$liupai=model('Liupai');
		$data=$liupai->getList();
		$this->assign('data',$data);
		return $this->fetch();
	}
	

	public function edit($id=0){
		//id 获取网站栏目的对象
		$data=model('Liupai')->get($id);
		$this->assign('data',$data);
		return $this->fetch('edit1',[
		'test'=>'324234',
		]);
	}
	public function update(){
		//先要获取数据
		$data=input('post.');
		model('Liupai')->update([
		'title'=>$data['title'],
		'id'=>$data['id'],
		]);
		$this->success('修改成功，','liupai/index');
	}

	public function add(){
		return $this->fetch();
	}
	public function del($id){
		$Liupai=model('Liupai')->get($id);
		if(!is_null($Liupai)){
			$res=$Liupai->delete();
			if($res){
				$this->success('删除成功',url('Liupai/index'));
			}
			$this->error('删除失败',url('Liupai/index'));
		}
		$this->error('参数有误，删除失败',url('Liupai/index'));	
	}
	public function save(){
		if(request()->isAjax()){
			$post=input('post.');
			$liupai=model('Liupai');
			$res=$liupai->add($post);
			if($res>0){
				return json(['code'=>0,'msg'=>'添加成功']);
			}else{
				return json(['code'=>1,'msg'=>'添加失败']);
				//$this->error('新增失败');
			}
		}
	}
}