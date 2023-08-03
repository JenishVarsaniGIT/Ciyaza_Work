<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\citycontroller;
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
    return view('welcome');
});

// Route::get('/state', function () {
//     return view('home');
// });

// state all Route
Route::get('/stateList',[HomeController::class, 'index'])->name('home');
Route::get('/stateadd', [HomeController::class, 'create'])->name('create');
Route::post('/addstate',[HomeController::class, 'store'])->name('store');
Route::get('/editstate/{id}',[HomeController::class,'edit']);
Route::put('/update-data/{id}',[HomeController::class,'update']);
Route::get('/delete/{id}', [HomeController::class, 'delete']);

// city all Route
Route::get('/cityList',[citycontroller::class,'index'])->name('home');
Route::get('/cityadd', [citycontroller::class,'create'])->name('create');
Route::post('/addcity',[citycontroller::class,'store'])->name('store');
Route::get('/editcity/{id}',[citycontroller::class,'edit']);
Route::put('/update-city-data/{id}',[citycontroller::class,'update']);
Route::get('/Delete/{id}',[citycontroller::class,'remove']);
