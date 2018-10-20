<?php

use Illuminate\Database\Seeder;

class AclTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Block table roles
	    DB::table('roles')->delete();
        $roles = [
        	['id'=>1, 'code'=>'SUP', 'name'=>'Super Admin', 'label'=>'User with this role will have full access to apllication'],
        	['id'=>2, 'code'=>'MIT', 'name'=>'Manager IT', 'label'=>'Manager IT'],
        	['id'=>3, 'code'=>'ADMIT', 'name'=>'Admin IT', 'label'=>'Admin IT'],
        	['id'=>4, 'code'=>'ITS', 'name'=>'IT Support', 'label'=>'IT Support'],
        	['id'=>5, 'code'=>'OTH', 'name'=>'Other', 'label'=>'Other'],
        ];
        DB::table('roles')->insert($roles);
	    //ENDBlock table roles

        //Block table role_user
	    DB::table('role_user')->delete();
        $role_user = [
            //Super Admin
        	['role_id'=>1, 'user_id'=>1],
        	['role_id'=>2, 'user_id'=>2],
        	['role_id'=>3, 'user_id'=>3],
        	['role_id'=>4, 'user_id'=>4],
        	['role_id'=>5, 'user_id'=>5],
        	['role_id'=>5, 'user_id'=>6],
        ];
        DB::table('role_user')->insert($role_user);
        //ENDBlock table role_user

        //Block table permissions
        DB::table('permissions')->delete();

        $permissions = [
            //Modul DPD
            ['id'=>1, 'slug'=>'index-user', 'description'=>'Access index-user method'],
        ];

        DB::table('permissions')->insert($permissions);

        //ENDBlock table permissions

        //Block table permission_role
        DB::table('permission_role')->delete();

        $permission_role = [
            //Permission for ADMINISTRATOR DPP
            ['permission_id'=>1, 'role_id'=>2],
            
        ];
        DB::table('permission_role')->insert($permission_role);

        //ENDBlock table permission_role
    }
}
