<?php

use Illuminate\Database\Seeder;
use App\Atleta;

class AtletasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Atleta::create([
    		'afiliado'=>1,
    		'disciplinaUno'=>1,
    		'disciplinaDos'=>3,
    		'created_at'=>'2017-09-23 22:26:24',
    		'updated_at'=>'2017-09-23 22:26:24'
    	]);
    }
}
