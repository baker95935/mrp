<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;
class Common extends Controller
{
	public function _initialize()
	{
		//登录校验
		if(!Session::has('username') || !Session::has('password'))
		{
			$this->redirect('/admin/Login/index/');
		}
	
	}
}
