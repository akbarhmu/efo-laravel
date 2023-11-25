<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request;
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
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerUser']);
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Link verifikasi dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/pemilu', [PageController::class, 'pemilu'])->name('pemilu');
    Route::get('/tujuan-pemilu', [PageController::class, 'tujuanPemilu'])->name('tujuan');

    Route::get('/data-diri', [PageController::class, 'dataDiri'])->name('data-diri');

    Route::prefix('/pindah-memilih')->group(function () {
        Route::get('/', [PengajuanController::class, 'urgensiPage'])->name('urgensi');
        Route::get('/syarat-ketentuan', [PengajuanController::class, 'syaratKetentuanPage'])->name('syarat-ketentuan');
        Route::get('/tata-cara', [PengajuanController::class, 'tataCaraPage'])->name('tata-cara');
        Route::get('/pengajuan', [PengajuanController::class, 'pengajuanPage'])->name('pengajuan');
    });
});
