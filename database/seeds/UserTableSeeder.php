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
        $data = [
            'name'=>'Tuan Bui',
            'status'=>1,
            'email' => 'abcd8@gmail.com',
            'password'=> bcrypt('123456'),
            'permission'=> 1
        ];
        DB::table('users')->insert($data);
    }
}
