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

        $data = [
            [
                'name' => 'Albi',
                'role' => 'admin',
                'email' => 'labs@admin.com',
                'password' => password_hash('58626682',PASSWORD_BCRYPT)
            ],
            [
                'name' => 'John Doe',
                'role' => 'editeur',
                'email' => 'albinotnoty@gmail.com',
                'password' => password_hash('58626682',PASSWORD_BCRYPT)
            ],
            [
                'name' => 'John Guest',
                'role' => 'guest',
                'email' => 'john@guest.com',
                'password' => password_hash('58626682',PASSWORD_BCRYPT)
            ]
            ];

        DB::table('users')->insert($data);
        
    }
}
