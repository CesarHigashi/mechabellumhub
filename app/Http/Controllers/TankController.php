<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Mail\NotifyTank;
use App\Models\Nation;
use App\Models\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TankController extends Controller
{    
    /*
        GET|HEAD        tank ............................................. tank.index › TankController@index
        POST            tank ............................................. tank.store › TankController@store
        GET|HEAD        tank/create .................................... tank.create › TankController@create
        GET|HEAD        tank/restore/{id} ............................ tank.restore › TankController@restore
        GET|HEAD        tank/restoreAll ....................... tank.restore.all › TankController@restoreAll
        GET|HEAD        tank/{tank} ........................................ tank.show › TankController@show
        PUT|PATCH       tank/{tank} .................................... tank.update › TankController@update
        DELETE          tank/{tank} .................................. tank.destroy › TankController@destroy
        GET|HEAD        tank/{tank}/edit ................................... tank.edit › TankController@edit
    */
    
    //Middleware autenticación
    public function __construct()
    {
        //Permite visualizar index y show
        $this->middleware('auth')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$tanks = Tank::all();
        $tanks = Tank::with('nations:id,name')->get();
        
        /* Recupera informacion de los deletes */
        if($request->has('view_deleted')){
            $tanks = Tank::with('nations:id,name')->onlyTrashed()->get();
        }

        return view('tank/tankIndex', compact('tanks'));
    }

    /* Metodos para restore */
    public function restore($id)
    {
        //Validamos si es el administrador el que quiere editar un vehiculo
        if (! Gate::allows('edita-vehiculo')){
            abort(403);
        }

        Tank::withTrashed()->find($id)->restore();
        return redirect('/tank')->with('success','Tanque restaurado de forma exitosa.');
    }

    public function restoreAll()
    {
        //Validamos si es el administrador el que quiere editar un vehiculo
        if (! Gate::allows('edita-vehiculo')){
            abort(403);
        }
        
        Tank::onlyTrashed()->restore();
        return redirect('/tank')->with('success','Todos los tanques restaurados de forma exitosa.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nations = Nation::all();
        return view('tank/tankCreate', compact('nations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar
        $request->validate([
            'name' => 'required|max:50',
            'year' => 'digits:4|required|integer|numeric',
            //'country' => 'required',
            'nations_id' => 'required|max:25',
            'caliber_mm' => 'digits_between:0,3|integer|numeric',
            'crew' => 'required|integer|numeric',
            'max_speed_kmh' => 'required|digits_between:1,4|integer|numeric',
            'weight_kg' => 'required|digits_between:1,4|integer|numeric',
            'category' => 'required|max:30',
            'description' => 'required|max:500',
        ]);
        //Insertar en BD
        //Usa el modelo para mandar informacion a la base de datos
        $tank = Tank::create($request->all());
        $usuario = User::where('rol', 'admin')->first();
        
        //Correo para avisar de nuevo tanque
        Mail::to($usuario->email)->send(new NotifyTank($tank));


        //Subida de archivo
        if($request->file('image')->isValid()){
            $location = $request->image->store('public');
            $image = new Image();
            $image->location = $location;
            $image->original_name = $request->image->getClientOriginalName();
            $image->mime='';

            $tank->image()->save($image);
        }

        //Redirigir
        return redirect('/tank')->with('success','Tanque creado de forma exitosa.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function show(Tank $tank)
    {
        return view('/tank/tankShow', compact('tank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function edit(Tank $tank)
    {
        //Validamos si es el administrador el que quiere editar un vehiculo
        if (! Gate::allows('edita-vehiculo')){
            abort(403);
        }

        $nations = Nation::all();
        return view('tank/tankEdit', compact('tank', 'nations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tank $tank)
    {
        $request->validate([
            'name' => 'required|max:50',
            'year' => 'digits:4|required|integer|numeric',
            //'country' => 'required',
            'nations_id' => 'required|max:25',
            'caliber_mm' => 'digits_between:0,3|integer|numeric',
            'crew' => 'required|integer|numeric',
            'max_speed_kmh' => 'required|digits_between:1,4|integer|numeric',
            'weight_kg' => 'required|digits_between:1,4|integer|numeric',
            'category' => 'required|max:30',
            'description' => 'required|max:500',
        ]);

        //Borra archivo viejo
        $file = Image::whereId($tank->image->id)->firstOrFail();
        unlink(public_path(Storage::url($file->location)));
        $file->forceDelete($file->id);

        //Subida de archivo
        if($request->file('image')->isValid()){
            $location = $request->image->store('public');
            $image = new Image();
            $image->location = $location;
            $image->original_name = $request->image->getClientOriginalName();
            $image->mime='';

            $tank->image()->save($image);
        }

        Tank::where('id',$tank->id)->update($request->except('_token', '_method', 'image'));

        return redirect('/tank')->with('success','Tanque actualizado de forma exitosa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tank $tank)
    {
        //Validamos si es el administrador el que quiere eliminar un vehiculo
        if (! Gate::allows('edita-vehiculo')){
            abort(403);
        }

        //Hacer soft delete a la imagen
        //$file= Image::whereId($tank->image->id)->firstOrFail();
        //$file->delete($file->id);

        $tank -> delete();
        return redirect('/tank')->with('delete','Tanque eliminado de forma exitosa.');
    }
}
