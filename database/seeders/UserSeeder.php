<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Tony Abrie";
        $user->email = "tonys@gmail.com";
        $user->email_verified_at = "2023-08-06 20:00:00";
        $user->password = "anypassword";
        $user->remember_token = "afkme";
        $user->save();

        $user = new User();
        $user->name = "Will Johnson";
        $user->email = "willj@gmail.com";
        $user->email_verified_at = "2023-08-06 20:00:00";
        $user->password = "pwpwpw";
        $user->remember_token = "sdfml";
        $user->save();

        $user = new User();
        $user->name = "katerine Stark";
        $user->email = "kats@gmail.com";
        $user->email_verified_at = "2023-08-06 20:00:00";
        $user->password = "neverforgot";
        $user->remember_token = "sdfwd";
        $user->save();

        User::factory(100)->create();
    }
}
