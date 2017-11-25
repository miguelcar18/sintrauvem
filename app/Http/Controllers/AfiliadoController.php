<?php

namespace App\Http\Controllers;

use App\Afiliado;
use App\Cargos;
use App\CargaFamiliar;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AfiliadoRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class AfiliadoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $afiliados = Afiliado::with(['nombreCargo'])->get();
        return view('afiliados.index', compact('afiliados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = array('' => "Seleccione") + Cargos::pluck('nombre', 'id')->toArray();
        return view('afiliados.new', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AfiliadoRequest $request)
    {
        if($request->ajax())
        {
        	$separarFechaNacimiento = explode('/', $request['fechaNacimiento']);
        	$separarFechaIngreso 	= explode('/', $request['fechaIngreso']);
        	$separarFechaAfiliacion = explode('/', $request['fechaAfiliacion']);
            $fechaNacimientoSql 	= $separarFechaNacimiento[2].'-'.$separarFechaNacimiento[1].'-'.$separarFechaNacimiento[0];
            $fechaIngresoSql 		= $separarFechaIngreso[2].'-'.$separarFechaIngreso[1].'-'.$separarFechaIngreso[0];
            $fechaAfiliacionSql 	= $separarFechaAfiliacion[2].'-'.$separarFechaAfiliacion[1].'-'.$separarFechaAfiliacion[0];

        	if(!empty($request->file('fileCedula'))) {
                $file = $request->file('fileCedula');
                $nombreCedula = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombreCedula = str_replace(' ', '_', $nombreCedula);
                \Storage::disk('afiliados')->put($nombreCedula,  \File::get($file));
            }
            else
                $nombreCedula = '';

            if(!empty($request->file('fileImagen'))) {
                $file = $request->file('fileImagen');
                $nombreImagen = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombreImagen = str_replace(' ', '_', $nombreImagen);
                \Storage::disk('afiliados')->put($nombreImagen,  \File::get($file));
            }
            else
                $nombreImagen = '';

            $campos = [
	            'nombre' 			=> $request['nombre'], 
	            'apellido' 			=> $request['apellido'], 
	            'cedula' 			=> $request['cedula'], 
	            'sexo' 				=> $request['sexo'], 
	            'fechaNacimiento' 	=> $fechaNacimientoSql, 
	            'edad' 				=> $request['edad'], 
	            'telefonoCasa' 		=> $request['telefonoCasa'], 
	            'telefonoMovil' 	=> $request['telefonoMovil'], 
	            'correo' 			=> $request['correo'], 
	            'cargo' 			=> $request['cargo'], 
	            'fechaIngreso' 		=> $fechaIngresoSql, 
	            'aniosServicio' 	=> $request['aniosServicio'], 
	            'status' 			=> $request['status'], 
	            'dependencia' 		=> $request['dependencia'], 
	            'fechaAfiliacion' 	=> $fechaAfiliacionSql, 
	            'cotizaUdo' 		=> $request['cotizaUdo'], 
	            'pathCedula' 		=> $nombreCedula,
	            'pathImagen' 		=> $nombreImagen
            ];
            Afiliado::create($campos);

            $ultimoIdOrden = \DB::getPdo()->lastInsertId();

            for($i = 0; $i < count($request['nombreA']); $i++){
                $nombre     = $request['nombreA'][$i];
                $relacion   = $request['relacionA'][$i];
                $camposCarga = [
                    'nombre'    => $request['nombreA'][$i], 
                    'relacion'  => $request['relacionA'][$i],
                    'afiliado'  => $ultimoIdOrden
                ];
                CargaFamiliar::create($camposCarga);
            }

            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Afiliado  $afiliados
     * @return \Illuminate\Http\Response
     */
    public function show(Afiliado $afiliados, $id)
    {
        $this->afiliado = Afiliado::find($id);
        $carga = CargaFamiliar::where('afiliado', $id)->get();
        return view('afiliados.show', ['afiliado' => $this->afiliado, 'carga' => $carga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Afiliado  $afiliados
     * @return \Illuminate\Http\Response
     */
    public function edit(Afiliado $afiliados, $id)
    {
        $this->afiliado = Afiliado::find($id);
        $carga = CargaFamiliar::where('afiliado', $id)->get();
        $cargos = array('' => "Seleccione") + Cargos::pluck('nombre', 'id')->toArray();
        return view('afiliados.edit', ['afiliado' => $this->afiliado, 'carga' => $carga, 'cargos' => $cargos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Afiliado  $afiliados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Afiliado $afiliados, $id)
    {
        if($request->ajax())
        {
            $this->afiliado = Afiliado::find($id);
            $separarFechaNacimiento = explode('/', $request['fechaNacimiento']);
        	$separarFechaIngreso 	= explode('/', $request['fechaIngreso']);
        	$separarFechaAfiliacion = explode('/', $request['fechaAfiliacion']);
            $fechaNacimientoSql 	= $separarFechaNacimiento[2].'-'.$separarFechaNacimiento[1].'-'.$separarFechaNacimiento[0];
            $fechaIngresoSql 		= $separarFechaIngreso[2].'-'.$separarFechaIngreso[1].'-'.$separarFechaIngreso[0];
            $fechaAfiliacionSql 	= $separarFechaAfiliacion[2].'-'.$separarFechaAfiliacion[1].'-'.$separarFechaAfiliacion[0];

            if(!empty($request->file('fileCedula'))) {
                $file = $request->file('fileCedula');
                $nombreCedula = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombreCedula = str_replace(' ', '_', $nombreCedula);
                \Storage::disk('afiliados')->put($nombreCedula,  \File::get($file));
            }
            else
                $nombreCedula = $this->afiliado->pathCedula;

            if(!empty($request->file('fileImagen'))) {
                $file = $request->file('fileImagen');
                $nombreImagen = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombreImagen = str_replace(' ', '_', $nombreImagen);
                \Storage::disk('afiliados')->put($nombreImagen,  \File::get($file));
            }
            else
                $nombreImagen = $this->afiliado->pathImagen;

            $campos = [
	            'nombre' 			=> $request['nombre'], 
	            'apellido' 			=> $request['apellido'], 
	            'cedula' 			=> $request['cedula'], 
	            'sexo' 				=> $request['sexo'], 
	            'fechaNacimiento' 	=> $fechaNacimientoSql, 
	            'edad' 				=> $request['edad'], 
	            'telefonoCasa' 		=> $request['telefonoCasa'], 
	            'telefonoMovil' 	=> $request['telefonoMovil'], 
	            'correo' 			=> $request['correo'], 
	            'cargo' 			=> $request['cargo'], 
	            'fechaIngreso' 		=> $fechaIngresoSql, 
	            'aniosServicio' 	=> $request['aniosServicio'], 
	            'status' 			=> $request['status'], 
	            'dependencia' 		=> $request['dependencia'], 
	            'fechaAfiliacion' 	=> $fechaAfiliacionSql, 
	            'cotizaUdo' 		=> $request['cotizaUdo'], 
	            'pathCedula' 		=> $nombreCedula,
	            'pathImagen' 		=> $nombreImagen
            ];
            $this->afiliado->fill($campos);
            $this->afiliado->save();

            for($i = 0; $i < count($request['nombreA']); $i++){
                $busquedaCargaFamiliar = CargaFamiliar::where('afiliado', $id)->where('nombre', $request['nombreA'][$i])->where('relacion', $request['relacionA'][$i])->get();

                if(count($busquedaCargaFamiliar) == 0){
                    $nombre     = $request['nombreA'][$i];
                    $relacion   = $request['relacionA'][$i];

                    $camposCarga = [
                        'nombre'    => $request['nombreA'][$i], 
                        'relacion'  => $request['relacionA'][$i],
                        'afiliado'  => $this->afiliado->id
                    ];
                    CargaFamiliar::create($camposCarga);
                }
                else if(count($busquedaCargaFamiliar) > 0){
                    foreach ($busquedaCargaFamiliar as $data) {
                        $idCF           = $data->id;
                        $camposCargaFamiliar = [
                            'nombre'    => $request['nombreA'][$i],
                            'relacion'  => $request['relacionA'][$i]
                        ];
                        \DB::table('carga_familiar')->where('id', $idCF)->update($camposCargaFamiliar);
                    }
                }
            }

            $listadoCargaFamiliar = CargaFamiliar::where('afiliado', $id)->get();

            foreach ($listadoCargaFamiliar as $dato) {
                if (!in_array($dato->relacion, $request['relacionA'])) {
                    CargaFamiliar::where('id', $dato->id)->delete();
                }
            }

            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Afiliado  $afiliados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Afiliado $afiliados, $id)
    {
        $this->afiliado = Afiliado::find($id);
        if (is_null ($this->afiliado))
            \App::abort(404);

        \File::delete('uploads/afiliados/'.$this->afiliado->pathCedula);
        \File::delete('uploads/afiliados/'.$this->afiliado->pathImagen);
        CargaFamiliar::where('afiliado', $id)->delete();
        $this->afiliado->delete();
        if (\Request::ajax()){
            return Response::json(array (
                'success' => true,
                'msg'     => 'Afiliado "' . $this->afiliado->nombre.' '.$this->afiliado->apellido .'" eliminado satisfactoriamente',
                'id'      => $this->afiliado->id
            ));
        }
        else{
            $mensaje = 'Afiliado "'. $this->afiliado->nombre.' '.$this->afiliado->apellido .'" eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('afiliados.index');
        }
    }

    public function consultar()
    {
        return view('afiliados.consultar');
    }

    public function resultados($estado, $dependencia)
    {
        if($estado == "-1" && $dependencia == "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados");
        }
        elseif($estado == "-1" && $dependencia != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados WHERE afiliados.dependencia = '".$dependencia."'");
        }
        elseif($dependencia == "-1" && $estado != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados WHERE afiliados.status  = '".$estado."'");
        }
        else{
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados WHERE afiliados.status  = '".$estado."' and afiliados.dependencia = '".$dependencia."'");
        }
        return response()->json([
            'respuesta' => $atletas
        ]);
    }

    public function reporte($estado, $dependencia){
        if($estado == "-1" && $dependencia == "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados");
        }
        elseif($estado == "-1" && $dependencia != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados WHERE afiliados.dependencia = '".$dependencia."'");
        }
        elseif($dependencia == "-1" && $estado != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados WHERE  afiliados.status  = '".$estado."'");
        }
        else{
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados WHERE afiliados.status  = '".$estado."' and afiliados.dependencia = '".$dependencia."'");
        }

        $estado = $estado != "-1" ? $estado : "Todas";
        $dependencia = $dependencia != "-1" ? $dependencia : "Todas";

        $pdf = \PDF::loadView('afiliados.reporte', compact('atletas', 'estado', 'dependencia'));
        return $pdf->stream('reporteAfiliados.pdf');
    }
}
