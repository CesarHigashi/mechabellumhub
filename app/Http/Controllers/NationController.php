<?php

namespace App\Http\Controllers;

use App\Models\Nation;
use Illuminate\Http\Request;

/* Rutas */
/*
  GET|HEAD        nation ........................... nation.index › NationController@index
  POST            nation ........................... nation.store › NationController@store
  GET|HEAD        nation/create .................. nation.create › NationController@create
  GET|HEAD        nation/{nation} .................... nation.show › NationController@show
  PUT|PATCH       nation/{nation} ................ nation.update › NationController@update
  DELETE          nation/{nation} .............. nation.destroy › NationController@destroy
  GET|HEAD        nation/{nation}/edit ............... nation.edit › NationController@edit
 */

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(Nation $nation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function edit(Nation $nation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nation $nation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nation $nation)
    {
        //
    }
}
