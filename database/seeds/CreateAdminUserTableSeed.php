<?php

use think\migration\Seeder;

class CreateAdminUserTableSeed extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
		$user=model('admin/User');
		$data=array();
		$data['username']='admin';
		$data['password']=md5('123456');
		$data['create_time']=time();
		$data['email']='admin@admin.com';
		$user->save($data);
		echo 'ok';
    }
}