<?php
namespace Admin\Controller;
class UserController extends AdmController {
    public function index(){
    	$admin = D('admin');
        $setting = D('setting');
        $cfg = $setting->getAll();
        $count = $admin->count();
        $Page = new \Think\Page($count,$cfg['pageNum']['value']);// 实例化分页类 传入总记录数和每页显示的记录数
        $users = $admin->order('aid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('show',$Page->show());// 赋值分页输出
    	
    	$this->assign("data",$users);
    	$this->display();
    }
    public function add(){
    	$aid = I('get.aid');
    	$admin = D('admin');
    	$user=array(
    		'aid'=>0,
    		'auser'=>'',
    		'apassword'=>'',
    	);
    	if($aid>0){
    		$user = $admin->where('aid=%d',$aid)->find();
    	}
    	$this->assign('user',$user);
    	$this->display();
    }

    public function delete(){
    	$aid=I('get.aid');
    	D('admin')->where(array('aid'=>$aid))->delete();
    	return $this->redirect('/Admin/User');
    }
    protected function _edit($aid){
    	$admin = D('admin');
    	if(IS_POST){
    		$username = I('post.username');
    		$password = I('post.password');
    		$rule = array(
    			array('username','require','用户名不能为空'),
    			array('password','require','密码不能为空'),
    		);
    		if($admin->validate($rule)->create()===false){
    			return $this->error($admin->getError(),"/Admin/User/add");
    		}
    		
    		$where = array();
    		$where['auser']=$username;
    		$where['aid']=array('NEQ',$aid);
    		$isArr = $admin->where($where)->find();
    		//用户唯一性
    		if($isArr){
    			return $this->error('用户名已经存在',"/Admin/User/add");
    		}
    		$insert=array(
    			'auser'=>$username,
    			'apassword'=>$password,
    		);
    		$is = $admin->where(array('aid'=>$aid))->save($insert);
    		if($is>0){
    			return $this->success("修改{$is}条数据","/Admin/User/index");
    		}else{
    			return $this->success("您没有修改数据","/Admin/User/index");
    		}
    	}
    }

    public function save(){
    	$aid = I('get.aid');
    	if($aid>0){
    		return $this->_edit($aid);
    	}

    	$admin = D('admin');
    	if(IS_POST){
    		$username = I('post.username');
    		$password = I('post.password');
    		$rule = array(
    			array('username','require','用户名不能为空'),
    			array('password','require','密码不能为空'),
    		);
    		// var_dump($admin->validate($rule)->create()===false);
    		if($admin->validate($rule)->create()===false){
    			return $this->error($admin->getError(),"/Admin/User/add");
    		}
    		
    		$where = array();
    		$where['auser']=$username;
    		$isArr = $admin->where($where)->find();
    		
    		if($isArr){
    			return $this->error('用户名已经存在',"/Admin/User/add");
    		}
    		$insert=array(
    			'auser'=>$username,
    			'apassword'=>$password,
    		);
    		$aid = $admin->add($insert);
    		if($aid){
    			return $this->success('操作成功',"/Admin/User/index");
    		}else{
    			return $this->error('操作失败',"/Admin/User/add");
    		}
    	}
    }
}