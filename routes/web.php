<?php

use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;

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
    return to_route("Produit.index");
})->name("home");

//CRUD
Route::resource("Produit",ProduitsController::class);
//Anthentification
Route::get('/SignIn', [SignController::class, "SignIn"])->name("SignIn")->middleware("guest");;
Route::get('/SignUp', [SignController::class, "SignUp"])->name("SignUp")->middleware("guest");
Route::post("/Add_User", [SignController::class, "Add_User"])->name("AddUtilusateur");
Route::post('/Login', [SignController::class, "Login"])->name("LoginVef");
Route::get('/LogOut', [SignController::class, "LogOut"])->name("Logout");

