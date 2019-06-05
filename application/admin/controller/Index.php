<?php
namespace app\admin\controller;
use app\admin\model\UserType;
use think\Controller;
use org\Verify;
use think\Db;
use think\Cookie;
use think\Request;
use think\Session;
use app\admin\controller\common;

class Index extends Common
{
	//首页显示
    public function index()
    {
    	return $this->fetch('index/index');
    }
    //个人信息
    public function save()
    {
        $res = Db::name('admin')->find();
        $this->assign('res',$res);
        return $this->fetch('index/individual');
    }
    // 个人信息修改
    public function update(Request $request)
    {   
        $file = request()->file('head');
        $data = $_POST;
        if(isset($file)){
            // 判断密码是否等于32位
            if(strlen($_POST['password']) == '32'){
                $file = request()->file('head');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg 
                    $data['head'] = strstr($info->getpathname(),'\uploads');
                    $res = Db::name('admin')->where('id',$data['id'])->update($data);
                    if($res){
                        return $this->success('修改成功','/index/individual');
                    }else{
                        return $this->error('修改失败','/index/individual');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                // 密码不等于32位，进行加密
                $pwd = MD5($_POST['password']);
                $data['password'] = $pwd;
                $file = request()->file('head');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg 
                    $data['head'] = strstr($info->getpathname(),'\uploads');
                    $res = Db::name('admin')->where('id',$data['id'])->update($data);
                    if($res){
                        return $this->success('修改成功','/index/individual');
                    }else{
                        return $this->error('修改失败','/index/individual');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }
        }else{
            // 判断密码是否等于32位
            if(strlen($_POST['password']) == '32'){
                $res = Db::name('admin')->where('id',$data['id'])->update($data);
                if($res){
                    return $this->success('修改成功','/index/individual');
                }else{
                    return $this->error('修改失败','/index/individual');
                }
            }else{
                // 密码不等于32位，进行加密
                $pwd = MD5($_POST['password']);
                $data['password'] = $pwd;
                $res = Db::name('admin')->where('id',$data['id'])->update($data);
                if($res){
                    return $this->success('修改成功','/index/individual');
                }else{
                    return $this->error('修改失败','/index/individual');
                }
            }
        }
    }
    // 工作经历
    public function work()
    {
        $skills = Db::name('skills')->select();
        $work = Db::name('work')->select();
        $project = Db::name('project')->select();
        if($skills || $work || $project){
            $this->assign('skills',$skills);
            $this->assign('work',$work);
            $this->assign('project',$project);
            return $this->fetch('index/work');
        }else{
            return $this->error('系统发生错误，请联系维护人员','/index/index');
        }
    }
    // 个人技能
    public function skills()
    {
        return $this->fetch('index/skills');
    }
    // 就职公司
    public function workname()
    {
        return $this->fetch('index/workname');
    }
    // 项目经历
    public function project()
    {
        return $this->fetch('index/project');
    }
    // 个人技能添加
    public function skills_add()
    {
        $res = Db::name('skills')->insert($_POST);
        if($res){
            return $this->success('添加成功','/index/work');
        }else{
            return $this->error('添加失败','index/skills');
        }
    }
    // 就职公司添加
    public function workname_add()
    {
        $res = Db::name('work')->insert($_POST);
        if($res){
            return $this->success('添加成功','/index/work');
        }else{
            return $this->error('添加失败','index/workname');
        }
    }
    // 项目经历添加
    public function project_add()
    {
        $res = Db::name('project')->insert($_POST);
        if($res){
            return $this->success('添加成功','/index/work');
        }else{
            return $this->error('添加失败','index/project');
        }
    }
    //个人技能修改页
    public function skills_edit($sid)
    {
        $res = Db::name('skills')->where('sid',$sid)->find();
        $this->assign('res',$res);
        return $this->fetch('index/skillsedit');
    }
    // 个人公司名称修改页
    public function workname_edit($wid)
    {
        $res = Db::name('work')->where('wid',$wid)->find();
        $this->assign('res',$res);
        return $this->fetch('index/worknameedit');
    }
    // 个人项目修改页
    public function project_edit($pid)
    {
        $res = Db::name('project')->where('pid',$pid)->find();
        $this->assign('res',$res);
        return $this->fetch('index/projectedit');
    }
    //个人技能修改操作
    public function skills_up($sid)
    {
        $res = Db::name('skills')->where('sid',$sid)->update($_POST);
        if($res){
            return $this->success('修改成功','/index/work');
        }else{
            return $this->error('修改失败','/index/work');
        }
    }
    // 个人公司名称修改操作
    public function work_up($wid)
    {
        $res = Db::name('skills')->where('wid',$wid)->update($_POST);
        if($res){
            return $this->success('修改成功','/index/work');
        }else{
            $this->assign('res',$res);
            return $this->error('修改失败','/index/work');
        }
    }
    // 个人项目修改操作
    public function project_up($pid)
    {
        $res = Db::name('skills')->where('pid',$pid)->update($_POST);
        if($res){
            return $this->success('修改成功','/index/work');
        }else{
            return $this->error('修改失败','/index/work');
        }
    }
    // 个人技能删除
    public function skills_delete(){
        $res = Db::name('skills')->where('sid',$_POST['sid'])->delete();
        if($res){
            return '1';
        }else{
            return '0';
        }
    }
    // 就职公司删除
    public function work_delete(){
        $res = Db::name('work')->where('wid',$_POST['wid'])->delete();
        if($res){
            return '1';
        }else{
            return '0';
        }
    }
    // 项目经历删除
    public function project_delete(){
        $res = Db::name('project')->where('pid',$_POST['pid'])->delete();
        if($res){
            return '1';
        }else{
            return '0';
        }
    }
}
