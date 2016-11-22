<?php

use Illuminate\Database\Seeder;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = new \App\User();
       $admin->name = 'admin';
       $admin->email = 'admin@ukr.net';
       $admin->password = bcrypt('test_pw');
       $admin->is_admin = true;
       $admin->save();
    }
}
