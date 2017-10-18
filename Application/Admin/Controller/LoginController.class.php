<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
 	/**
     * 后台登录
     * @return [type] [description]
     */
    public function index(){

        if(session("aid")>1){
            return $this->success('登录成功','/Admin/Index');
        }
    	$do = I('get.do');
    	if($do==='check'){
    		$username = I('post.username');
    		$password = I('post.password');
    		$admin = D('admin');
    		$where = array(
    			'auser'=>$username,
    			'apassword'=>$password,
    		);
    		$user = $admin->where($where)->find();
    		if(!$user){
    			return $this->error('账号密码错误','/Admin/Login');
    		}
    		session("aid",$user['aid']);
    		return $this->success('登录成功','/Admin/Index/index');
    	}
    	$this->display();
    }
    public function logout(){
        session('aid',null);
        return $this->success('退出成功',"/Admin/Login");
    }
}
?>