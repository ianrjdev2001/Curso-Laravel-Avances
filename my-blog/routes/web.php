<?php

use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::view('nosotros','nosotros')->name('nosotros');

Route::get('contactanos', [ContactanosController::class,'index'])->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class,'store'])->name('contactanos.store');

/*Route::get('/', function () {
    return view('welcome');
    
});*/

Route::controller(CursoController::class)->group(function(){
    Route::get('cursos','index');
    Route::get('cursos/create','create');
    Route::get('cursos/{curso}','show');    
});

/*
Route::get('cursos', [CursoController::class,'index'])->name('cursos.index');

Route::get('cursos/create', [CursoController::class,'create'])->name('cursos.create');

Route::post('cursos', [CursoController::class,'store'])->name('cursos.store');

Route::get('cursos/{id}', [CursoController::class,'show'])->name('cursos.show');

Route::get('cursos/{curso}/edit', [CursoController::class,'edit'])->name('cursos.edit');

Route::put('cursos/{curso}', [CursoController::class,'update'])->name('cursos.update');

Route::delete('cursos/{curso}', [CursoController::class,'destroy'])->name('cursos.destroy');
*/
Route::resource('asignaturas', CursoController::class)->parameters(['asignaturas' => 'curso'])->names('cursos');
/*Route::get('cursos/{curso}/{categoria?}', function ($curso,$categoria = null) {
    
    if($categoria) 
    {
        return "Bienvenido a curso: $curso de la categoria $categoria";
    }
    else
    {
        return "Bienvenido a curso: $curso";
    }

});*/
