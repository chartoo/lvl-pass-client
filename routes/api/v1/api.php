<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Prefix api/v1

Route::prefix('/user')->group(function(){
    Route::post('/login','api\v1\LoginController@login');
    Route::middleware('auth:api')->group(function(){
        Route::get('/all','api\v1\user\UserController@index');
    });
});