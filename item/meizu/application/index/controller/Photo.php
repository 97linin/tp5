<?php
namespace app\index\controller;
use think\Controller;
use Env;
class Photo extends Controller
{
    public function index(){
	   $data=['navMenu'=>['首页','图片','直接上传']];
	   $this->assign($data);
	   return $this->fetch();
    }
	public function upload(){
		$file=request()->file('file');
		if(empty($file)){
			$this->error('请选择文件');
		}
		$info=$file->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move('uploads');
		if($info){
			$fileP='uploads\\'.$info->getSaveName();
			$filePath=str_replace('\\','/',$fileP);
			$user=session('user');
			if(!empty($user)){
				model('user')->where('id',$user['id'])->update(['heading'=>$filePath,]);
			}
			$this->success('头像上传成功','index/index');
		}
		$this->error('图片上传失败');
	}
	public function ajax(){
	   $data=['navMenu'=>['首页','图片','无刷上传']];
	   $this->assign($data);
	   return $this->fetch();
	}
	public function ajaxupload(){
		$file=request()->file('file');
		if(empty($file)){
			return json(['code'=>1,'msg'=>'文件不能为空']);
		}
		$info=$file->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move('uploads');
		if($info){
			$fileP='uploads\\'.$info->getSaveName();
			$filePath=str_replace('\\','/',$fileP);
			return json(['code'=>0,'msg'=>$filePath]);
		}
		return json(['code'=>1,'msg'=>'上传失败']);
	}
	public function ajaxupload1(){
		$psid=input("param.psid");
		$file=request()->file('file');
		if(empty($file)){
			return json(['code'=>1,'msg'=>'文件不能为空']);
		}
		$info=$file->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move('uploads/'.$psid);
		if($info){
			$fileP='uploads\\'.$info->getSaveName();
			$filePath=str_replace('\\','/',$fileP);
			return json(['code'=>0,'msg'=>$filePath]);
		}
		return json(['code'=>1,'msg'=>'上传失败']);
	}
	public function Webuploader(){
		$data=['navMenu'=>['首页','图片','多图上传']];
		$this->assign($data);
		return $this->fetch();
	}
	public function cropper(){
		$data=['navMenu'=>['首页','图片','裁剪上传']];
		$this->assign($data);
		return $this->fetch();
	}
	public function add(){
		$data=['navMenu'=>['首页','图片','相册']];
		$this->assign($data);
		$ps=config('photo.');
		return $this->fetch('',['data'=>$ps]);
	}
	public function show($psname=''){
		$data=['navMenu'=>['首页','图片','相册展示']];
		$this->assign($data);
		$ps=config('photo.');
		$ps1=$this->getphoto($psname);
		$this->assign('ps',$ps1);
		return $this->fetch('',['data'=>$ps]);
	}
	public function getphoto($psname=''){
		$f=Env::get('root_path');
		$path=$f.'public\\uploads\\'.$psname;
		$filename=[];
		if(is_dir($path)){
			$lists=$this->getFiles($path,$filename);
		}
		return $filename;
		die;
	}
	public function getFiles($path,&$filename){
		$resource=opendir($path);
		while($rows=readdir($resource)){
			if(is_dir($path.'/'.$rows) && $rows!="." && $rows!=".."){
				$this->getFiles($path.'/'.$rows,$filename);
			}else if($rows!="."&&$rows!=".."){
				$f=Env::get('root_path');
				$p=$f.'public\\uploads\\';
				$filename[]=str_replace($p,"",$path.'/'.$rows);
			}
		}
	}
}
