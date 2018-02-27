<?php

namespace App\Http\Controllers;

use App\Afiliado;
use App\Atleta;
use App\Disciplina;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AtletaRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class AtletaController extends Controller
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
        $atletas = Atleta::All();
        return view('atletas.index', compact('atletas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $afiliados = array('' => "Seleccione") + Afiliado::select(\DB::raw('CONCAT(REPLACE(FORMAT(cedula, 0), ",", "."), " - ", nombre, " ", apellido) as nombre, id'))->orderBy('nombre', 'asc')->pluck('nombre','id')->toArray();
        $disciplinas = array('' => "Seleccione", '0' => "Ninguna") + Disciplina::pluck('nombre', 'id')->toArray();
        return view('atletas.new', compact('disciplinas', 'afiliados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtletaRequest $request)
    {
        if($request->ajax()) {
            $campos = [
                'afiliado'      => $request['afiliado'],
                'disciplinaUno' => $request['disciplinaUno'],
                'disciplinaDos' => $request['disciplinaDos']
            ];
            Atleta::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function show(Atleta $atleta)
    {
        return view('atletas.show', ['atleta' => $atleta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function edit(Atleta $atleta)
    {
        $afiliados = array('' => "Seleccione") + Afiliado::select(\DB::raw('CONCAT(REPLACE(FORMAT(cedula, 0), ",", "."), " - ", nombre, " ", apellido) as nombre, id'))->orderBy('nombre', 'asc')->pluck('nombre','id')->toArray();
        $disciplinas = array('' => "Seleccione", '0' => "Ninguna") + Disciplina::pluck('nombre', 'id')->toArray();
        return view('atletas.edit', ['atleta' => $atleta, 'afiliados' => $afiliados, 'disciplinas' => $disciplinas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function update(AtletaRequest $request, Atleta $atleta)
    {
        if($request->ajax()) {
            $campos = [
                'afiliado'      => $request['afiliado'],
                'disciplinaUno' => $request['disciplinaUno'],
                'disciplinaDos' => $request['disciplinaDos']
            ];
            $atleta->fill($campos);
            $atleta->save();
            return response()->json([
                'validations' => true           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atleta $atleta)
    {
        if (is_null ($atleta))
            \App::abort(404);

        $nombre = $atleta->nombre. " ".$atleta->apellido;
        $atleta->delete();
        if (\Request::ajax()){
            return Response::json(array (
                'success' => true,
                'msg'     => 'Atleta ' . $nombre .' eliminado satisfactoriamente',
                'id'      => $atleta->id
            ));
        }
        else{
            $mensaje = 'Atleta '. $nombre.' eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('atletas.index');
        }
    }

    public function buscarAtleta($id)
    {
        $afiliado = Afiliado::with(['nombreCargo'])->find($id);
        return response()->json([
            'respuesta' => $afiliado
        ]);
    }

    public function consultar()
    {
        $disciplinas = array('' => "Seleccione", '0' => "Ninguna") + Disciplina::pluck('nombre', 'id')->toArray();
        return view('atletas.consultar', compact('disciplinas'));
    }

    public function resultados($disciplina, $sexo)
    {
        if($disciplina == "-1" && $sexo == "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, disciplinasUno.nombre as disciplinaNombreUno, disciplinasDos.nombre as disciplinaNombreDos FROM atletas INNER JOIN afiliados ON atletas.afiliado = afiliados.id INNER JOIN disciplinas as disciplinasUno ON atletas.disciplinaUno = disciplinasUno.id INNER JOIN disciplinas as disciplinasDos ON atletas.disciplinaDos = disciplinasDos.id");
        }
        elseif($disciplina == "-1" && $sexo != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, disciplinasUno.nombre as disciplinaNombreUno, disciplinasDos.nombre as disciplinaNombreDos FROM atletas INNER JOIN afiliados ON atletas.afiliado = afiliados.id INNER JOIN disciplinas as disciplinasUno ON atletas.disciplinaUno = disciplinasUno.id INNER JOIN disciplinas as disciplinasDos ON atletas.disciplinaDos = disciplinasDos.id WHERE afiliados.sexo = '".$sexo."'");
        }
        elseif($sexo == "-1" && $disciplina != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, disciplinasUno.nombre as disciplinaNombreUno, disciplinasDos.nombre as disciplinaNombreDos FROM atletas INNER JOIN afiliados ON atletas.afiliado = afiliados.id INNER JOIN disciplinas as disciplinasUno ON atletas.disciplinaUno = disciplinasUno.id INNER JOIN disciplinas as disciplinasDos ON atletas.disciplinaDos = disciplinasDos.id WHERE (disciplinaUno = ".$disciplina." OR disciplinaDos = ".$disciplina.")");
        }
        else{
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, disciplinasUno.nombre as disciplinaNombreUno, disciplinasDos.nombre as disciplinaNombreDos FROM atletas INNER JOIN afiliados ON atletas.afiliado = afiliados.id INNER JOIN disciplinas as disciplinasUno ON atletas.disciplinaUno = disciplinasUno.id INNER JOIN disciplinas as disciplinasDos ON atletas.disciplinaDos = disciplinasDos.id WHERE (disciplinaUno = ".$disciplina." OR disciplinaDos = ".$disciplina.") and afiliados.sexo = '".$sexo."'");
        }
        return response()->json([
            'respuesta' => $atletas
        ]);
    }

    public function reporte($disciplina, $sexo){
        if($disciplina == "-1" && $sexo == "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, disciplinasUno.nombre as disciplinaNombreUno, disciplinasDos.nombre as disciplinaNombreDos FROM atletas INNER JOIN afiliados ON atletas.afiliado = afiliados.id INNER JOIN disciplinas as disciplinasUno ON atletas.disciplinaUno = disciplinasUno.id INNER JOIN disciplinas as disciplinasDos ON atletas.disciplinaDos = disciplinasDos.id");
        }
        elseif($disciplina == "-1" && $sexo != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, disciplinasUno.nombre as disciplinaNombreUno, disciplinasDos.nombre as disciplinaNombreDos FROM atletas INNER JOIN afiliados ON atletas.afiliado = afiliados.id INNER JOIN disciplinas as disciplinasUno ON atletas.disciplinaUno = disciplinasUno.id INNER JOIN disciplinas as disciplinasDos ON atletas.disciplinaDos = disciplinasDos.id WHERE afiliados.sexo = '".$sexo."'");
        }
        elseif($sexo == "-1" && $disciplina != "-1"){
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, disciplinasUno.nombre as disciplinaNombreUno, disciplinasDos.nombre as disciplinaNombreDos FROM atletas INNER JOIN afiliados ON atletas.afiliado = afiliados.id INNER JOIN disciplinas as disciplinasUno ON atletas.disciplinaUno = disciplinasUno.id INNER JOIN disciplinas as disciplinasDos ON atletas.disciplinaDos = disciplinasDos.id WHERE (disciplinaUno = ".$disciplina." OR disciplinaDos = ".$disciplina.")");
        }
        else{
            $atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido, disciplinasUno.nombre as disciplinaNombreUno, disciplinasDos.nombre as disciplinaNombreDos FROM atletas INNER JOIN afiliados ON atletas.afiliado = afiliados.id INNER JOIN disciplinas as disciplinasUno ON atletas.disciplinaUno = disciplinasUno.id INNER JOIN disciplinas as disciplinasDos ON atletas.disciplinaDos = disciplinasDos.id WHERE (disciplinaUno = ".$disciplina." OR disciplinaDos = ".$disciplina.") and afiliados.sexo = '".$sexo."'");
        }

        $pdf = \PDF::loadView('atletas.reporte', compact('atletas'));
        return $pdf->stream('reporte.pdf');
    }
}
