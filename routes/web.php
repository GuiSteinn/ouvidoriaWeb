<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManifestacaoController;

// Página inicial: formulário de manifestação
Route::get('/', [ManifestacaoController::class, 'create'])->name('manifestacao.create');

// Envio do formulário
Route::post('/enviar', [ManifestacaoController::class, 'store'])->name('manifestacao.store');

// Página de listagem para o admin
Route::get('/admin', [ManifestacaoController::class, 'index'])->name('admin.index');

// Página de detalhes de cada manifestação
Route::get('/admin/{id}', [ManifestacaoController::class, 'show'])->name('admin.show');


