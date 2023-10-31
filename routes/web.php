<?php

use App\Http\Controllers\ProfileController;
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

/*
//retornar solo una vista donde no hacemos ninguna accion

Route::get('/', function () {
    return 'vista principal';
});
*/

/*
Route::get('/chirps/{chirp?}', function ($chirp = null) {
    
    if ($chirp === '2') {
        return redirect('/servicios');
    }else{
        return 'Hola, Esta es la vista de chirps y este es el valor del parametro = ' . $chirp;
    }
});

//llamado a la vista con un nombre, quitamos "?" para que sea obligario el parametro y el valor por de
Route::get('/chirps/{chirp}', function ($chirp) {
    
    if ($chirp === '2') {
        //return redirect()->route('servicios.index');
        return to_route('servicios.index');
    }

    return 'Hola, Esta es la vista de chirps y este es el valor del parametro = ' . $chirp;
    
});

Route::get();
Route::post();
Route::put();
Route::delete();
Route::view();
*/

Route::middleware(['auth', 'verified'])->group(function () {
    /*
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    */
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::view('/dashboard', 'dashboard')->name('dashboard');
         
    Route::get('/chirps', function () {
        //return 'Hola Mundo, vista -'.'chirps';
        return view('chirps.index');
    })->name('chirps.index');

    Route::post('/chirps', function () {
       $message = request('message');
        
    })->name('chirps.index');

});

require __DIR__.'/auth.php'; 

