<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
	public function index(){
		return $this->fetch('admin/index');
	}
	public function login(){
		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$dict = db('user');
		$list = $dict->where("english",$name)->find();
		if($list['pass'] == $pass){
			 $this->success('登录成功', 'index/home');
		}else{
			$this->error('登录失败');
		}
	}
	public function home(){
		return $this->fetch('admin/home');
	}
}