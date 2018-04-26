<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

class Login extends Controller
{
    /**
     *
     * @return \think\Response
     */
    public function index()
    {
    	return $this->fetch();
    }
    
    /**
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
				return json_encode(['code'=>1,'msg'=>'login success!','url'=>url('/admin/Index/index/')]);
    		} else {
				return json_encode(['code'=>-1,'msg'=>'login fail,please retry']);	
    		}
    		 
    	}
    }

    public function Logout()
    {
    	Session::delete('username');
    	Session::delete('password');
    
    	Session::clear();
    	$this->success('logout seccess!', '/admin/Login/index/');
    
    }
}
