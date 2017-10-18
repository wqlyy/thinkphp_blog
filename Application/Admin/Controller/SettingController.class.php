<?php
namespace Admin\Controller;
class SettingController extends AdmController {
    public function index(){
    	$setting = D('Setting');
    	// $setting->getAll();
    	// exit;
    	$this->assign('setting',$setting->getAll());
    	$this->display();
    }
    public function save(){
    	$post = I('post.');
    	$setting = D('Setting');
    	// var_dump($setting);
    	foreach ($post as $key => $val) {
    		$setting->where(array('keys'=>$key))->save(array('val'=>$val));
    	}
    	$this->redirect("/Admin/Setting/index");
    }
}