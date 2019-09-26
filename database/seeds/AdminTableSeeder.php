<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'asdf',
            'email'=>'rupan87@gmail.com',
            'password' => '$2y$10$DLzbZbUM0ahFtA3681uUOuRJjUcREfqKIv6YiSXkt/2P9iRUh9SuC',
            'status' => '1',
            'privileges' => 'Super Admin'
        ]);
    }
}
