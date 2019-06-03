<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
use think\Route;
//验证登录
Route::rule('/login/index','admin/login/index');
// 登录页面
Route::rule('/login/login','admin/login/login');
//注册页面
Route::rule('/login/sing','admin/login/sing');
// 注册写入
Route::rule('/login/sign','admin/login/sign');
//退出登录
Route::rule('/login/leaves','admin/login/leaves');

//首页
Route::rule('/index/index','admin/index/index');
//个人信息
Route::rule('/index/individual','admin/index/save');
//个人信息修改
Route::rule('/index/update','admin/index/update');
//工作经历
Route::rule('/index/work','admin/index/work');
//新增工作经历
Route::rule('/index/workadd','admin/index/work_add');