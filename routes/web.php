<?php

use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\ProductivitySheetController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('home');
// Route::view('/', 'layouts.app')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardContoller::class, 'index'])->name('dashboard');
    // Route::view('dashboard', 'dashboard')->name('dashboard');

    // Routes Dossiers
    Route::get('/dashboard/dossiers', [DossierController::class, 'index'])->name('dossiers');
    Route::get('/dashboard/dossiers/add', [DossierController::class, 'add'])->name('add.dossier');
    Route::get('/dashboard/dossiers/archive', [DossierController::class, 'archive'])->name('archive.dossier');
    Route::post('/dashboard/dossiers', [DossierController::class, 'store'])->name('store.dossier');
    Route::get('/dashboard/dossiers/{dossier}', [DossierController::class, 'show'])->name('show.dossier.view');
    Route::get('/dashboard/maj/dossiers/{dossier}', [DossierController::class, 'update_view'])->name('update.dossier.view');
    Route::put('/dashboard/dossiers/{dossier}', [DossierController::class, 'update'])->name('update.dossier');
    Route::delete('/dashboard/dossiers/{dossier}', [DossierController::class, 'destroy'])->name('delete.dossier');

    // Routes Teams
    Route::get('/dashboard/team/', [TeamController::class, 'index'])->name('team');
    Route::post('/dashboard/team/member/add', [TeamController::class, 'add_member'])->name('add.member');
    Route::delete('/dashboard/team/member/{member}', [TeamController::class, 'destroy'])->name('delete.member');

    // Routes Sheets
    Route::get('/dashboard/sheets', [ProductivitySheetController::class, 'index'])->name('sheets');
    Route::post('/dashboard/sheets', [ProductivitySheetController::class, 'store']);
    Route::get('/dashboard/sheets/{productivitySheet}', [ProductivitySheetController::class, 'show']);
    Route::put('/dashboard/sheets/{productivitySheet}', [ProductivitySheetController::class, 'update']);
    Route::delete('/dashboard/sheets/{productivitySheet}', [ProductivitySheetController::class, 'destroy']);
});

require __DIR__ . '/settings.php';
