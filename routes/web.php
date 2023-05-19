<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiEmailController;
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


// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){ 
//         Route::get('/', function()
//             {
//                 return View('signup');
//             });//...
    
// });
    


Route::group(['middleware'=>'guest'],function(){
    Route::get('/signup',[AuthController::class,'signup'])->name('signup');
    Route::post('/signup',[AuthController::class,'signupPost'])->name('signup');
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'loginPost'])->name('login');
    Route::get('/sendEmail',[ApiEmailController::class,'sendEmail'])->name('sendEmail');
});

Route::group(['middleware'=>'auth'],function(){
Route::get('/home',[HomeController::class,'index']);
Route::delete('/logout',[AuthController::class,'logout'])->name('logout');
});