<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Redirect;
use Response;
use Session;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only' => ['show', 'edit', 'update', 'destroy']]);
    }

    /*
    public function find(Route $route){
        $this->user = User::find($route->getParameter('users'));
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->rol == 1)
        {
            $users = User::All();
            return view('usuarios.index', compact('users'));    
        }
        else
        {
            Session::flash('message', 'Sin privilegios');
            return Redirect::route('principal');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        if($request->ajax()) {
            if(!empty($request->file('file'))) {
                $file = $request->file('file');
                $nombre = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                $nombre = str_replace(' ', '_', $nombre);
                \Storage::disk('users')->put($nombre,  \File::get($file));
            }
            else
                $nombre = '';

            User::create([
                'username'  => $request['username'], 
                'name'      => $request['name'],
                'email'     => $request['email'], 
                'password'  => bcrypt($request['password']), 
                'rol'       => $request['rol'], 
                'cedula'    => $request['cedula'],
                'path'      => $nombre
            ]);
            
            return response()->json([
                'nuevoContenido' => $request->all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$this->user = User::find($id);
        if(Auth::user()->rol == 1)
        {
            return view('usuarios.profile', ['user' => $this->user]);
        }
        else if(Auth::user()->id == $id)
        {
            return view('usuarios.profile', ['user' => $this->user]);
        }
        else
        {
            Session::flash('message', 'Sin privilegios');
            return Redirect::route('principal');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$this->user = User::find($id);
        if(Auth::user()->rol == 1 || Auth::user()->id == $id)
        {
            return view('usuarios.edit', ['user' => $this->user]);    
        }
        else
        {
            Session::flash('message', 'Sin privilegios');
            return Redirect::route('principal');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
    	$this->user = User::find($id);
        if(Auth::user()->rol == 1 || Auth::user()->id == $id)
        {
            if($request->ajax())
            {
                if(!empty($request->file('file')) and $request->file('file') != '')
                {
                    \File::delete('uploads/users/'.$this->user->path);

                    //obtenemos el campo file definido en el formulario
                    $file = $request->file('file');

                    //obtenemos el nombre del archivo
                    $nombre = str_replace(':', '_', Carbon::now()->toDateTimeString().$file->getClientOriginalName());
                    $nombre = str_replace(' ', '_', $nombre);
                    //indicamos que queremos guardar un nuevo archivo en el disco local
                    \Storage::disk('users')->put($nombre,  \File::get($file));
                }   

                else
                {
                    $nombre = $this->user->path;
                }

                $this->user->fill([
                    'username'  => $request['username'], 
                    'name'      => $request['name'],
                    'email'     => $request['email'], 
                    'rol'       => $request['rol'], 
                    'cedula'    => $request['cedula'],
                    'path'      => $nombre
                    ]);
                $this->user->save();

                return Response::json([
                    'nuevoContenido' => $this->user
                ]);
            }
        }
        else
        {
            Session::flash('message', 'Sin privilegios');
            return Redirect::route('principal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$this->user = User::find($id);
        if(Auth::user()->rol == 1)
        {
            if (is_null ($this->user))
            {
                \App::abort(404);
            }

            $this->user->delete();

            if (\Request::ajax())
            {
                \File::delete('uploads/users/'.$this->user->path);
                return Response::json(array (
                    'success' => true,
                    'msg'     => 'Usuario "' . $this->user->username . '" eliminado satisfactoriamente',
                    'id'      => $this->user->id,
                ));
            }
            else
            {
                Session::flash('message', 'Usuario "' . $this->user->username . '" eliminado satisfactoriamente');
                return Redirect::route('usuarios.index');
            }   
        }
        else
        {
            Session::flash('message', 'Sin privilegios');
            return Redirect::route('principal');
        }
    }

    public function register()
    {
        return view('usuarios.register');
    }
}
