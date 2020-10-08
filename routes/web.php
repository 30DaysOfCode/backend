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

Route::get('/tasks/{track}/{level}', function($track, $level) {
    $tasks = DB::table('tasks')->where('level', '=', $level)->where('track', '=', $track)->get();

    if(count($tasks) === 0) {
        return response()->json(['message' => 'No tasks found'], 404);
    }

    return response()->json($tasks);
});

Route::get('/tasks/{track}/{level}/{day}', function($track, $level, $day) {
    $tasks = DB::table('tasks')->where('level', '=', $level)->where('track', '=', $track)->where('task_day', '=', $day)->get();

    if(count($tasks) === 0) {
        return response()->json(['message' => 'No tasks found'], 404);
    }

    return response()->json($tasks);
});

