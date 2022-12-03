<?php

namespace App\Http\Controllers;

use App\Models\Conflict;
use App\Models\Nation;
use Illuminate\Http\Request;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conflict = Conflict::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nation = Nation::all();
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function show(Conflict $conflict)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function edit(Conflict $conflict)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conflict  $conflict
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conflict $conflict)
    {
        //
    }
}
