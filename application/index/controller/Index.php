<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index/index');
    }
   	public function write(){
   		$dict = db('content');
   		$list = $dict->limit(10)->order('time desc')->select();
   		$this->assign('list',$list);
   		return $this->fetch('index/write');
   	}
   	public function insert(){
   		$con = $_POST['con'];
   		$tit = $_POST['tit'];
   		$dict = db('content');
   		$data['title'] = $tit;
   		$data['content'] = $con;
   		$data['time'] = date('Y/m/d H:i:s');
   		$dict->insert($data);
   	}
    public function aboutme(){
      return $this->fetch('index/me');
    }
    public function diary(){
      $dict = db('class');
      $list = $dict->where('type',1)->field('name,id')->select();
      $this->assign('list',$list);
      return $this->fetch('index/diary');
    }
    public function rote(){
      $id = input('id');
      $list = db('content')->where("id",$id)->select();
      $this->assign('list',$list[0]);
      return $this->fetch('index/roteinfo');
    }
    public function note(){
      $dict = db('class');
      $list = $dict->where('type',2)->field('name,id')->select();
      $this->assign('list',$list);
      return $this->fetch('index/diary');
    }
    public function getin(){
      $dict = db('class');
      $type['sb'] = $dict->where('type',1)->select();
      $type['bj'] = $dict->where('type',2)->select();
      $this->assign('type',$type);
      return $this->fetch('index/getin');
    }
    public function getto(){
      $dict = db('class');
      $type['sb'] = $dict->where('type',1)->select();
      $type['bj'] = $dict->where('type',2)->select();
      $this->assign('type',$type);
      return $this->fetch('index/getto');
    }
    public function inserS(){
      $con = $_POST['con'];
      $tit = $_POST['tit'];
      $id = $_POST['id'];
      $dict = db('content');
      $data['title'] = $tit;
      $data['content'] = $con;
      $data['pid'] = $id;
      $data['time'] = date('Y/m/d H:i:s');
      if($dict->insert($data)){
        return 1;
      };
    }
    public function findTit(){
      $id['pid'] = $_POST['id'];
      $list = db('content')->where($id)->select();
      return $list;
    }
}