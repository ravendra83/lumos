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
Route::get('/dashboard/user/add',[UserController::class,'userform']);
Route::post('/dashboard/user/save',[UserController::class,'saveuser'])->name('saveuser');
Route::get('/dashboard/user/gettl/{lan}',[UserController::class,'getTl']);
Route::get('/dashboard/user/delete/{id}', [UserController::class,'deleteuser']);
Route::get('/dashboard/user/edit/{id}', [UserController::class,'edituser']);
Route::post('/dashboard/user/update/{id}',[UserController::class,'update'])->name('updateuser');
Route::get('/dashboard/holiday', [AdminController::class,'holidaycalander']);
Route::get('/dashboard/holiday/delete/{id}', [AdminController::class,'deleteholiday']);


});
