<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
})->name('login');
Route::get('/logout',[LoginController::class,'logout']);
Route::post('/login',[LoginController::class,'authenticate']);

Route::prefix('/admin')->middleware(['auth','admincheck'])->group(function(){ 

Route::get('/dashboard/newprojects',[AdminController::class,'dashboard']);
Route::get('/dashboard/todayprojects',[AdminController::class,'todayproject']);
Route::get('/dashboard/weekprojects',[AdminController::class,'weekproject']);
Route::get('/dashboard/beyondprojects',[AdminController::class,'beyondproject']);
Route::get('/dashboard/pendingprojects',[AdminController::class,'pendingproject']);
Route::get('/dashboard/users',[UserController::class,'userlist']);

});
