<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManifestacaoController;

// Página inicial redireciona para o formulário de criação
Route::get('/', [ManifestacaoController::class, 'create'])->name('manifestacao.create');

// Rota para salvar uma nova manifestação
Route::post('/manifestacao', [ManifestacaoController::class, 'store'])->name('manifestacao.store');

// Rota para listar todas as manifestações (admin)
Route::get('/admin', [ManifestacaoController::class, 'index'])->name('admin.index');

// Rota para exibir uma manifestação específica
Route::get('/manifestacao/{id}', [ManifestacaoController::class, 'show'])->name('manifestacao.show');

// Rota para listar as manifestações do usuário autenticado
Route::get('/minhas-manifestacoes', [ManifestacaoController::class, 'minhasManifestacoes'])
    ->middleware('auth')
    ->name('manifestacao.minhas');

require __DIR__.'/auth.php';