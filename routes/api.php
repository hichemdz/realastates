<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tetsController;
use App\Http\Controllers\Admin\Authantication;
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





Route::group(['prefix'=>'/admin'],function (){
      
      Route::group(['middleware'=> ['auth:api_admin']],function () {

             // users 

      	     Route::group(['prefix'=> '/user'],function () {
                 
                 

      	     });


             
      });

      Route::post('/login',[Authantication::class,'login']);
 

});





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
