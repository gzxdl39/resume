<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class common extends Controller
{
    public function _initialize(){
        //判断用户是否已经登录
        if (empty(session('resumename'))) {
            $this->error('未登录',url('/login/login'));
        }
    }
}
