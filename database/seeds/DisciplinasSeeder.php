<?php

use Illuminate\Database\Seeder;

class DisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplinas')->insert([
            'id' 		=> '1',
            'nombre' 	=> 'Ajedrez',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '2',
            'nombre' 	=> 'Bolas criollas femenino',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '3',
            'nombre' 	=> 'Bolas criollas masculino',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '4',
            'nombre' 	=> 'Caminata',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '5',
            'nombre' 	=> 'Futbol de campo',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '6',
            'nombre' 	=> 'Futbol sala',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '7',
            'nombre' 	=> 'Ciclismo',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '8',
            'nombre' 	=> 'Domino femenino',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '9',
            'nombre' 	=> 'Domino masculino',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '10',
            'nombre' 	=> 'Truco',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '11',
            'nombre' 	=> 'Maratón',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '12',
            'nombre' 	=> 'Baloncesto',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '13',
            'nombre' 	=> 'Voleibol',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '14',
            'nombre' 	=> 'Bailoterapia',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '15',
            'nombre' 	=> 'Kikimbol',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('disciplinas')->insert([
            'id' 		=> '16',
            'nombre' 	=> 'Tenis de mesa',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);
    }
}
