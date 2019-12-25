<?php
namespace app\index\controller;
use app\common\service\ExcelService;
use Env;
use think\Controller;

class Excel extends Controller
{
    public function index()
    {	
		$data=['navMenu'=>['首页','忘记密码']];
		$this->assign($data);
		return $this->fetch();
	}
	public function test(){
		$file=request()->file('file');
		$info=$file->validate(['size'=>1048576,'ext'=>'xls,xlsx'])->move('./uploads');
		if($info){
			$fileName=$info->getSaveName();
			$filePath=Env::get('root_path')
			.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$fileName;
		}
		$data=ExcelService::upload($filePath);
		unset($info);
		unlink($filePath);
		var_dump($data);
	}
	public function user(){
		$data=['navMenu'=>['首页','批量导入用户']];
		$this->assign($data);
		return $this->fetch();
	}
	public function adduser(){
		$file=request()->file('file');
		$info=$file->validate(['size'=>1048576,'ext'=>'xls,xlsx'])->move('./uploads');
		if($info){
			$fileName=$info->getSaveName();
			$filePath=Env::get('root_path')
			.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$fileName;
		}
		$data=ExcelService::upload($filePath);
		unset($info);
		unlink($filePath);
		
		//批量增加数据到数据库
		//dump($data);
		foreach ($data as $k=>$v){
			$arr['username']=$v[0];
			$arr['password']=$v[1];
			$arr['phone']=$v[2];
			$arr['email']=$v[3];
			$dataall[]=$arr;
		}
		$res=model('user')->insertAll($dataall);
		if($res){
			$this->success("成功",'index/index');
		}else{
			$this->error("失败");
		}
	}
	public function down(){
		$list=model('user')->select()->toArray();
		$header=array(
			array('id','用户名','密码','昵称')
		);
		$data=array_merge($header,$list);
		ExcelService::createXls($data);
	}
}