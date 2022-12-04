<?php

namespace App\Http\Controllers;

use App\Models\Conflict;
use App\Models\Nation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/* Rutas */
/*
  GET|HEAD        conflict ..................... conflict.index › ConflictController@index
  POST            conflict ..................... conflict.store › ConflictController@store
  GET|HEAD        conflict/create ............ conflict.create › ConflictController@create
  GET|HEAD        conflict/{conflict} ............ conflict.show › ConflictController@show
  PUT|PATCH       conflict/{conflict} ........ conflict.update › ConflictController@update
  DELETE          conflict/{conflict} ...... conflict.destroy › ConflictController@destroy
  GET|HEAD        conflict/{conflict}/edit ....... conflict.edit › ConflictController@edit 
 */

class ConflictController extends Controller
{
    
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
        $conflicts = Conflict::all();
        return view('conflict/conflictIndex', compact('conflicts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Validamos si es el administrador el que quiere crear un conflicto
        if (! Gate::allows('edita-nacionconflicto')){
            abort(403);
        }
        
        $nations = Nation::all();
        return view('conflict/conflictCreate', compact('nations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'start_year' => 'required|digits:4|integer|numeric',
            'end_year' => 'digits:4|integer|numeric|nullable',
            'description' => 'required|max:500',
        ]);

        $conflict = Conflict::create($request->all());

        $conflict->nations()->attach($request->nation_id);

        return redirect('/conflict');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function show(Conflict $conflict)
    {
        return view('/conflict/conflictShow', compact('conflict'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function edit(Conflict $conflict)
    {
        //Validamos si es el administrador el que quiere editar un conflicto
        if (! Gate::allows('edita-nacionconflicto')){
            abort(403);
        }
        
        $nations = Nation::all();
        return view('/conflict/conflictEdit', compact('conflict', 'nations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conflict $conflict)
    {
        $request->validate([
            'name' => 'required|max:50',
            'start_year' => 'required|digits:4|integer|numeric',
            'end_year' => 'digits:4|integer|numeric|nullable',
            'description' => 'required|max:500',
        ]);
        
        Conflict::where('id', $conflict->id)->update($request->except('_token', '_method', 'nation_id'));

        $conflict->nations()->sync($request->nation_id);

        return redirect('/conflict');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conflict $conflict)
    {
        //Validamos si es el administrador el que quiere eliminar un conflicto
        if (! Gate::allows('edita-nacionconflicto')){
            abort(403);
        }

        $conflict->nations()->detach();
        $conflict->delete();
        return redirect('/conflict');
    }
}
