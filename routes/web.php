<?php

use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\DossierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductivitySheetController;

Route::redirect('/', '/login')->name('home');
// Route::view('/', 'layouts.app')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardContoller::class, 'index']);
    // Route::view('dashboard', 'dashboard')->name('dashboard');

    // Routes Dossiers
    Route::get('/dashboard/dossiers', [DossierController::class, 'index']);
    Route::post('/dashboard/dossiers', [DossierController::class, 'store']);
    Route::get('/dashboard/dossiers/{dossier}', [DossierController::class, 'show']);
    Route::put('/dashboard/dossiers/{dossier}', [DossierController::class, 'update']);
    Route::delete('/dashboard/dossiers/{dossier}', [DossierController::class, 'destroy']);

    // Routes Sheets
    Route::get('/dashboard/sheets', [ProductivitySheetController::class, 'index']);
    Route::post('/dashboard/sheets', [ProductivitySheetController::class, 'store']);
    Route::get('/dashboard/sheets/{productivitySheet}', [ProductivitySheetController::class, 'show']);
    Route::put('/dashboard/sheets/{productivitySheet}', [ProductivitySheetController::class, 'update']);
    Route::delete('/dashboard/sheets/{productivitySheet}', [ProductivitySheetController::class, 'destroy']);
});

require __DIR__.'/settings.php';
