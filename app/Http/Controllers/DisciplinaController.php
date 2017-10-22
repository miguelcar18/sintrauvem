<?php

namespace App\Http\Controllers;

use App\Disciplina;
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

class DisciplinaController extends Controller
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
        $disciplinas = Disciplina::All();
        return view('disciplinas.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplinas.new');
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
                'nombre' => $request['nombre']
            ];
            Disciplina::create($campos);
            return response()->json([
                'nuevoContenido' => $request->all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        return view('disciplinas.show', ['disciplina' => $disciplina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
        return view('disciplinas.edit', ['disciplina' => $disciplina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina)
    {
        if($request->ajax()) {
            $campos = [
                'nombre'            => $request['nombre']
            ];
            $disciplina->fill($campos);
            $disciplina->save();
            return response()->json([
                'nuevoContenido' => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina)
    {
        if (is_null ($disciplina))
            \App::abort(404);

        $nombre = $disciplina->nombre;
        $disciplina->delete();
        if (\Request::ajax()){
            return Response::json(array (
                'success' => true,
                'msg'     => 'Disciplina ' . $disciplina->nombre .' eliminada satisfactoriamente',
                'id'      => $disciplina->id
            ));
        }
        else{
            $mensaje = 'Disciplina '. $nombre.' eliminada satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('disciplinas.index');
        }
    }
}
