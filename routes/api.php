<?php

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
/*
Utilizando apiResource para criar rotas de acordo com os metodos do Controller
api/user => user.index
api/user/{user} => user.show
*/
Route::apiResource('user', '\App\Http\Controllers\UserController')->middleware('jwt.auth');
Route::apiResource('product', '\App\Http\Controllers\ProductController')->middleware('jwt.auth');


//Rotas para logar e gerar o token
Route::post('login', '\App\Http\Controllers\AuthController@login');
Route::post('logout', '\App\Http\Controllers\AuthController@logout');
