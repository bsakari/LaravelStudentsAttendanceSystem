<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'King Wanyama',
            'email' => 'sakaribenjamin@gmail.com',
            'password' => bcrypt('King@Wanyama123'),
            'role_id' => 1,
            'is_active' => 1,
            'created_at' => '2020-04-30 10:26:10',
            'updated_at' => '2020-04-30 10:26:10',
        ]);
    }
}
