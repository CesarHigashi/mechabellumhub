<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Nation;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlaneController extends Controller
{    
    /*
        GET|HEAD        plane .......................................... plane.index › PlaneController@index
        POST            plane .......................................... plane.store › PlaneController@store
        GET|HEAD        plane/create ................................. plane.create › PlaneController@create
        GET|HEAD        plane/restore/{id} ......................... plane.restore › PlaneController@restore
        GET|HEAD        plane/restoreAll .................... plane.restore.all › PlaneController@restoreAll
        GET|HEAD        plane/{plane} .................................... plane.show › PlaneController@show
        PUT|PATCH       plane/{plane} ................................ plane.update › PlaneController@update
        DELETE          plane/{plane} .............................. plane.destroy › PlaneController@destroy
        GET|HEAD        plane/{plane}/edit ............................... plane.edit › PlaneController@edit
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
        //$planes = Plane::all();
        $planes = Plane::with('nations:id,name')->get();

        /* Recupera informacion de los deletes */
        if($request->has('view_deleted')){
            $planes = Plane::with('nations:id,name')->onlyTrashed()->get();
        }

        return view('plane/planeIndex', compact('planes'));
    }

    /* Metodos de restore */
    public function restore($id)
    {
        //Validamos si es el administrador el que quiere editar un vehiculo
        if (! Gate::allows('edita-vehiculo')){
            abort(403);
        }

        Plane::withTrashed()->find($id)->restore();
        return redirect('/plane');
    }

    public function restoreAll()
    {
        //Validamos si es el administrador el que quiere editar un vehiculo
        if (! Gate::allows('edita-vehiculo')){
            abort(403);
        }
        
        Plane::onlyTrashed()->restore();
        return redirect('/plane');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Consulta las naciones y las manda con compact a la vista
        $nations = Nation::all();
        return view('plane/planeCreate', compact('nations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //Validar
        $request->validate([
            'name' => 'required|max:50',
            'year' => 'digits:4|required|integer|numeric',
            //'country' => 'required',
            'nations_id' => 'required|max:25',
            'machine_guns' => 'digits_between:0,2|integer|numeric',
            'cannons' => 'digits_between:0,2|integer|numeric',
            'turrets' => 'digits_between:0,2|integer|numeric',
            'max_height_m' => 'required|digits_between:1,5|integer|numeric',
            'crew' => 'required|integer|numeric',
            'max_speed_kmh' => 'required|digits_between:1,4|integer|numeric',
            'weight_kg' => 'required|digits_between:1,4|integer|numeric',
            'category' => 'required|max:30',
            'description' => 'required|max:500',
        ]);

        //Sentencia para unir la info de nacion con el avion
        //$request->merge(['nations_id' => Nation::id()]);

        //Insertar en BD
        //Usa el modelo para mandar informacion a la base de datos
        $plane=Plane::create($request->all());

        //Subida de archivo
        if ($request->file('image')->isValid()){
            $location = $request->image->store('public');
            $image = new Image();
            $image->location = $location;
            $image->original_name = $request->image->getClientOriginalName();
            $image->mime='';

            $plane->image()->save($image);
        }

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
        //Validamos si es el administrador el que quiere editar un vehiculo
        if (! Gate::allows('edita-vehiculo')){
            abort(403);
        }
        
        //Consulta las naciones y las manda con compact a la vista
        $nations = Nation::all();
        return view('/plane/planeEdit', compact('plane', 'nations'));
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
        $request->validate([
            'name' => 'required|max:50',
            'year' => 'digits:4|required|integer|numeric',
            //'country' => 'required',
            'nations_id' => 'required|max:25',
            'machine_guns' => 'digits_between:0,2|integer|numeric',
            'cannons' => 'digits_between:0,2|integer|numeric',
            'turrets' => 'digits_between:0,2|integer|numeric',
            'max_height_m' => 'required|digits_between:1,5|integer|numeric',
            'crew' => 'required|integer|numeric',
            'max_speed_kmh' => 'required|digits_between:1,4|integer|numeric',
            'weight_kg' => 'required|digits_between:1,4|integer|numeric',
            'category' => 'required|max:30',
            'description' => 'required|max:500',
        ]);

        //Borra archivo viejo
        $file = Image::whereId($plane->image->id)->firstOrFail();
        unlink(public_path(Storage::url($file->location)));
        $file->forceDelete($file->id);

        //Subida de archivo
        if($request->file('image')->isValid()){
            $location = $request->image->store('public');
            $image = new Image();
            $image->location = $location;
            $image->original_name = $request->image->getClientOriginalName();
            $image->mime='';

            $plane->image()->save($image);
        }

        Plane::where('id',$plane->id)->update($request->except('_token', '_method', 'image'));

        return redirect('/plane');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plane $plane)
    {
        //Validamos si es el administrador el que quiere eliminar un vehiculo
        if (! Gate::allows('edita-vehiculo')){
            abort(403);
        }

        //Hace soft delete a la imagen
        $file= Image::whereId($plane->image->id)->firstOrFail();
        //unlink(public_path(Storage::url($file->location)));
        $file->delete($file->id);

        $plane -> delete();
        return redirect('/plane');
    }
}
