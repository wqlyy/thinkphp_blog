<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	function __construct(){
		parent::__construct();
		$this->setting = D("Admin/Setting");
		// var_dump($this->setting);
		$this->cfg = $this->setting->getAll();
	}
    public function index(){
    	$pageModel = D('page');
    	$count = $pageModel->count();
    	$Page = new \Think\Page($count,$this->cfg['pageNum']['value']);// 实例化分页类 传入总记录数和每页显示的记录数
    	$blogs = $pageModel->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('show',$Page->show());// 赋值分页输出
    	$this->assign('blogs',$blogs);
        $this->assign('cfg',$this->cfg);
        $this->display();
    }
    public function read(){
    	$pid=I('get.pid');
 		$pageModel = D('page');
    	$blog = $pageModel->where( array('pid'=>$pid) )->find();
    	$this->assign('blog',$blog);
        $this->assign('cfg',$this->cfg);
        $this->display();
    }
}