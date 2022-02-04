<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserContrller;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/students', function () {
//     return "ALL student information API";
// });

// Route::get('/students',[StudentController::class,'index'])->name('students');
// Route::get('/students/{id}',[StudentController::class,'show'])->name('show');
// Route::post('/students',[StudentController::class,'store'])->name('show');
// Route::put('/students/{id}',[StudentController::class,'update'])->name('show');
// Route::delete('students/{id}',[StudentController::class,'destroy']);
// Route::get('students/search/{city}',[StudentController::class,'search']);

//Procted Routes


Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserContrller::class,'register']);

Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/students',[StudentController::class,'index'])->name('students');
Route::get('/students/{id}',[StudentController::class,'show'])->name('show');
Route::post('/students',[StudentController::class,'store'])->name('show');
Route::put('/students/{id}',[StudentController::class,'update'])->name('show');
Route::delete('students/{id}',[StudentController::class,'destroy']);
Route::get('students/search/{city}',[StudentController::class,'search']);
});
Route::middleware('auth:sanctum')->post('/logout',[UserController::class,'logout']);






