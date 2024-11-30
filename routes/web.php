<?php

use App\Http\Controllers\DetailMateriController;
use App\Http\Controllers\DetailPertemuanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ProfileController;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $data = MataKuliah::paginate(5);
    $dataMatkul = MataKuliah::all();
    return view('dashboard')->with([
        'data' => $data,
        'dataMatkul' => $dataMatkul,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/updatePass/{id}', [ProfileController::class, 'updatePass'])->name('profile.updatePass');
});

Route::resource('mataKuliah', MataKuliahController::class)->middleware('auth');
Route::resource('pertemuan', DetailPertemuanController::class)->middleware('auth');
Route::resource('detailMateri', DetailMateriController::class)->middleware('auth');

// Route::get('/{kodeMataKuliah}', [MahasiswaController::class, 'showMataKuliah'])->name('mahasiswa.showMataKuliah');
Route::get('/materi/{kodeMataKuliah}', [MahasiswaController::class, 'showMataKuliah'])
    ->name('mahasiswa.showMataKuliah');
Route::get('/mahasiswa/edit/{KodeMateri}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');

require __DIR__ . '/auth.php';
