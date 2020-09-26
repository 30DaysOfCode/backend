<?php

use App\Models\Task;
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

Route::get('/tasks/{track}/{level}', function($track, $level) {
    $tasks = DB::table('tasks')->where('level', '=', $level)->where('track', '=', $track)->get();

    return response()->json($tasks, 200);
});
