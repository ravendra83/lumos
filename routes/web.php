<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchoutController;
use App\Http\Controllers\DarController;
use App\Http\Controllers\ContenttypeController;
use App\Http\Controllers\ProductController;



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
Route::post('/dashboard/holiday/save', [AdminController::class,'saveholiday']);
Route::get('/dashboard/compoff', [AdminController::class,'compoff']);
Route::post('/dashboard/compoff/save', [AdminController::class,'savecompoff']);
Route::get('/dashboard/compoff/delete/{id}', [AdminController::class,'deletecompoff']);
Route::get('/dashboard/watchout', [WatchoutController::class,'watchout']);
Route::post('/dashboard/watchout/save', [WatchoutController::class,'watchoutsave']);
Route::get('/dashboard/dar/approved', [DarController::class,'approveddarlist']);
Route::post('/dashboard/dar/save', [DarController::class,'darsave']);
Route::get('/dashboard/dar/notapproved', [DarController::class,'notapproveddarlist']);
Route::get('/dashboard/dar/delete/{id}', [DarController::class,'deletedar']);
Route::get('/dashboard/contenttype', [ContenttypeController::class,'contentlist']);
Route::post('/dashboard/contenttype', [ContenttypeController::class,'contentInsert']);
Route::get('/dashboard/contenttype/{id}',[ContenttypeController::class, 'contentDelete']);
Route::get('/dashboard/product', [ProductController::class,'productlist']);
Route::post('/dashboard/product', [ProductController::class,'productInsert']);
Route::get('/dashboard/product/{id}', [ProductController::class,'productDelete']);
Route::post('/dashboard/reviewtask/updatedate', [AdminController::class,'updatedate']);
Route::post('/dashboard/reviewtask/updatewc', [AdminController::class,'updatewc']);
});
