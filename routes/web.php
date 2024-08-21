<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DenunciartigoController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\PropostaController;
use App\Models\Artigo;
use App\Models\Proposta;
use Illuminate\Support\Facades\Route;

// Adicionando middleware 'auth' para as rotas que requerem login
Route::middleware('auth')->group(function () {
    Route::get('/myaccount', function () {
        return view('myaccount');
    });

    Route::get('/meusartigos', [ArtigoController::class, 'select']);

    Route::get('/announce', function () {
        return view('announcepro');
    });

    Route::post('artigo/create', [ArtigoController::class, 'create'])->name('artigo.add');
    Route::get('/editannounce/{id}', [ArtigoController::class, 'edit'])->name('artigo.edit');
    Route::patch('/atualizar/{id}', [ArtigoController::class, 'update'])->name('artigo.update');
    Route::delete('/excluir/{id}', [ArtigoController::class, 'delete'])->name('artigo.delete');

    Route::get('/mep', [PropostaController::class, 'show']);

    Route::get('/meusacordos', function () {
        return view('meusacordos');
    });

    Route::get('/chat/{id}', [PropostaController::class, 'showMessage'])->name('view_messages');
    Route::post('/creatingpropose', [MensagemController::class, 'createFirst'])->name('createFirst');
    Route::post('/sendmessage/{id}', [MensagemController::class, 'create']);
    Route::get('/cancelingpropose/{id}', [PropostaController::class, 'updateStatusCancel'])->name('updateStatusCancel');

    Route::get('/validar', function () {
        return view('modalvalidar');
    });

    Route::post('/reportingannounce/{id}', [DenunciaController::class, 'createDenunciaArtigo']);
    Route::post('/reportinguser/{id}', [DenunciaController::class, 'createDenunciaUser']);

    Route::get('/search', [ArtigoController::class, 'search'])->name('search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/inativate', [ProfileController::class, 'inativate'])->middleware('auth')->name('profile.inativate');
});

// Rotas públicas
Route::get('/welcome', [ArtigoController::class, 'list'])->middleware(['auth', 'verified'])->name('welcome');
Route::get('/', [ArtigoController::class, 'list']);

Route::get('/ann', function () {
    return view('annoaccount');
});

Route::get('/perfilanunciante/{id}', [ProfileController::class, 'viewProfileanun'])->name('viewProfileanun');

Route::post('/propose/create', [PropostaController::class, 'create'])->middleware(['auth', 'verified'])->name('propose.add');
Route::get('/viewannounce/{id_artigo}', [ArtigoController::class, 'viewAnnounce'])->name('artigo.view');

Route::get('/about', function () {
    return view('quemsomos');
});

require __DIR__.'/auth.php';