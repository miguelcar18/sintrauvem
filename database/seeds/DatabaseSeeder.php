<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserSeeder::class);
        $this->call(DisciplinasSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(AfiliadoSeeder::class);
        $this->call(AtletasSeeder::class);

        Model::reguard();
    }
}
