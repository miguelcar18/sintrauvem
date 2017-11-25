<?php

namespace App\Http\Controllers;

use App\Afiliado;
use App\Elecciones;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class EleccionesController extends Controller
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
        $elecciones = Elecciones::All();
        return view('elecciones.index', compact('elecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $afiliados = array('' => "Seleccione") + Afiliado::select(\DB::raw('CONCAT(REPLACE(FORMAT(cedula, 0), ",", "."), " - ", nombre, " ", apellido) as nombre, id'))->orderBy('nombre', 'asc')->pluck('nombre','id')->toArray();
        return view('elecciones.new', compact('afiliados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            $campos = [
                'afiliado'  => $request['afiliado'],
                'centro'    => $request['centro'],
                'mesa'      => $request['mesa']
            ];
            Elecciones::create($campos);
            return response()->json([
                'nuevoContenido' => $request->all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Elecciones  $elecciones
     * @return \Illuminate\Http\Response
     */
    public function show(Elecciones $eleccione)
    {
        return view('elecciones.show', ['eleccion' => $eleccione]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Elecciones  $elecciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Elecciones $eleccione)
    {
        $afiliados = array('' => "Seleccione") + Afiliado::select(\DB::raw('CONCAT(REPLACE(FORMAT(cedula, 0), ",", "."), " - ", nombre, " ", apellido) as nombre, id'))->orderBy('nombre', 'asc')->pluck('nombre','id')->toArray();
        return view('elecciones.edit', ['eleccion' => $eleccione, 'afiliados' => $afiliados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Elecciones  $elecciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Elecciones $eleccione)
    {
        if($request->ajax()) {
            $campos = [
                'afiliado'  => $request['afiliado'],
                'centro'    => $request['centro'],
                'mesa'      => $request['mesa']
            ];
            $eleccione->fill($campos);
            $eleccione->save();
            return response()->json([
                'nuevoContenido' => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Elecciones  $elecciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elecciones $eleccione)
    {
        if (is_null ($eleccione))
            \App::abort(404);

        $eleccione->delete();
        if (\Request::ajax()){
            return Response::json(array (
                'success' => true,
                'msg'     => 'Registro eliminado satisfactoriamente',
                'id'      => $eleccione->id
            ));
        }
        else{
            $mensaje = 'Registro eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('elecciones.index');
        }
    }

    public function consultar()
    {
        return view('elecciones.consultar');
    }

    public function resultados($centro, $mesa)
    {
        if($centro == "-1" && $mesa == "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, elecciones.centro, elecciones.mesa FROM elecciones INNER JOIN afiliados ON elecciones.afiliado = afiliados.id");
        }
        elseif($centro == "-1" && $mesa != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, elecciones.centro, elecciones.mesa FROM elecciones INNER JOIN afiliados ON elecciones.afiliado = afiliados.id WHERE elecciones.mesa = '".$mesa."'");
        }
        elseif($mesa == "-1" && $centro != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, elecciones.centro, elecciones.mesa FROM elecciones INNER JOIN afiliados ON elecciones.afiliado = afiliados.id WHERE elecciones.centro  = '".$centro."'");
        }
        else{
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, elecciones.centro, elecciones.mesa FROM elecciones INNER JOIN afiliados ON elecciones.afiliado = afiliados.id WHERE elecciones.centro  = '".$centro."' and elecciones.mesa = '".$mesa."'");
        }
        return response()->json([
            'respuesta' => $atletas
        ]);
    }

    public function reporte($centro, $mesa){
        if($centro == "-1" && $mesa == "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, elecciones.centro, elecciones.mesa FROM elecciones INNER JOIN afiliados ON elecciones.afiliado = afiliados.id");
        }
        elseif($centro == "-1" && $mesa != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, elecciones.centro, elecciones.mesa FROM elecciones INNER JOIN afiliados ON elecciones.afiliado = afiliados.id WHERE elecciones.mesa = '".$mesa."'");
        }
        elseif($mesa == "-1" && $centro != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, elecciones.centro, elecciones.mesa FROM elecciones INNER JOIN afiliados ON elecciones.afiliado = afiliados.id WHERE elecciones.centro  = '".$centro."'");
        }
        else{
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, elecciones.centro, elecciones.mesa FROM elecciones INNER JOIN afiliados ON elecciones.afiliado = afiliados.id WHERE elecciones.centro  = '".$centro."' and elecciones.mesa = '".$mesa."'");
        }

        $centro = $centro != "-1" ? $centro : "Todas";
        $mesa = $mesa != "-1" ? $mesa : "Todas";

        $pdf = \PDF::loadView('elecciones.reporte', compact('atletas', 'estado', 'dependencia'));
        return $pdf->stream('reporteElecciones.pdf');
    }
}
