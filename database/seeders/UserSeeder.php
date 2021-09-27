<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///////////////////////////
        ////////    Root   ///////
        /////////////////////////
        $user_root = User::where('email',"super_admin@admin.com")->first();

        if($user_root)
        {
            $user_root->delete();
        }

        $user_root = User::create([
            "name"  => "super admin",
            "email" => "super_admin@admin.com",
            "password" => bcrypt("secret")
        ]);
    }
}
