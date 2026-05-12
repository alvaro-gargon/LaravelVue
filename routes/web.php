<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});
/*Metodo añadido para controlar el movimiento entre paginas sin que ocurra errores.
La pagina siempre se dirige a la vista principal independientemente de lo que ponga en la URI
*/
Route::get('/{any}', function () {
    return view('app'); 
})->where('any', '.*');

require __DIR__.'/settings.php';
