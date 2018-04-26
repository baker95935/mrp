<?php
namespace app\admin\controller;
use think\Controller;

 
class Index extends Common
{
	
    public function index()
    {
    	return $this->fetch();
    }
    
    //邮件发送
    public function test()
    {
    	send_email('baker95935@qq.com','baker');
    }
}
