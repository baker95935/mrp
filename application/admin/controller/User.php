<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class User extends Common
{
    /**
     *
     * @return \think\Response
     */
    public function index()
    {
    	$user=model('User');
    	
    	$userList=$user::all();
    	$this->assign('userList',$userList);
        return $this->fetch();
    }

    /**
     *
     * @return \think\Response
     */
    public function create()
    {
    	$user = model('User');
    	 
    	$request = request();
    	$id=$request->param('id');
    	 
    	$data=array();
    	!empty($id) && $data=$user::get($id);
    	$this->assign('data',$data);
    	
    	return $this->fetch();
    }

    /**
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data=array();
        $data['username']=$request->param('username');
        $data['password']=md5($request->param('password'));
        $data['email']=$request->param('email');
        $data['create_time']=time();
        $data['id']=$request->param('id');
        	
        $request->param('password') && $data['password']=$request->param('password');
        
        $result=0;
        $user=model('User');
        
        if(!empty($data['id'])) {
        	$result=$user->save($data,array('id'=>$data['id']));
        } else {
        	$result=$user->save($data);
        }
        
        $result==1 && $this->success('operation success!', '/admin/User/index/');
        $result==0 && $this->success('operation faile', '/admin/User/create/');
    }

 	/**
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $user=model('User');
    	$request = request();
    	
    	if($request->method()=='GET') {
    			
    		$id=$request->param('id');
    		
    		$result=0;
    		$result=$user->destroy($id);
    			
    		if($result==0){
    			$this->success('operation faile');
    		} else {
    			$this->success('operation success', '/admin/User/index/');
    		}
    	}
    	
    	$this->success('operation faile，please retry');
    }
}
