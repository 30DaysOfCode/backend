<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SubmissionController;


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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
    Route::post('/verify-email', [UserController::class, 'verifyEmail']);

    Route::group([
//        'middleware' => 'api',
        'prefix' => 'auth',
    ], function ($router) {
        Route::post('/signup', [RegisterController::class, 'register']);
        Route::post('/login', [LoginController::class, 'login']);
        Route::post('logout', [UserController::class, 'logout']);
    });

    

});

Route::group(['middleware' => 'jwt.verify'], function () {

    Route::prefix('v1')->group(function () {
        Route::group([ //submissions
            'prefix' => 'submission',
        ], function ($router) {
            Route::get('/list', SubmissionController::class, 'index');
            Route::post('/create', SubmissionController::class, 'store');
            Route::post('/edit', SubmissionController::class, 'update');
            Route::get('/view', SubmissionController::class, 'show');
        });
    });
    
}); // All other route and core features are in here
