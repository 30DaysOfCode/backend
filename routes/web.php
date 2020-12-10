<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks/{track}/{level}', 'TasksController@getTask');

Route::get('/tasks/{track}/{level}/{day}', 'TasksController@getTaskByDay');

Route::get('/tasks/{track}/{level}', 'TasksController@getTask');

Route::get('/tasks/{track}/{level}/{day}', 'TasksController@getTaskByDay');
