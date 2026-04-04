<?php

use App\Http\Controllers\CreaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('home');

Route::get('/contattaci', [PublicController::class, 'contactUs'])->name('contact.us');

Route::post('/contattaci/submit', [SubmitController::class, 'submit'])->name('contact.submit');

Route::get('/thank-you', [SubmitController::class, 'thankYou'])->name('thankYou.page');

Route::get('/panini', [MenuController::class, 'panini'])->name('menu');

Route::get('/panini/dettaglio/{id}', [MenuController::class, 'dettaglio'])->name('sandwich.detail');

Route::get('/crea', [CreaController::class, 'crea'])->name('crea');

Route::post('/crea', [CreaController::class, 'creaPanino'])->name('crea.panino');

Route::get('/panini/index', [CreaController::class, 'index'])->name('panini.index');