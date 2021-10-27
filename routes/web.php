<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[MyController::class, 'HomePage']);
Route::get('/Dashboard',[MyController::class, 'Dashboard']);
Route::get('/Doctors',[MyController::class, 'Doctors']);
Route::get('/welcome',[MyController::class, 'welcome']);
Route::get('/Registration',[MyController::class, 'Registration']);



Route::post('addDoctors',[MyController::class,'addDoctors']);
