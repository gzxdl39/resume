<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Cookie;
use think\Session;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */

    //登录验证
    public function index()
    {
        if(isset($_POST['username']) || isset($_POST['pwd'])){
            $user = Db::name('admin')->where('name',$_POST['username'])->find();
            if($user){
                $pwd = MD5($_POST['pwd']);
                $password = $user['password'];
                if ($pwd === $password){
                    session::set('resumename',$user['name']);//session写入
                    return $this->fetch('index/index');
                }else{
                    $error = "请重新确认账号或密码";
                    $this->assign('error',$error);
                    return $this->fetch('login/login');
                }
            }else{
                $error = "请重新确认账号或密码";
                $this->assign('error',$error);
                return $this->fetch('login/login');
            }
        }else{
            return $this->fetch('login/login');
        }  
    }
    // 登录页面
    public function login()
    {
        return $this->fetch('login/login');
    }
    // 注册页面
    public function sing()
    {
        return $this->fetch('login/sing');
    }

    // 注册执行
    public function sign()
    {
        if(isset($_POST['username']) || isset($_POST['pwd'])){
            $user = Db::name('admin')->where('name',$_POST['username'])->select();
            if($user){
                $error = "用户名已存在";
                $this->assign('error',$error);
                return $this->fetch('login/sing');
            }else{
                $name = $_POST['username'];
                $pwd = MD5($_POST['pwd']);
                $data = [
                    'name' => $name,
                    'password' => $pwd,
                ];
                $res = Db::name('admin')->insert($data);
                if($res){
                    return $this->fetch('login/login');
                }else{
                    $error = "注册失败，请重新注册";
                    $this->assign('error',$error);
                    return $this->fetch('login/sing');
                }
            }    
        }else{
            return $this->fetch('login/login');
        }
    }

    // 退出登录
    public function leaves()
    {
        Session::delete('resumename');
        // session('resumename',null);
        return $this->fetch('login/login');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
