<?php
namespace app\index\controller;

use think\Controller;
use app\common\service\MailService;
use think\facade\Env;
class Email extends Controller
{
    public function index()
    {
        $data=MailService::send('706826574@qq.com','test','这是测试');
        dump($data);
    }
    public function show(){
		$data=['navMenu'=>['首页','邮件','发送邮件']];
		$this->assign($data);
        return $this->fetch();
    }
    public function sendemail(){
        $data=input('post.');
        $email=$data['email'];
        $title=$data['title'];
        $content=$data['content'];
        $msg=MailService::send($email,$title,$content);
	    if($msg['code']==0){
		    $this->success($msg['msg'],'index/index');
	    }
        $this->error($msg['msg']);
    }
	public function user(){
		$list=model('User')->getlist();
		$this->assign('data',$list);
		$this->assign('title','用户列表');   	
		return $this->fetch();
	}
	public function sendajax(){
	    $data=input('post.');
	    $email=$data['email'];
	    $title=$data['title'];
	    $content=$data['content'];
	    $msg=MailService::send($email,$title,$content);
	    return json($msg);
	}
	public function attach(){
	    return $this->fetch();
	}
	public function sendemailattach(){
	    $data=input('post.');
	    $email=$data['email'];
	    $title=$data['title'];
	    $content=$data['content'];
		$files=request()->file('file');
		foreach($files as $file){
			$info=$file->move('uploads');
			$data[]=str_replace('\\','/',Env::get('root_path').'public\\uploads\\'.$info->getSaveName());
		}
	    $msg=MailService::sendMail($email,$title,$content,$data);
	    if($msg['code']==0){
	        $this->success($msg['msg'],'index/index');
	    }
	    $this->error($msg['msg']);
	}
} 