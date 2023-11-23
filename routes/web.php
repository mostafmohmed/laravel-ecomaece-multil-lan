<?php

use App\Http\Controllers\Admin\logincontroller;
use App\Http\Controllers\Admin\maincatagory;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\checkoutcontroller;
use App\Http\Controllers\launguecontroller;
use App\Http\Controllers\loginvendorcontroller;
use App\Http\Controllers\produectcontroller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\view;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return
   view('admin.dachpord');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/login', [logincontroller::class, 'getLogin'])->name('loginpageadmin');
Route::post('admin', [logincontroller::class, 'login'])->name('loginn');
Route::controller(launguecontroller::class)-> prefix('laungue')-> group(function () {
    Route::get('/', 'index')->name('laungue.index');
    Route::get('/create', 'showform')->name('laungue.create');
    Route::post('/store', 'create')->name('laungue.post');

    Route::get('/edite/{id}', 'edite')->name('laungue.edite');
    Route::put('/updata{id}', 'updata')->name('laungue.updata');
  
});
// Route::get('/hoggg',function (){
// return  view('frontt.home');
// });
Route::resource('admain/catugory',maincatagory::class);
Route::get('admain/vendor', [SearchController::class, 'index'])
    ->name('vendor.search');
Route::post('admain/vendor', [SearchController::class, 'search']);
Route::put('admain/vendor{id}', [SearchController::class, 'update'])->name('vendor.update');
Route::get('admain/vendor/create', [SearchController::class, 'create'])
    ->name('vendor.create');
    Route::get('admain/vendor/edite{id}', [SearchController::class, 'edite'])
    ->name('vendor.edite');
    Route::post('vendor/store', [SearchController::class, 'store'])
    ->name('vendor.store');

    Route::resource('/produect',produectcontroller::class);


    Route::get('vendor', [loginvendorcontroller::class, 'getLogin']);
    Route::get('vendor', [loginvendorcontroller::class, 'getLogin']);
    Route::post('vendor/login', [loginvendorcontroller::class, 'login'])->name('login.vendor');
    Route::get('ee{prottect_id}', [view::class, 'get'])->name('ee');
    Route::get('bestsallary', [view::class, 'bestsallry']);
    Route::get('cart{id}',[cartcontroller::class,'get'])->name('cart');
    Route::get('checkout',[checkoutcontroller::class,'checkout']);
    Route::get('checkoutt',[checkoutcontroller::class,'palcher'])->name('check');
    
Auth::routes();
Route::get('my-order',[Usercontroller::class,'index']);
Route::get('view-order{id}',[Usercontroller::class,'show'])->name('view');