<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/departamento',[App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamento.index');
Route::get('/departamento/{departamento}',[App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamento.index');
Route::get('/departamento/create',[App\Http\Controllers\DepartamentoController::class, 'create'])->name('departamento.create');
Route::post('/departamento',[App\Http\Controllers\DepartamentoController::class, 'store'])->name('departamento.store');
Route::get('/departamento/{departamento}/edit',[App\Http\Controllers\DepartamentoController::class, 'edit'])->name('departamento.edit');
Route::delete('/departamento/{departamento}',[App\Http\Controllers\DepartamentoController::class, 'destroy'])->name('departamento.destroy');
Route::put('/departamento/{departamento}',[App\Http\Controllers\DepartamentoController::class, 'update'])->name('departamento.update');

Route::get('/empresas',[App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa.index');
Route::get('/empresas/{empresa}',[App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa.index');
//Route::get('/empresas/create',[App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.create');
Route::post('/empresas',[App\Http\Controllers\EmpresaController::class, 'store'])->name('empresa.store');
Route::get('/empresas/{empresa}/edit',[App\Http\Controllers\EmpresaController::class, 'edit'])->name('empresa.edit');
Route::delete('/empresas/{empresa}',[App\Http\Controllers\EmpresaController::class, 'destroy'])->name('empresa.destroy');
Route::put('/empresas/{empresa}',[App\Http\Controllers\EmpresaController::class, 'update'])->name('empresa.update');

Route::get('/empleado',[App\Http\Controllers\EmpleadosController::class, 'index'])->name('empleado.index');
Route::get('/empleado/{empleado}',[App\Http\Controllers\EmpleadosController::class, 'index'])->name('empleado.index');
//Route::get('/empleado/create',[App\Http\Controllers\EmpleadosController::class, 'create'])->name('empleado.create');
Route::post('/empleado',[App\Http\Controllers\EmpleadosController::class, 'store'])->name('empleado.store');
Route::get('/empleado/{empleado}/edit',[App\Http\Controllers\EmpleadosController::class, 'edit'])->name('empleado.edit');
Route::delete('/empleado/{empleado}',[App\Http\Controllers\EmpleadosController::class, 'destroy'])->name('empleado.destroy');
Route::put('/empleado/{empleado}',[App\Http\Controllers\EmpleadosController::class, 'update'])->name('empleado.update');


Route::get('/empleados/index',[App\Http\Controllers\CrearEmpleadoController::class, 'index'])->name('crear');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

