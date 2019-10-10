<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::Truncate();
        DB::table('users')->insert([
            'name' => 'Albi',
            'role' => 'admin',
            'email' => 'albi@admin.com',
            'password' => password_hash('58626682',PASSWORD_BCRYPT)
        ]);
        
    }
}
