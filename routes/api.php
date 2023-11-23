<?php

use App\Http\Controllers\Api\authcontroller;
use App\Http\Controllers\Api\catogarycontroller;
use App\Http\Controllers\userauth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/userr', function (Request $request) {
    return $request->user();
});
 Route::middleware(['checkpassword','api','miltylang'])->group(function (){
 Route::post('catagory',[catogarycontroller::class,'index']);
 Route::post('get-catagory',[catogarycontroller::class,'get_catogry']);
 
 Route::post('offers',[authcontroller::class,'login']);
 Route::post('offerslogout',[authcontroller::class,'logout']);
 
});
Route::post('ee',[userauth::class,'index']);

// Route::middleware('auth.gurd:api-user')->prefix('/user')->name('admin')->group(
//     function (){
        

//         } );

// Route::middleware(['checkpassword','api','api-admin:checkadmintoken'])->group(function (){
   
//     Route::post('offers',[catogarycontroller::class,'get_catogry']);
    
//    });
