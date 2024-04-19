<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Association\AssociationController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\WebSiteController;
use App\Models\Employee;
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

    Route::get('/association/index' , [AssociationController::class , 'index'])->name('association.index');
    Route::get('/association/create' , [AssociationController::class , 'create'])->name('association.create');
    Route::post('/association/store' , [AssociationController::class , 'store'])->name('association.store');
    Route::get('/association/edit/{id}' , [AssociationController::class , 'edit'])->name('association.edit');
    Route::put('/association/update/{id}' , [AssociationController::class , 'update'])->name('association.update');
    Route::get('/association/edit/location/{id}' , [AssociationController::class , 'editLocation'])->name('association.edit.location');
    Route::put('/association/update/location/{id}' , [AssociationController::class , 'updateLocation'])->name('association.update.location');
    Route::get('/association/changePassword/page/{id}' , [AssociationController::class , 'changePasswordPage'])->name('association.changePassword.page');
    Route::put('/association/changePassword/{id}' , [AssociationController::class , 'changePassword'])->name('association.changePassword');
    Route::get('/association/softDelete/{id}' , [AssociationController::class , 'softDelete'])->name('association.soft.delete');
    Route::get('/association/archive' , [AssociationController::class , 'archive'])->name('association.archive');
    Route::get('/association/restore/{id}' , [AssociationController::class , 'restore'])->name('association.restore');
    Route::get('/association/fourceDelete/{id}' , [AssociationController::class , 'fourceDelete'])->name('association.fource.delete');


    //======================== Employee Route ======================
    Route::get('/employee/index' , [EmployeeController::class , 'index'])->name('employee.index');
    Route::get('/employee/create' , [EmployeeController::class , 'create'])->name('employee.create');
    Route::post('/employee/store' , [EmployeeController::class , 'store'])->name('employee.store');
    Route::get('/employee/edit/{id}' , [EmployeeController::class , 'edit'])->name('employee.edit');
    Route::put('/employee/update/{id}' , [EmployeeController::class , 'update'])->name('employee.update');
    Route::get('/employee/changePassword/page/{id}' , [EmployeeController::class , 'changePasswordPage'])->name('employee.changePassword.page');
    Route::put('/employee/changePassword/{id}' , [EmployeeController::class , 'changePassword'])->name('employee.changePassword');
    Route::get('/employee/softDelete/{id}' , [EmployeeController::class , 'softDelete'])->name('employee.soft.delete');
    Route::get('/employee/archive' , [EmployeeController::class , 'archive'])->name('employee.archive');
    Route::get('/employee/forceDelete/{id}' , [EmployeeController::class , 'forceDelete'])->name('employee.force.delete');
    Route::get('/employee/restore/{id}' , [EmployeeController::class , 'restore'])->name('employee.restore');


});

//=================Admin Atuh section ==============

Route::get('admin/login', [AuthController::class, 'index'])->name('admin.show.login');
Route::post('admin/login/store', [AuthController::class, 'store'])->name('admin.store.login');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


