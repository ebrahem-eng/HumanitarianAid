<?php

use App\Http\Controllers\Employe\Auth\AuthController;
use App\Http\Controllers\Employe\ReconnaissanceEmploye\ReconnaissanceEmployeController;

use App\Http\Controllers\Employe\CampaignStaffReceivingAid\CampaignStaffReceivingAidController;
use App\Models\CampaignStaffReceivingAid;

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

    Route::get('/reconnaissance/new/index', [ReconnaissanceEmployeController::class, 'newReconnaissanceIndex'])->name('reconnaissance.new');


    //============================== Aid Receiving Employe ==========================

    Route::get('/receivingAid', [CampaignStaffReceivingAidController::class, 'index'])->name('receivingAid.index');

    Route::get('/receivingAid/show', [CampaignStaffReceivingAidController::class, 'show'])->name('receivingAid.show');

    Route::put('reconnaissance/new/markComplete/{id}' , [ReconnaissanceEmployeController::class , 'newReconnaissanceMarkComplete'])->name('reconnaissance.new.mark.complete');

    Route::put('reconnaissance/new/reject/{id}' , [ReconnaissanceEmployeController::class , 'newReconnaissanceReject'])->name('reconnaissance.new.reject');

    Route::get('/reconnaissance/history/index', [ReconnaissanceEmployeController::class, 'historyReconnaissanceIndex'])->name('reconnaissance.history');

    Route::get('/reconnaissance/finish/index', [ReconnaissanceEmployeController::class, 'finishReconnaissanceIndex'])->name('reconnaissance.finish');

    Route::get('/reconnaissance/employe/profile/{id}', [ReconnaissanceEmployeController::class, 'reconnaissanceEmployeProfile'])->name('reconnaissance.employe.profile');

    Route::put('/reconnaissance/employe/profile/update/{id}', [ReconnaissanceEmployeController::class, 'reconnaissanceEmployeProfileUpdate'])->name('reconnaissance.employe.profile.update');


    //========================





});
