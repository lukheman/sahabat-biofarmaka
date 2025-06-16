<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () { */
/*     return view('welcome'); */
/* }); */

Route::get('/', \App\Livewire\Landing::class)->name('landing');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/profile', \App\Livewire\Profile::class)->name('profile');
    Route::get('/logout', \App\Http\Controllers\LogoutController::class)->name('logout');

    Route::get('/penyakit', \App\Livewire\PenyakitPage::class)->name('penyakit');
    Route::get('/gejala', \App\Livewire\GejalaPage::class)->name('gejala');
    Route::get('/basis-pengetahuan', \App\Livewire\BasisPengetahuanPage::class)->name('basis-pengetahuan');
});


Route::get('/login', \App\Livewire\Login::class)->middleware('guest')->name('login');
Route::get('/diagnosis', \App\Livewire\Diagnosis\Index::class)->name('diagnosis');
