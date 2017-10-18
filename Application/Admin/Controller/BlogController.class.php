<?php
namespace Admin\Controller;
class BlogController extends AdmController {
    public function index(){
        $setting = D('setting');
        $cfg = $setting->getAll();
        
    	$pageModel = D('page');
    	$count = $pageModel->count();
    	$Page = new \Think\Page($count,$cfg['pageNum']['value']);// 实例化分页类 传入总记录数和每页显示的记录数
    	$blogs = $pageModel->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('show',$Page->show());// 赋值分页输出
    	$this->assign('blogs',$blogs);
    	$this->display();
    }
    public function add(){
    	$pid = I('get.pid');
    	$pageModel = D('page');
    	$blogs=array(
    		'pid'=>0,
    		'title'=>'',
    		'content'=>'',
    	);
    	if($pid>0){
    		$blogs = $pageModel->where('pid=%d',$pid)->find();
    	}
    	$this->assign('blogs',$blogs);
    	$this->display();
    }
    public function save(){
    	
    	$pageModel = D('page');
    	if(IS_POST){
    		$title=I('post.title');
    		$content=I('post.content');
    		$author = I('post.author');
    		$rule = array(
    			array("title","require","标题不能为空"),
    			array("content","require","内容不能为空"),
    		);
    		if($pageModel->validate($rule)->create()===false){
    			return $this->error($pageModel->getError(),"/Admin/Blog/add");
    		}
    		$insert=array(
    			'title'=>$title,
    			'content'=>$content,
    			'author'=>$author,
    		);
    		$pid = I('get.pid');
	    	if($pid>0){//编辑
	    		$insert['uptime']=time();
	    		$pageModel->where(array('pid'=>$pid))->save($insert);
	    	}else{
	    		$insert['uptime']=time();
	    		$insert['intime']=time();
	    		$pageModel->add($insert);
	    	}
    		return $this->success("操作成功","/Admin/Blog/index");
    	}
    }
    public function delete(){
    	$pid=I('get.pid');
    	D('page')->where(array('pid'=>$pid))->delete();
    	return $this->redirect('/Admin/Blog');
    }
    //上传文件
    public function upload(){
    	$result = array();
    	$result['msg']='';
    	$result['success']=false;
    	$result['file_path']='';
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
	    $upload->savePath  =     ''; // 设置附件上传（子）目录
	    // 上传文件 
	    $info = $upload->uploadOne($_FILES['file1']);
	    if(!$info) {// 上传错误提示错误信息
	        $result['msg']=$upload->getError();

	    }else{// 上传成功
	        // $this->success('上传成功！');
	        $url = '/Uploads/'.$info['savepath'].$info['savename'];
	        $result['success']=true;
	        $result['file_path']=$url;
	    }
	    $this->ajaxReturn($result);
	}
}