<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();
        $role = [
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => [
                'admin' => true,
            ]
        ];
        $adminRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();

        $managingRole = [
            'name' => 'Managing',
            'slug' => 'managing',
        ];
        Sentinel::getRoleRepository()->createModel()->fill($managingRole)->save();

        $advocateRole = [
            'name' => 'Advocate_incharge',
            'slug' => 'advocate_incharge',
        ];
        Sentinel::getRoleRepository()->createModel()->fill($advocateRole)->save();

        $associateRole = [
            'name' => 'Associate',
            'slug' => 'associate',
        ];
        Sentinel::getRoleRepository()->createModel()->fill($associateRole)->save();

        $pupilRole = [
            'name' => 'Pupil',
            'slug' => 'pupil',
        ];
        Sentinel::getRoleRepository()->createModel()->fill($pupilRole)->save();

        $clerkRole = [
            'name' => 'Clerk',
            'slug' => 'clerk',
        ];
        Sentinel::getRoleRepository()->createModel()->fill($clerkRole)->save();

        $admin = [
            'email'    => 'mondiakering@gmail.com',
            'password' => 'mondeer89',
        ];
        $adminUser = Sentinel::registerAndActivate($admin);
        $adminUser->roles()->attach($adminRole);
    }
}
