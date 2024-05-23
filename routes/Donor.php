<?php

use App\Http\Controllers\Donor\Auth\AuthController;
use App\Http\Controllers\Donor\Donate\DonateController;
use App\Http\Controllers\Donor\DonorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Donor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/

//================================ Auth Route ========================

Route::get('donor/login', [AuthController::class, 'index'])->name('donor.show.login');

Route::post('donor/login/store', [AuthController::class, 'store'])->name('donor.store.login');

Route::post('donor/signUp' , [AuthController::class , 'signUp'])->name('donor.signUp');

Route::get('donor/logout', [AuthController::class, 'logout'])->name('donor.logout');


Route::middleware(['Donor'])->name('donor.')->prefix('donor')->group(function () {
    Route::get('/', [DonorController::class, 'index'])->name('index');

    //=========================== Donate Route =======================

    Route::get('/donate' , [DonateController::class , 'index'])->name('donate.index');

    Route::post('/donate/medical' , [DonateController::class , 'donateMedical'])->name('donate.medical');

    Route::post('/donate/clothing' , [DonateController::class , 'donateClothing'])->name('donate.clothing');
});