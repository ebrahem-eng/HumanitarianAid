<?php

use App\Http\Controllers\Employe\Auth\AuthController;
use App\Http\Controllers\Employe\ReconnaissanceEmploye\ReconnaissanceEmployeController;
use App\Models\ReconnaissanceToursEmployees;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Employe Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Employe routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Employe" middleware group. Make something great!
|
*/

//================================ Auth Route ========================

Route::get('employe/login', [AuthController::class, 'index'])->name('employe.show.login');

Route::post('employe/login/store', [AuthController::class, 'store'])->name('employe.store.login');

Route::post('employe/signUp', [AuthController::class, 'signUp'])->name('employe.signUp');

Route::get('employe/logout', [AuthController::class, 'logout'])->name('employe.logout');


Route::middleware(['Employe'])->name('employe.')->prefix('employe')->group(function () {

    //============================== Reconnaissance teams Employe ====================

    Route::get('/reconnaissance', [ReconnaissanceEmployeController::class, 'index'])->name('reconnaissance.index');
});
