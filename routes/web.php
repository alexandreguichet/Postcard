<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostcardController;
use \App\Http\Controllers\UserController;
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
    return view('app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'api',
], function ($router) {
    Route::resource('postcards', PostcardController::class);
    Route::post('/signup', [UserController::class, 'signup']);
    Route::get('/login', [UserController::class, 'login']);
    Route::post('postcards/destroy', [PostcardController::class, 'destroy']);
    Route::post('postcards/update', [PostcardController::class, 'update']);
});
