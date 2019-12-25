<?php
namespace app\index\controller;

use think\Controller;

class Shan extends Controller
{
    public function index()
    {
    	$list=model('Shan')->getlist();    	
    	
        return $this->fetch();
    }
//	public function add(){
//		$this->assign('title','增加单词');
//		return $this->fetch();
//	}
//	public function save(){
//		if(request()->isPost()){
//			$post=input('post.');
//			if(!validate('Shan')->scene('add')->check($post)){
//				$this->error('数据有误，新增失败');
//			}
//			$res=model('Shan')->add($post);
//			if($res>0){
//				$this->success('新增成功',url('Shan/index'));
//			}else{
//				$this->error('新增失败');
//			}
//		}
//	}
//	public function del($id){
//		$Dictionary=model('Dictionary')->get($id);
//		if(!is_null($Dictionary)){
//			$res=$Dictionary->delete();
//			if($res){
//				$this->success('删除成功',url('Dictionary/index'));
//			}
//			$this->error('删除失败',url('Dictionary/index'));
//		}
//		$this->error('参数有误，删除失败',url('Dictionary/index'));	
//	}
//	public function edit($id=0){
//		$data=model('Dictionary')->get($id);
//		if(is_null($data)){
//			$this->error('参数有误',url('dictionary/index'));
//		}
//		return $this->fetch('',[
//			'data'=>$data,
//			'title'=>'更新数据',
//		]);
//	}
//	public function update(){
//		if(!request()->isPost()){
//			$this->error('非法提交');
//		}
//		$data=model('Dictionary')->where('id',input('post.id'))->find();
//		if(empty($data))return $this->error('暂无数据，请重新刷新页面');
//		$post=input('post.');
//		//验证数据
//		$validate=validate('Dictionary')->scene('edit')->check($post);
//		if(true!==$validate) return $this ->error($validate);
//		$res=model('Dictionary')->UpdateData($post);
//		if($res==0){
//			$this->success('更新成功',url('Dictionary/index'));
//		}
//		$this->error('更新失败');
//	}
//	public function detail(){
//		$id=input('param.id');
//		$data=model('Dictionary')->get($id);
//		return json($data);
//	}
//	public function search(){
//		$this->assign('title','搜索单词');
//		$keyword=input('param.keyword');
//		if($keyword){
//			$res=model('Dictionary')->search($keyword);
//			$this->assign([
//				'data'=>$res,
//				'keyword'=>$keyword
//			]);
//		}else{
//			$this->assign(array(
//				'data'=>null,
//				'keyword'=>''
//			));
//		}
//		return $this->fetch();
//	}
}