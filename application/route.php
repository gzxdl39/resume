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

// 工作经历
//个人技能
Route::rule('/index/skills','admin/index/skills');
//就职公司
Route::rule('/index/workname','admin/index/workname');
//项目经历
Route::rule('/index/project','admin/index/project');
//个人技能添加
Route::rule('/index/skillsadd','admin/index/skills_add');
//就职公司添加
Route::rule('/index/worknameadd','admin/index/workname_add');
//项目经历添加
Route::rule('/index/projectadd','admin/index/project_add');

// 修改
//个人技能修改页
Route::rule('/index/skillsedit','admin/index/skills_edit');
//就职公司修改页
Route::rule('/index/worknameedit','admin/index/workname_edit');
//项目经历修改页
Route::rule('/index/projectedit','admin/index/project_edit');
//个人技能执行修改
Route::rule('/index/skillsup','admin/index/skills_up');
//就职公司执行修改
Route::rule('/index/workup','admin/index/work_up');
//项目经历执行修改
Route::rule('/index/projectup','admin/index/project_up');

// 删除
//个人技能删除
Route::rule('/index/skillsde','admin/index/skills_delete');
//项目经历删除
Route::rule('/index/projectde','admin/index/project_delete');
//就职公司删除
Route::rule('/index/workde','admin/index/work_delete');

Route::rule('/','home/index/index');