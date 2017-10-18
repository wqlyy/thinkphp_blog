<?php
namespace Admin\Controller;
use Think\Controller;
class AdmController extends Controller{
	function __construct(){
		parent::__construct();
		//判断是否登录
    	$this->aid = session("aid");
    	if($this->aid<1){
    		return $this->error('请登录','/Admin/Login');
    	}
    	$this->user = D('admin')->where(array('aid'=>$this->aid))->find();
    	if(!$this->user){
    		return $this->error('无效的账号','/Admin/Login');
    	};
	}
}

?>