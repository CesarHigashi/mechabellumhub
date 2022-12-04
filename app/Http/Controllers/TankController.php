<?php

namespace App\Http\Controllers;

use App\Models\Nation;
use App\Models\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TankController extends Controller
{    
    /*
        GET|HEAD        tank .................... tank.index › TankController@index
        POST            tank .................... tank.store › TankController@store
        GET|HEAD        tank/create ........... tank.create › TankController@create
        GET|HEAD        tank/{tank} .............. tank.show › TankController@show
        PUT|PATCH       tank/{tank} .......... tank.update › TankController@update
        DELETE          tank/{tank} ........ tank.destroy › TankController@destroy
        GET|HEAD        tank/{tank}/edit ......... tank.edit › TankController@edit
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
    public function index()
    {
        $tanks = Tank::all();  
        return view('tank/tankIndex', compact('tanks'));
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
        Tank::create($request->all());
        //Redirigir
        return redirect('/tank');
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

        Tank::where('id',$tank->id)->update($request->except('_token', '_method'));

        return redirect('/tank');
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

        $tank -> delete();
        return redirect('/tank');
    }
}
