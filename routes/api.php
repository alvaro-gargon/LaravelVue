<?php

use App\Http\Controllers\Api\BD\UsuarioController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\PostController as V1PostController;
use App\Http\Controllers\Api\V2\PostController as V2PostController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return ["message"=>"Hello Laravel API"];
});

// Route::get('/posts',[PostController::class, 'index'])->name('post.index');
// Route::post('/posts',[PostController::class, 'store'])->name('post.store');
// Route::get('/posts/{id}',[PostController::class, 'show'])->name('post.show');

Route::prefix('v1')->group(function(){
    Route::apiResource('posts', V1PostController::class);
});

Route::prefix('v2')->group(function(){
    Route::apiResource('posts', V2PostController::class);
});

//Usando apiResource no se le pueden cambiar el nombre a los metodos en la clase del controlador
//si quiero tener nombres especificos usar las rutas manuales (las comentadas arriba)
Route::prefix('bd')->group(function(){
    Route::apiResource('usuario', UsuarioController::class);
});