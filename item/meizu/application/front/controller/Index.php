<?php
namespace app\front\controller;
//use think\Controller;
class Index extends Base
{
    public function index()
    {
        $notices=model('Notice')->getTop(5);
        $newsarticles=model('Article')->getNews(5);
        $this->assign([
            'notices'=>$notices,
            'cate'   =>'',
            'newsarticles'=>$newsarticles,
         ]);
        return $this->fetch();
    }
    public function list($id=0)
    {
        $categoryname=model('Category')->where('id',$id)->value('title');
        $nav=['meizu分类',$categoryname];
        $article=model('Article')->getByCategory($id,2);
        $this->assign([
            'cate_articles'=>$article,
            'nav'          =>$nav,
            'cate'         =>$categoryname,
         ]);
        return $this->fetch();
    }
    public function detail($id=0)
    {
        $article=model('Article')->get($id);
        //dump($article['category']['title']);
        $nav=[];
        $categoryname='';
        if(!is_null($article)){
            $categoryname=$article['category']['title'];
            $nav=['meizu',$categoryname,'详情'];
        }
        $this->assign([
            'article'=>$article,
            'nav'    =>$nav,
            'cate'   =>$categoryname,
         ]);
        return $this->fetch();
    }
    public function notice($id=0)
    {
        $notice=model('Notice')->get($id);
        return json($notice);
    }
}
