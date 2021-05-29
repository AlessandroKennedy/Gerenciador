<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\MaitenanceController;
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
    return view('auth/login');
});

Route::prefix('dashboard')->group(function () {
    
  
    Route::get('/', [MaitenanceController::class, 'show'])->middleware(['auth'])->name('dashboard');

    Route::get('/vehicle/new', [VehiclesController::class, 'create'])->middleware(['auth'])->name('createVehicle');
    Route::post('vehicle/new', [VehiclesController::class, 'store'])->middleware(['auth'])->name('storeVehicle');
    Route::get('/vehicle/show', [VehiclesController::class, 'show'])->middleware(['auth'])->name('showVehicles');
    Route::get('/vehicle/delete/{id}', [VehiclesController::class, 'delete'])->middleware(['auth'])->name('deleteVehicle');


    Route::get('maintenance/new', [MaitenanceController::class, 'create'])->middleware(['auth'])->name('createMaintenance');
    Route::post('maintenance/new', [MaitenanceController::class, 'store'])->middleware(['auth'])->name('storeMaintenance');

    Route::get('maintenance/edit/{id}', [MaitenanceController::class, 'edit'])->middleware(['auth'])->name('editMaintenance');
    Route::post('maintenance/edit/{id}', [MaitenanceController::class, 'editSave'])->middleware(['auth'])->name('editSaveMaintenance');
    Route::get('maintenance/delete/{id}', [MaitenanceController::class, 'delete'])->middleware(['auth'])->name('deleteMaintenance');
});




require __DIR__.'/auth.php';
