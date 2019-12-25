<?php
namespace app\admin\controller;
use think\Controller;
class Article extends Base{
	public function index(){
		$data=model('Article')->getList();
		return $this->fetch('',['data'=>$data]);
	}
	public function add(){
		$category=model('Category');
		$data=$category->getList();
		$this->assign('data',$data);
		return $this->fetch();
	}

	public function edit($id=0){
		//id 获取网站栏目的对象
		$data=model('Article')->get($id);
		$this->assign('data',$data);
		return $this->fetch('edit1',[
		'test'=>'324234',
		]);
	}
	public function update(){
		//先要获取数据
		$data=input('post.');
		model('Article')->update([
		'title'=>$data['title'],
		'content'=>$data['content'],
		'remark'=>$data['remark'],
		'id'=>$data['id'],
		]);
		$this->success('修改成功，','article/index');
	}


	public function save(){
		if(request()->isAjax()){
			$post=input('param.');
			$post['user_id']=session('user')['id'];
			$article=model("Article");
			$res=$article->add($post);
			if($res>0){ 
				return json(['code'=>0,'msg'=>'添加成功']);
				//$this->success('添加成功',url('article/index'));
			}else{
				return json(['code'=>0,'msg'=>'添加失败']);

				//$this->error('新增失败');
			}
		}
	}
	public function show(){
		$id=input('param.id');
		$article=model('Article');
		$res=$article->get($id);
		$this->assign('data',$res);
		return $this->fetch();
	}
	public function del($id){
		$Article=model('Article')->get($id);
		if(!is_null($Article)){
			$res=$Article->delete();
			if($res){
				$this->success('删除成功',url('Article/index'));
			}
			$this->error('删除失败',url('Article/index'));
		}
		$this->error('参数有误，删除失败',url('Article/index'));	
	}
	public function ajaxupload(){
		$file=request()->file('file');
		if(empty($file)){
			return json(['code'=>1,'msg'=>'文件不能为空']);
		}
		$info=$file->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move('articleuploads');
		if($info){
			$fileP='articleuploads\\'.$info->getSaveName();
			$filePath=str_replace('\\','/',$fileP);
			return json(['code'=>0,'msg'=>$filePath]);
		}
		return json(['code'=>1,'msg'=>'上传失败']);
	}
}