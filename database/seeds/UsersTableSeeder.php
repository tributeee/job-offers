<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();

        \Illuminate\Support\Facades\DB::table('users')->delete();

        $user = new User();
        $user->name = 'Board Moderator';
        $user->email = 'moderator@job-offers.com';
        $user->password = password_hash('secret', PASSWORD_BCRYPT);
        $user->save();
    }
}
