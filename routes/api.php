<?php

use App\Models\Conflict;
use App\Models\Plane;
use App\Models\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/planes', function (){
    return Plane::all();
});

Route::get('/tanks', function (){
    return Tank::all();
});

Route::get('/conflicts', function (){
    return Conflict::all();
});
