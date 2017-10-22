<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Disciplina;
use App\DisciplinasEvento;
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

class EventoController extends Controller
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
        $eventos = Evento::All();
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas = array('' => "Seleccione", '0' => "Ninguna") + Disciplina::pluck('nombre', 'id')->toArray();
        return view('eventos.new', compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            $separarFecha = explode('/', $request['fecha']);
            $fechaSql     = $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];

            $campos = [
                'fecha'                 => $fechaSql, 
                'solicitudTransporte'   => $request['solicitudTransporte'], 
                'tipoTorneo'            => $request['tipoTorneo'], 
                'lugar'                 => $request['lugar']
            ];
            Evento::create($campos);

            $ultimoIdOrden = \DB::getPdo()->lastInsertId();

            for($i = 0; $i < count($request['disciplinaA']); $i++){
                $camposDisciplinas = [
                    'disciplina'    => $request['disciplinaA'][$i], 
                    'evento'        => $ultimoIdOrden
                ];
                DisciplinasEvento::create($camposDisciplinas);
            }

            return response()->json([
                'nuevoContenido' => $request->all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        $this->evento = $evento;
        $disciplinas = DisciplinasEvento::where('evento', $evento->id)->get();
        return view('eventos.show', ['evento' => $this->evento, 'disciplinas' => $disciplinas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        $this->evento = $evento;
        $disciplinasRegistradas = DisciplinasEvento::where('evento', $evento->id)->get();
        $disciplinas = array('' => "Seleccione", '0' => "Ninguna") + Disciplina::pluck('nombre', 'id')->toArray();
        return view('eventos.edit', ['evento' => $this->evento, 'disciplinasRegistradas' => $disciplinasRegistradas, 'disciplinas' => $disciplinas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        if($request->ajax()){
            $this->evento = $evento;
            $separarFecha = explode('/', $request['fecha']);
            $fechaSql     = $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];

            $campos = [
                'fecha'                 => $fechaSql, 
                'solicitudTransporte'   => $request['solicitudTransporte'], 
                'tipoTorneo'            => $request['tipoTorneo'], 
                'lugar'                 => $request['lugar']
            ];
            $this->evento->fill($campos);
            $this->evento->save();

            for($i = 0; $i < count($request['disciplinaA']); $i++){
                $busquedaDisciplinas = DisciplinasEvento::where('evento', $evento->id)->where('disciplina', $request['disciplinaA'][$i])->get();

                if(count($busquedaDisciplinas) == 0){
                    $camposDisciplinas = [
                        'disciplina'    => $request['disciplinaA'][$i], 
                        'evento'        => $this->evento->id
                    ];
                    DisciplinasEvento::create($camposDisciplinas);
                }
            }

            $listadoDisciplinasEvento = DisciplinasEvento::where('evento', $evento->id)->get();

            foreach ($listadoDisciplinasEvento as $dato) {
                if (!in_array($dato->disciplina, $request['disciplinaA'])) {
                    DisciplinasEvento::where('id', $dato->id)->delete();
                }
            }

            return response()->json([
                'nuevoContenido' => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $this->evento = $evento;
        if (is_null ($this->evento))
            \App::abort(404);

        DisciplinasEvento::where('evento', $evento->id)->delete();
        $this->evento->delete();
        if (\Request::ajax()){
            return Response::json(array (
                'success' => true,
                'msg'     => 'Evento eliminado satisfactoriamente',
                'id'      => $this->evento->id
            ));
        }
        else{
            $mensaje = 'Evento eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('eventos.index');
        }
    }
}
