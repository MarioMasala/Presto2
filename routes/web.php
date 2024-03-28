<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Providers\FortifyServiceProvider;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

//! ROTTA HOMEPAGE
Route::get('/', [PublicController::class,'homepage'])->name('homepage');
//!ROTTA VISUALIZZAZIONE CATEGORIE
Route::get('/categoria/{category}', [PublicController::class,'categoryShow'])->name('categoryShow');
//!ROTTA DETTAGLIO ANNUNCIO
Route::get('/dettaglio/annuncio/{announcement},', [AnnouncementController::class,'showAnnouncement'])->name('announcements.show');
//!ROTTA CREAZIONE ANNUNCI
Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');
// ! ROTTA INDEX ANNUNCI
Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');
//!ROTTA REVISORE HOME
Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('IsRevisor')->name('revisor.index');
//!ROTTA REVISORE ANNUNCIO ACCETTATO
Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->middleware('IsRevisor')->name('revisor.accept_announcement');
//!ROTTA REVISORE ANNUNCIO RIFIUTATO
Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class,'rejectAnnouncement'])->middleware('IsRevisor')->name('revisor.reject_announcement');
//! ROTTA DI DIVENTARE REVISORE
Route::get('/richiesta/revisaore',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
//! RENDI UTENTE REVISORE
Route::get('/rendi/revisore/{user}', [RevisorController::class,'makeRevisor'])->name('make.revisor');
//!ROTTA LAVORA CON NOI
Route::get('/lavora-con-noi',[PublicController::class, 'lavoraConNoi'])->name('lavora-con-noi');
//! ROTTA RICERCA ANNUNCIO
Route::get('/ricerca/annuncio', [PublicController::class,'searchAnnouncements'])->name('announcements.search');
//!ROTTA LINGUE
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');