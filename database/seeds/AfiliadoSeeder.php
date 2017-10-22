<?php

use Illuminate\Database\Seeder;
use App\Afiliado;

class AfiliadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Afiliado::create([
    		'nombre'=>'Pedro',
    		'apellido'=>'Perez',
    		'cedula'=>12345678,
    		'sexo'=>'M',
    		'fechaNacimiento'=>'1989-01-03',
    		'edad'=>28,
    		'telefonoCasa'=>'02911234567',
    		'telefonoMovil'=>'04241234567',
    		'correo'=>'pedropere@gmail.com',
    		'cargo'=>4,
    		'fechaIngreso'=>'2016-01-01',
    		'aniosServicio'=>3,
    		'status'=>'Activo',
    		'dependencia'=>'Eica',
    		'fechaAfiliacion'=>'2017-01-01',
    		'cotizaUdo'=>1,
    		'pathCedula'=>'2017-08-10_10_34_50cover.jpg',
    		'pathImagen'=>'2017-08-10_10_34_50unfile.png',
    		'created_at'=>'2017-08-10 14:34:50',
    		'updated_at'=>'2017-08-10 14:34:50'
    	]);
    }
}
