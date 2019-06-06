<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Cookie;
use think\Request;
use think\Session;
use org\Verify;

class Index extends Controller
{
    public function index()
    {
        $skills = Db::name('skills')->select();
        $work = Db::name('work')->select();
        $project = Db::name('project')->select();
        $admin = Db::name('admin')->select();
        if($skills || $work || $project || $admin){
        	$this->assign('skills',$skills);
        	$this->assign('work',$work);
        	$this->assign('project',$project);
        	$this->assign('admin',$admin);
        	return $this->fetch('index');
        }else{
        	$this->assign('error','非常抱歉，由于其他原因导致该页面未能打开');
        	return $this->fetch('error/error');
        }
    }

}
