<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'id'            => '1',
            'name'          => 'Carlos Lopez',
            'cedula'		=> '22725182',
            'username'      => 'carloslopez',
            'email'         => 'carloslopez@gmail.com',
            'password'      => bcrypt('123456'),
            'rol'           => 1,
            'path'          => '2017-07-15 14_39_51img01.png',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);
    }
}
