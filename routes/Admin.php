<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Association\AssociationController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\AidRecieptCampaigns\AidRecieptCampaignsController;
use App\Http\Controllers\Admin\Donor\DonorController;
use App\Http\Controllers\Admin\DonorDonationRequests\ClothingDonationRequestsController;
use App\Http\Controllers\Admin\DonorDonationRequests\FoodDonationRequestsController;
use App\Http\Controllers\Admin\DonorDonationRequests\MedicalSuppliesDonationRequestsController;
use App\Http\Controllers\Admin\DonorDonationRequests\RequestsForMoneyDonationsController;
use App\Http\Controllers\Admin\ReconnaissanceTours\ReconnaissanceToursController;
use App\Http\Controllers\Admin\RequestsToIdentifyThoseInNeed\RequestsToIdentifyThoseInNeedController;
use App\Http\Controllers\Admin\Vehicles\VehiclesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/


Route::middleware(['Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    //===================== Associations Route ====================

    Route::get('/association/index', [AssociationController::class, 'index'])->name('association.index');

    Route::get('/association/create', [AssociationController::class, 'create'])->name('association.create');

    Route::post('/association/store', [AssociationController::class, 'store'])->name('association.store');

    Route::get('/association/edit/{id}', [AssociationController::class, 'edit'])->name('association.edit');

    Route::put('/association/update/{id}', [AssociationController::class, 'update'])->name('association.update');

    Route::get('/association/edit/location/{id}', [AssociationController::class, 'editLocation'])->name('association.edit.location');

    Route::put('/association/update/location/{id}', [AssociationController::class, 'updateLocation'])->name('association.update.location');

    Route::get('/association/changePassword/page/{id}', [AssociationController::class, 'changePasswordPage'])->name('association.changePassword.page');

    Route::put('/association/changePassword/{id}', [AssociationController::class, 'changePassword'])->name('association.changePassword');

    Route::get('/association/softDelete/{id}', [AssociationController::class, 'softDelete'])->name('association.soft.delete');

    Route::get('/association/archive', [AssociationController::class, 'archive'])->name('association.archive');

    Route::get('/association/restore/{id}', [AssociationController::class, 'restore'])->name('association.restore');

    Route::get('/association/fourceDelete/{id}', [AssociationController::class, 'fourceDelete'])->name('association.fource.delete');


    //======================== Employee Route ======================

    Route::get('/employee/index', [EmployeeController::class, 'index'])->name('employee.index');

    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');

    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');

    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');

    Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');

    Route::get('/employee/changePassword/page/{id}', [EmployeeController::class, 'changePasswordPage'])->name('employee.changePassword.page');

    Route::put('/employee/changePassword/{id}', [EmployeeController::class, 'changePassword'])->name('employee.changePassword');

    Route::get('/employee/softDelete/{id}', [EmployeeController::class, 'softDelete'])->name('employee.soft.delete');

    Route::get('/employee/archive', [EmployeeController::class, 'archive'])->name('employee.archive');

    Route::get('/employee/forceDelete/{id}', [EmployeeController::class, 'forceDelete'])->name('employee.force.delete');

    Route::get('/employee/restore/{id}', [EmployeeController::class, 'restore'])->name('employee.restore');


    //===================== Aid Reciept Campaigns Rote ===============

    Route::get('/AidRecieptCampaigns/index', [AidRecieptCampaignsController::class, 'index'])->name('AidRecieptCampaigns.index');

    Route::get('/AidRecieptCampaigns/create', [AidRecieptCampaignsController::class, 'create'])->name('AidRecieptCampaigns.create');

    Route::post('/AidRecieptCampaigns/store', [AidRecieptCampaignsController::class, 'store'])->name('AidRecieptCampaigns.store');

    Route::post('/AidRecieptCampaigns/store/employe', [AidRecieptCampaignsController::class, 'storeEmploye'])->name('AidRecieptCampaigns.store.employe');

    Route::post('/AidRecieptCampaigns/store/vehicles', [AidRecieptCampaignsController::class, 'storeVehicles'])->name('AidRecieptCampaigns.store.vehicles');

    Route::post('/AidRecieptCampaigns/store/aidRecieptCampaigns', [AidRecieptCampaignsController::class, 'storeAidRecieptCampaigns'])->name('AidRecieptCampaigns.store.aidRecieptCampaigns');

    Route::get('/AidRecieptCampaigns/edit/{id}', [AidRecieptCampaignsController::class, 'edit'])->name('AidRecieptCampaigns.edit');

    Route::put('/AidRecieptCampaigns/update/{id}', [AidRecieptCampaignsController::class, 'update'])->name('AidRecieptCampaigns.update');

    Route::get('/AidRecieptCampaigns/arhive', [AidRecieptCampaignsController::class, 'archive'])->name('AidRecieptCampaigns.archive');

    Route::delete('/AidRecieptCampaigns/softDelete/{id}', [AidRecieptCampaignsController::class, 'softDelete'])->name('AidRecieptCampaigns.softDelete');

    Route::delete('/AidRecieptCampaigns/forceDelete/{id}', [AidRecieptCampaignsController::class, 'forceDelete'])->name('AidRecieptCampaigns.forceDelete');

    Route::get('/AidRecieptCampaigns/restore/{id}', [AidRecieptCampaignsController::class, 'restore'])->name('AidRecieptCampaigns.restore');


    //=====================  Vehicle Route ===============

    Route::get('/vehicles/index', [VehiclesController::class, 'index'])->name('vehicles.index');

    //=====================  Donor Route ===============

    Route::get('/donor/index', [DonorController::class, 'index'])->name('donor.index');

    Route::get('/donor/create', [DonorController::class, 'create'])->name('donor.create');

    Route::post('/donor/store', [DonorController::class, 'store'])->name('donor.store');

    Route::get('/donor/edit/{id}', [DonorController::class, 'edit'])->name('donor.edit');

    Route::put('/donor/update/{id}', [DonorController::class, 'update'])->name('donor.update');

    Route::get('/donor/archive', [DonorController::class, 'archive'])->name('donor.archive');

    Route::delete('/donor/softDelete/{id}', [DonorController::class, 'softDelete'])->name('donor.softDelete');

    Route::delete('/donor/forceDelete/{id}', [DonorController::class, 'forceDelete'])->name('donor.forceDelete');

    Route::get('/donor/restore/{id}', [DonorController::class, 'restore'])->name('donor.restore');


    //=====================  Donor Donation Requests Route ===============

    Route::get('/donorDonationRequests/MedicalSuppliesDonationRequests/index', [MedicalSuppliesDonationRequestsController::class, 'index'])->name('donorDonationRequests.MedicalSuppliesDonationRequests.index');

    Route::delete('/donorDonationRequests/MedicalSuppliesDonationRequests/delete/{id}', [MedicalSuppliesDonationRequestsController::class, 'delete'])->name('donorDonationRequests.MedicalSuppliesDonationRequests.delete');


    Route::get('/donorDonationRequests/ClothingDonationRequests/index', [ClothingDonationRequestsController::class, 'index'])->name('donorDonationRequests.ClothingDonationRequests.index');

    Route::delete('/donorDonationRequests/ClothingDonationRequests/delete/{id}', [ClothingDonationRequestsController::class, 'delete'])->name('donorDonationRequests.ClothingDonationRequests.delete');


    Route::get('/donorDonationRequests/FoodDonationRequests/index', [FoodDonationRequestsController::class, 'index'])->name('donorDonationRequests.FoodDonationRequests.index');

    Route::delete('/donorDonationRequests/FoodDonationRequests/delete/{id}', [FoodDonationRequestsController::class, 'delete'])->name('donorDonationRequests.FoodDonationRequests.delete');


    Route::get('/donorDonationRequests/RequestsForMoneyDonation/index', [RequestsForMoneyDonationsController::class, 'index'])->name('donorDonationRequests.RequestsForMoneyDonation.index');

    Route::delete('/donorDonationRequests/RequestsForMoneyDonation/delete/{id}', [RequestsForMoneyDonationsController::class, 'delete'])->name('donorDonationRequests.RequestsForMoneyDonation.delete');

     //=====================  Requests To Identify Those In Need Route ===============

     Route::get('/identifyThoseInNeed/index', [RequestsToIdentifyThoseInNeedController::class, 'index'])->name('IdentifyThoseInNeed.index');

     Route::put('/identifyThoseInNeed/seen/{id}', [RequestsToIdentifyThoseInNeedController::class, 'seen'])->name('IdentifyThoseInNeed.seen');

     Route::get('/identifyThoseInNeed/archive', [RequestsToIdentifyThoseInNeedController::class, 'archive'])->name('IdentifyThoseInNeed.archive');

     Route::delete('/identifyThoseInNeed/softDelete/{id}', [RequestsToIdentifyThoseInNeedController::class, 'softDelete'])->name('IdentifyThoseInNeed.softDelete');

     Route::delete('/identifyThoseInNeed/forceDelete/{id}', [RequestsToIdentifyThoseInNeedController::class, 'forceDelete'])->name('IdentifyThoseInNeed.forceDelete');

     Route::get('/identifyThoseInNeed/restore/{id}', [RequestsToIdentifyThoseInNeedController::class, 'restore'])->name('IdentifyThoseInNeed.restore');


      //===================== Reconnaissance Tours Rote ===============

    Route::get('/ReconnaissanceTours/index', [ReconnaissanceToursController::class, 'index'])->name('ReconnaissanceTours.index');

    Route::get('/ReconnaissanceTours/create', [ReconnaissanceToursController::class, 'create'])->name('ReconnaissanceTours.create');

    Route::post('/ReconnaissanceTours/store', [ReconnaissanceToursController::class, 'store'])->name('ReconnaissanceTours.store');

    Route::post('/ReconnaissanceTours/store/employe', [ReconnaissanceToursController::class, 'storeEmploye'])->name('ReconnaissanceTours.store.employe');

    Route::post('/ReconnaissanceTours/store/vehicles', [ReconnaissanceToursController::class, 'storeVehicles'])->name('ReconnaissanceTours.store.vehicles');

    Route::post('/ReconnaissanceTours/store/reconnaissanceTours', [ReconnaissanceToursController::class, 'storeAidRecieptCampaigns'])->name('ReconnaissanceTours.store.reconnaissanceTours');

    Route::get('/ReconnaissanceTours/edit/{id}', [ReconnaissanceToursController::class, 'edit'])->name('ReconnaissanceTours.edit');

    Route::put('/ReconnaissanceTours/update/{id}', [ReconnaissanceToursController::class, 'update'])->name('ReconnaissanceTours.update');

    Route::get('/ReconnaissanceTours/arhive', [ReconnaissanceToursController::class, 'archive'])->name('ReconnaissanceTours.archive');

    Route::delete('/ReconnaissanceTours/softDelete/{id}', [ReconnaissanceToursController::class, 'softDelete'])->name('ReconnaissanceTours.softDelete');

    Route::delete('/ReconnaissanceTours/forceDelete/{id}', [ReconnaissanceToursController::class, 'forceDelete'])->name('ReconnaissanceTours.forceDelete');

    Route::get('/ReconnaissanceTours/restore/{id}', [ReconnaissanceToursController::class, 'restore'])->name('ReconnaissanceTours.restore');
});

//=================Admin Atuh section ==============

Route::get('admin/login', [AuthController::class, 'index'])->name('admin.show.login');

Route::post('admin/login/store', [AuthController::class, 'store'])->name('admin.store.login');

Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
