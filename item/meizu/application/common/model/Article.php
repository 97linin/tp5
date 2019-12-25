<?php
namespace app\common\model;
use think\Model;
class Article extends Model
{
    public function add($data){
        return $this->save($data);
    }
    public function getList(){
        $where=[
            'status'=>0,
        ];
        return $this->field('id,title,create_time,category_id,user_id')
        ->order('id','desc')
        ->where($where)
        ->paginate(2);
    }
    public function category()
    {
        return $this->belongsTo('Category');
    }
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function getTop($num=7){
        $where=[
            'status'=>0,
        ];
        return $this->field('id,title,cover_img,create_time,clicks,category_id,user_id,price')
        ->order('clicks','desc')
        ->where($where)
        ->limit($num)
        ->select();
    }
    public function getNews($num=7){
        $where=[
            'status'=>0,
        ];
        return $this->field('id,title,describe,cover_img,create_time,clicks,praise,category_id,user_id,price')
        ->order('id','desc')
        ->where($where)
        ->limit($num)
        ->select();
    }
    public function getByCategory($cateid=0,$num=7){
        $where=[
            'status'=>0,
            'category_id'=>$cateid,
        ];
        return $this->field('id,title,describe,cover_img,create_time,clicks,praise,category_id,user_id,price')
        ->order('id','desc')
        ->where($where)
        ->paginate($num);
    }
}