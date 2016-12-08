<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'position' => '1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now'),
        ]);
    }
}
