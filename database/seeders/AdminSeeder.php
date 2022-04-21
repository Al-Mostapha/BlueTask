<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;
Use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User = User::create([
            "name" => "admin", "email" => "admin@Blue.com", "password" => bcrypt('Admin'), "email_verified_at" => now(),
            "user_group" => config("const.UserGroup.UG_ADMIN")
        ]);
        
       Admin::create([
           "id" => $User->id,
           "user_group" => config("const.UserGroup.UG_ADMIN"),
           "last_seen" => now(),
           "last_succ_log" => now()

       ]);
    }
}
