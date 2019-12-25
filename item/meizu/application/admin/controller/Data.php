<?php
namespace app\admin\controller;
use think\Controller;
use \tp5er\Backup;
class Data extends Base{
	public function index(){
		$config=array(
			'path'=>'./Data/',
			'part'=>20971520,
			'compress'=>0,
			'level'=>9
		);
		$nav=['navMenu'=>['数据库管理']];
		$this->assign($nav);
		
		$db=new Backup($config);
		
		$type=input('action');
		switch($type){
			case "backup":
				$tables=$db->dataList();
				foreach($tables as $k=>$v){
					$db->backup($v['name'],0);
				}
				$file=$db->getFile();
				$this->success('备份成功,文件名为'.$file['filename'],'admin/data/index');
				break;
			case "download":
				$time=input('time');
				$db->downloadFile($time);
				break;
			case "restore":
				$time=input('time');
				$db->import1(0,$time);
				$this->success("还原成功",'admin/data/index');
				break;
			case "del":
				$time=input('time');
				$db->delFile($time);
				$this->success("删除成功",'admin/data/index');
				break;
			default:
				return $this->fetch("data/index",["list"=>$db->fileList()]);
		};
		
	}
}