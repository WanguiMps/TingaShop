<?php

use App\Http\Controllers\Client;
use App\Http\Controllers\Supplier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //client's routes
    Route::post('create-client', [Client\AuthClientController::class, 'newClient'])->name('client.new-client');
    Route::get('create-client', [Client\AuthClientController::class, 'index'])->name('client.create-client');
    Route::get('/client/dashboard', [Client\DashboardController::class, 'index'])->name('client.dashboard');

    //supplier's routes
    Route::get('/supplier/dashboard', [Supplier\DashboardController::class, 'index'])->name('supplier.dashboard');
    Route::post('create-supplier', [Supplier\AuthSupplierController::class, 'newSupplier'])->name('supplier.new-supplier');
    Route::get('create-supplier', [Supplier\AuthSupplierController::class, 'index'])->name('supplier.create-supplier');
    Route::resource('sup-fertilizer', Supplier\FertilizerController::class);
});



require __DIR__ . '/auth.php';
