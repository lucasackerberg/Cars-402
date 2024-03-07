<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarController;

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
    return view('index');
});

Route::post('/login', LoginController::class);

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::post('/createCar', [CarController::class, 'create']);

Route::put('/completeCar/{car}', [CarController::class, 'completeCar'])->name('completeCar');
Route::get('completedCars', [CarController::class, 'completedCars'])->name('completedCars');
Route::get('addnewcar', [CarController::class, 'CreateCar'])->name('CreateCar');
Route::put('/assignMechanic/{car}', [CarController::class, 'assignMechanic'])->name('assignMechanic');