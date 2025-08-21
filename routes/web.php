<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FormController;

// Landing page
Route::get('/', function(){ return view('landing'); });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/datatamu', [DashboardController::class,'dataTamu'])->name('datatamu');
    Route::delete('/submission/reset-nonaktif', [SubmissionController::class, 'resetNonaktif'])
    ->name('submission.resetNonaktif');

});

//login
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cetak-tamu', [PdfController::class, 'cetakTamu'])->name('cetak.tamu');

    Route::get('/submission/{id}/edit', [SubmissionController::class, 'edit'])->name('submission.edit');
    Route::put('/submission/{id}', [SubmissionController::class, 'update'])->name('submission.update');
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Data Tamu
Route::delete('/datatamu/{id}', [DashboardController::class, 'destroy'])->name('submission.destroy')->middleware('auth');

Route::get('/usermain', [SubmissionController::class, 'usermain'])->name('usermain');
//Route::delete('/usermain/{id}', [SubmissionController::class, 'destroy'])->name('submission.destroy');
Route::put('/submission/{id}/selesai', [SubmissionController::class, 'selesai'])->name('submission.selesai');
//Route::patch('/submission/{id}/selesai', [SubmissionController::class, 'selesai'])->name('submission.selesai');

Route::post('/submit', [SubmissionController::class,'store'])->name('submit');
// Submission

// routes/web.php



Route::get('/submission/{id}/edit', [SubmissionController::class, 'edit'])->name('submission.edit');
Route::put('/submission/{id}', [SubmissionController::class, 'update'])->name('submission.update');


Route::delete('/submission/delete/{id}', [SubmissionController::class, 'forceDelete'])->name('submission.forceDelete');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
