<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{    
    /*
        GET|HEAD        plane .................... plane.index › PlaneController@index
        POST            plane .................... plane.store › PlaneController@store
        GET|HEAD        plane/create ........... plane.create › PlaneController@create
        GET|HEAD        plane/{plane} .............. plane.show › PlaneController@show
        PUT|PATCH       plane/{plane} .......... plane.update › PlaneController@update
        DELETE          plane/{plane} ........ plane.destroy › PlaneController@destroy
        GET|HEAD        plane/{plane}/edit ......... plane.edit › PlaneController@edit
    */
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plane::all();  
        return view('plane/planeIndex', compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plane/planeCreate');
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
            'year' => 'required',
            'country' => 'required',
            'machine_guns' => 'digits_between:0,2',
            'cannons' => 'digits_between:0,2',
            'turrets' => 'digits_between:0,2',
            'max_height_m' => 'required|digits_between:1,5',
            'crew' => 'required',
            'max_speed_kmh' => 'required|digits_between:1,4',
            'weight_kg' => 'required|digits_between:1,4',
            'category' => 'required|max:30',
            'description' => 'required|max:500',
        ]);
        //Insertar en BD
        //Usa el modelo para mandar informacion a la base de datos
        Plane::create($request->all());
        //Redirigir
        return redirect('/plane');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function show(Plane $plane)
    {
        return view('/plane/planeShow', compact('plane'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function edit(Plane $plane)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plane $plane)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plane $plane)
    {
        //
    }
}
