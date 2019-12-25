<?php
namespace app\admin\controller;
use think\Controller;
class Websitelink extends Base{
	public function index(){
		$data=model('WebsiteLink')->getList();
		return $this->fetch('',['data'=>$data]);
	}
	public function add(){
		
		return $this->fetch();
	}
	public function save(){
		if(request()->isAjax()){
			$post=input('param.');
			$web=model('WebsiteLink');
			$res=$web->add($post);
			if($res>0){ 
				return json(['code'=>0,'msg'=>'添加成功']);
			}else{
				return json(['code'=>1,'msg'=>'添加失败']);
			}
		}
	}
	
	public function ajaxupload(){
		$file=request()->file('file');
		if(empty($file)){
			return json(['code'=>1,'msg'=>'文件不能为空']);
		}
		$info=$file->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move('linkuploads');
		if($info){
			$fileP='linkuploads\\'.$info->getSaveName();
			$filePath=str_replace('\\','/',$fileP);
			return json(['code'=>0,'msg'=>$filePath]);
		}
		return json(['code'=>1,'msg'=>'上传失败']);
	}
}