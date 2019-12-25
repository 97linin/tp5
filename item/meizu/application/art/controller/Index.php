<?php
namespace app\art\controller;
//use think\Controller;
class Index extends Base{
	public function index(){
	   $newsarticles=model('Article')->getNews(5);
	   $this->assign([
	   		'cate'=>'',
	   		'newsarticles'=>$newsarticles,
	   ]);
	   return $this->fetch();
	}
	public function clear(){
	   
	   return $this->fetch();
	}
	public function admin(){
	   
	   return $this->fetch();
	}
	public function login(){
	   
	   return $this->fetch();
	}
	public function register(){
	   
	   return $this->fetch();
	}
	
	public function painting($id=0){
	   $liupainame=model('Liupai')->where('id',$id)->value('title');
	   $nav=['艺术流派',$liupainame];
	   $minghuas=model('Minghua')->getByLiupai($id,2);
	   $this->assign([
	   	'cate_articles'=>$minghuas,
		'nav'=>$nav,
		'cate'=>$liupainame,
	   ]);
	   return $this->fetch();
	}
	public function getList(){
		$where=[
			'state'=>0,
		];
		return $this->field('id,username,nickname,email,phone,create_time,password')
		->where($where)
		->paginate(2);
	}
	public function detail($id=0){
		$minghua=model('Minghua')->get($id);
		$nav=[];
		$liupainame='';
		if(!is_null($minghua)){
			$liupainame=$minghua['liupai']['title'];
			$nav=['艺术流派',$liupainame,'名画详情'];
		}
		//更新点击率
		model('Minghua')->where('id',$id)->update(['clicks'=>['inc',1]]);
		$this->assign([
			'minghua'=>$minghua,
			'nav'=>$nav,
			'cate'=>$liupainame,
		]);
	    return $this->fetch();
	}
	public function search($keywords){
		$where=[
			['title','like','%'.$keywords.'%'],
			['state','=',0],
		];
		$result=$this->field('id,title,remark')
		->where($where)
		->order('id desc')
		->paginate(2,false,[
			'query'=>array('keyword'=>$keywords),
		]);
		return $result;
	}
	public function update(){
       $post=input('post');
       $username=input('user.username');
       $password=input('user.password');
       $password1=input('user.password1');
      model('user')->where('username',$username)->update(['password'=>$password1]);
      $this->success('密码修改成功',url('art/index/login'));
    }
    
}