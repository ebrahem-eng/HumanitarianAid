<?php

use App\Http\Controllers\Employe\AidReceivingEmploye\AidReceivingEmployeController;
use App\Http\Controllers\Employe\Auth\AuthController;
use App\Http\Controllers\Employe\DistributionAidEmploye\DistributionAidEmployeController;
use App\Http\Controllers\Employe\ReconnaissanceEmploye\ReconnaissanceEmployeController;


use App\Models\CampaignStaffReceivingAid;

use App\Models\ReconnaissanceToursEmployees;


use App\Http\Controllers\Employe\StoreKeeperEmploye\StoreKeeperEmployeController;

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

    Route::put('reconnaissance/new/markComplete/{id}' , [ReconnaissanceEmployeController::class , 'newReconnaissanceMarkComplete'])->name('reconnaissance.new.mark.complete');

    Route::put('reconnaissance/new/reject/{id}' , [ReconnaissanceEmployeController::class , 'newReconnaissanceReject'])->name('reconnaissance.new.reject');

    Route::get('/reconnaissance/history/index', [ReconnaissanceEmployeController::class, 'historyReconnaissanceIndex'])->name('reconnaissance.history');

    Route::get('/reconnaissance/finish/index', [ReconnaissanceEmployeController::class, 'finishReconnaissanceIndex'])->name('reconnaissance.finish');

    Route::get('/reconnaissance/employe/profile/{id}', [ReconnaissanceEmployeController::class, 'reconnaissanceEmployeProfile'])->name('reconnaissance.employe.profile');

    Route::put('/reconnaissance/employe/profile/update/{id}', [ReconnaissanceEmployeController::class, 'reconnaissanceEmployeProfileUpdate'])->name('reconnaissance.employe.profile.update');


    //============================== Aid Receiving Employe ==========================

    Route::get('/receivingAid', [AidReceivingEmployeController::class, 'index'])->name('receivingAid.index');

    Route::get('/receivingAid/new', [AidReceivingEmployeController::class, 'newReceivingAid'])->name('receivingAid.new');

    Route::get('/receivingAid/create/aid', [AidReceivingEmployeController::class, 'createAid'])->name('receivingAid.create.aid');

    Route::post('/receivingAid/store/{id}', [AidReceivingEmployeController::class, 'storeAidForReceivingAid'])->name('receivingAid.store.aid.receivingAid');

    Route::get('/receivingAid/history', [AidReceivingEmployeController::class, 'historyReceivingAid'])->name('receivingAid.history');

    Route::get('/receivingAid/aid/history/{id}', [AidReceivingEmployeController::class, 'historyAidForReceivingAid'])->name('receivingAid.history.aidForReceivingAid');

    Route::get('/receivingAid/employe/profile/{id}', [AidReceivingEmployeController::class, 'aidReceivingEmployeProfile'])->name('receivingAid.employe.profile');

    Route::put('/receivingAid/employe/profile/update/{id}', [AidReceivingEmployeController::class, 'aidReceivingEmployeProfileUpdate'])->name('receivingAid.employe.profile.update');

    Route::get('/receivingAid/donor/create', [AidReceivingEmployeController::class, 'createDonor'])->name('receivingAid.donor.create');

    Route::post('/receivingAid/donor/store', [AidReceivingEmployeController::class, 'storeDonor'])->name('receivingAid.donor.store');

    //============================== Store Keeper Employe ==========================

    Route::get('/storeKeeper', [StoreKeeperEmployeController::class, 'index'])->name('storeKeeper.index');

    Route::get('/storeKeeper/employe/profile/{id}', [StoreKeeperEmployeController::class, 'storeKeeperEmployeProfile'])->name('storeKeeper.employe.profile');

    Route::put('/storeKeeper/employe/profile/update/{id}', [StoreKeeperEmployeController::class, 'storeKeeperEmployeProfileUpdate'])->name('storeKeeper.employe.profile.update');

    Route::get('/storeKeeper/aid/index', [StoreKeeperEmployeController::class, 'aidIndex'])->name('storeKeeper.aid.index');

    Route::delete('/storeKeeper/aid/delete/{id}', [StoreKeeperEmployeController::class, 'aidDelete'])->name('storeKeeper.aid.delete');

    Route::get('/storeKeeper/aid/edit/{id}', [StoreKeeperEmployeController::class, 'aidEdit'])->name('storeKeeper.aid.edit');

    Route::put('/storeKeeper/aid/update/{id}', [StoreKeeperEmployeController::class, 'aidUpdate'])->name('storeKeeper.aid.update');

    Route::get('/storeKeeper/AidDistributionCampaigns', [StoreKeeperEmployeController::class, 'aidDistributionCampaignsIndex'])->name('storeKeeper.aidDistributionCampaigns.index');

    Route::get('/storeKeeper/AidDistributionCampaigns/aid/{id}', [StoreKeeperEmployeController::class, 'aidDistributionCampaignsAid'])->name('storeKeeper.aidDistributionCampaigns.aid');

    Route::put('/storeKeeper/AidDistributionCampaigns/aid/accept/{id}', [StoreKeeperEmployeController::class, 'aidDistributionCampaignsAidAccept'])->name('storeKeeper.aidDistributionCampaigns.aid.accept');

    Route::put('/storeKeeper/AidDistributionCampaigns/aid/reject/{id}', [StoreKeeperEmployeController::class, 'aidDistributionCampaignsAidReject'])->name('storeKeeper.aidDistributionCampaigns.aid.reject');

    Route::get('/storeKeeper/AidDistributionCampaigns/history', [StoreKeeperEmployeController::class, 'aidDistributionCampaignsHistory'])->name('storeKeeper.aidDistributionCampaigns.history');

    Route::get('/storeKeeper/AidReceiving', [StoreKeeperEmployeController::class, 'aidReceivingIndex'])->name('storeKeeper.aidReceiving.index');

    Route::get('/storeKeeper/AidReceiving/aid/{id}', [StoreKeeperEmployeController::class, 'aidReceivingAid'])->name('storeKeeper.aidReceiving.aid');

    Route::put('/storeKeeper/AidReceiving/aid/accept/{id}', [StoreKeeperEmployeController::class, 'aidReceivingAidAccept'])->name('storeKeeper.aidReceiving.aid.accept');

    Route::put('/storeKeeper/AidReceiving/reject/aid/{id}', [StoreKeeperEmployeController::class, 'aidReceivingAidReject'])->name('storeKeeper.aidReceiving.aid.reject');
    

    //====================================== Distribution Aid Employe =================================

    Route::get('/DistributionAid', [DistributionAidEmployeController::class, 'index'])->name('distributionAid.index');

    Route::get('/DistributionAid/new', [DistributionAidEmployeController::class, 'newDistributionAid'])->name('distributionAid.aidDistributionCampaigns.new');

    Route::get('/DistributionAid/new/aid/{id}', [DistributionAidEmployeController::class, 'aidDistributionCampaignsAid'])->name('distributionAid.aidDistributionCampaigns.aid');

    Route::put('/DistributionAid/new/aid/acceptDelivery{id}', [DistributionAidEmployeController::class, 'aidDistributionCampaignsAidAcceptDelivery'])->name('distributionAid.aidDistributionCampaigns.aid.accept.delivery');

    Route::put('/DistributionAid/new/aid/acceptDelivery/all/{id}', [DistributionAidEmployeController::class, 'aidDistributionCampaignsAidAcceptDeliveryAll'])->name('distributionAid.aidDistributionCampaigns.aid.accept.delivery.all');

    Route::put('/DistributionAid/new/aid/returnAid/{id}', [DistributionAidEmployeController::class, 'aidDistributionCampaignsAidReturnedAid'])->name('distributionAid.aidDistributionCampaigns.aid.return.aid');
    
    Route::put('/DistributionAid/new/aid/acceptReceipt/{id}', [DistributionAidEmployeController::class, 'aidDistributionCampaignsAcceptReceipt'])->name('distributionAid.aidDistributionCampaigns.aid.accept.receipt');

    Route::post('/DistributionAid/new/aid/delivery/association/{id}', [DistributionAidEmployeController::class, 'aidDistributionCampaignsDeliveryToAssociation'])->name('distributionAid.aidDistributionCampaigns.aid.delivery.association');

    Route::get('/DistributionAid/association/new/request', [DistributionAidEmployeController::class, 'associationNewRequest'])->name('distributionAid.association.new.request');

    Route::delete('/DistributionAid/association/new/request/delete/{id}', [DistributionAidEmployeController::class, 'associationDeleteNewRequest'])->name('distributionAid.association.delete.new.request');

    Route::get('/DistributionAid/association/history/request', [DistributionAidEmployeController::class, 'associationHistoryRequest'])->name('distributionAid.association.history.request');

    Route::get('/DistributionAid/profile/{id}', [DistributionAidEmployeController::class, 'showProfile'])->name('distributionAid.profile.show');

    Route::put('/DistributionAid/profile/update/{id}', [DistributionAidEmployeController::class, 'updateProfile'])->name('distributionAid.employe.update.profile');
});
