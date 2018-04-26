<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
    	return $this->fetch();
    }
    
    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function login()
    {
    	$user = model('User');
    	$request=Request();
    	if($request->method()=='POST') {
    		//数据获取
    		$data=array(
    			'username'=>$request->param('username'),
    			'password'=>md5($request->param('password')),
    		);
    	 
    		$result=$user->validLogin($data);
    
    		if($result) {
				return json_encode(['code'=>1,'msg'=>'登录成功！','url'=>url('/admin/Index/index/')]);
    		} else {
				return json_encode(['code'=>-1,'msg'=>'登录失败，用户名或者密码错!']);	
    		}
    		 
    	}
    }

    public function Logout()
    {
    	Session::delete('username');
    	Session::delete('password');
    
    	Session::clear();
    	$this->success('退出成功', '/admin/Login/index/');
    
    }
}
