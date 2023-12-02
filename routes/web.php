<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeesController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
    Route::get('/employees/{employee}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
    
    Route::get('/api', [EmployeesController::class, 'getEmployeesApi'])->name('api');

    // no se usa update porque usamos livewire
    // Route::put('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');

    // no uso destroy porque se elimina el empleado desde livewire
    // Route::delete('/employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
   
});

require __DIR__ . '/auth.php';
