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

    public function work()
    {
        return $this->fetch('index/work');
    }

    public function work_add()
    {
        dump($_POST);
    }
}
