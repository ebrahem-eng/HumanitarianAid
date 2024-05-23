<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\WebSiteController;
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

Route::get('/', [WebSiteController::class , 'index'])->name('website.index');
Route::get('/about', [WebSiteController::class , 'about'])->name('website.about');
Route::get('/projects', [WebSiteController::class , 'projects'])->name('website.projects');
Route::get('/events', [WebSiteController::class , 'events'])->name('website.events');
Route::get('/service', [WebSiteController::class , 'service'])->name('website.service');
Route::get('/donate', [WebSiteController::class , 'donate'])->name('website.donate');
Route::get('/team', [WebSiteController::class , 'team'])->name('website.team');
Route::get('/donors', [WebSiteController::class , 'donors'])->name('website.donors');
Route::get('/contact', [WebSiteController::class , 'contact'])->name('website.contact');
Route::get('/website/login', [WebSiteController::class , 'login'])->name('website.login');
Route::get('/website/signUp', [WebSiteController::class , 'signUp'])->name('website.signUp');
Route::get('/404', [WebSiteController::class , 'notFound'])->name('website.notFound');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
