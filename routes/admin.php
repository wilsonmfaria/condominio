<?php

use App\Http\Controllers\CondominioController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\OrcamentoController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/process/{mes}/{ano}', [CondominioController::class, 'process'])->name('condominio.process');
    Route::resource('condominio',CondominioController::class);
    Route::resource('financeiro',FinanceiroController::class);
    Route::resource('documentos',DocumentoController::class);
    Route::resource('orcamento',OrcamentoController::class);

});
