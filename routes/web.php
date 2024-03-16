<?php

use App\Http\Controllers\PostController;
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

//    Route::get('/' , function () {
//        return view('welcome');
//    });

Route::get("/", [PostController::class, "index"])->name("index");

Route::get("/create", [PostController::class, "create"])->name("create");

Route::get("/edit/{id}", [PostController::class, "edit"])->name("edit");

Route::post("/store", [PostController::class, "store"])->name("store");

Route::get("/destroy/{id}", [PostController::class, "destroy"])->name("destroy");

Route::post("/update/{id}", [PostController::class, "update"])->name("update");

Route::post("/search", [PostController::class, "ajax_search"])->name("ajax_search");