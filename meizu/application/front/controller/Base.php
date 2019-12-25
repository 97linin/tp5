<?php
namespace app\front\controller;
use think\Controller;
class Base extends Controller
{
   protected function initialize()
   {
       $categorys=model('Category')->getTop(6);
       $articles=model('Article')->getTop(6);
       $this->assign([
           'categorys'=>$categorys,
           'hotarticles'=>$articles
        ]);
   }
}
