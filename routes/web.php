<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\PropostaController;
use App\Http\Controllers\AcordoController;
use Illuminate\Support\Facades\Route;

// Adicionando middleware 'auth' para as rotas que requerem login
Route::middleware('auth')->group(function () {
    Route::get('/myaccount', [ProfileController::class, 'show'])->name('myaccount');

    Route::get('/meusartigos', [ArtigoController::class, 'select'])->name('meusartigos');

    Route::get('/announce', function () {
        return view('announcepro');
    });

    Route::post('artigo/create', [ArtigoController::class, 'create'])->name('artigo.add');
    Route::get('/editannounce/{id}', [ArtigoController::class, 'edit'])->name('artigo.edit');
    Route::patch('/atualizar/{id}', [ArtigoController::class, 'update'])->name('artigo.update');
    Route::delete('/excluir/{id}', [ArtigoController::class, 'delete'])->name('artigo.delete');

    Route::get('/mep', [PropostaController::class, 'show'])->name('mep');

    Route::get('/acceptingfinalpropose/{id}', [AcordoController::class, 'updateStatusAccept']);
    Route::get('/denyingfinalpropose/{id}', [AcordoController::class, 'updateStatusDeny']);
    Route::post('acordo/create/{id}', [AcordoController::class, 'create']);
    Route::get('validarTroca/{id}', [AcordoController::class, 'updateStatusAgree']);
    Route::get('/meusacordos', [AcordoController::class, 'show'])->name('meusacordos');

    Route::get('/validarqrcode/{id}', [AcordoController::class, 'updateStatusAgree'])->name('validarqrcode');


    Route::get('/chat/{id}', [PropostaController::class, 'showPropose'])->name('view_messages');
    Route::get('/menssagens/{id}', [PropostaController::class, 'showMessage']);
    Route::post('/creatingpropose', [MensagemController::class, 'createFirst'])->name('createFirst');
    Route::post('/sendmessage/{id}', [MensagemController::class, 'create']);
    Route::get('/acceptingpropose/{id}', [PropostaController::class, 'updateStatusChatting']);
    Route::get('/cancelingpropose/{id}', [PropostaController::class, 'updateStatusCancel'])->name('updateStatusCancel');

    Route::get('/validar', function () {
        return view('modalvalidar');
    });

    Route::post('/reportingannounce/{id}', [DenunciaController::class, 'createDenunciaArtigo']);
    Route::post('/reportinguser/{id}', [DenunciaController::class, 'createDenunciaUser']);
    Route::get('/updatestatusignore/{id}', [DenunciaController::class, 'alterar_estado'])->name('ignore');
    Route::get('/exclude/{id}', [DenunciaController::class, 'delete'])->name('exclude');
    Route::get('/inactivate/{id}', [DenunciaController::class, 'inactivate'])->name('inactivate');
    Route::get('/advertuser/{id}', [DenunciaController::class, 'strike'])->name('advert');
    Route::get('/adm', [DenunciaController::class, 'listannounces'])->name('adm');
    Route::get('/adm/chat', [DenunciaController::class, 'listchat'])->name('adm.chat.view');
    Route::get('/adm/announcements', [ArtigoController::class, 'list'])->name('adm.announces.view');
    Route::get('/adm/chat/report/{id}', [DenunciaController::class, 'chatreport'])->name('adm.chat');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/inativate', [ProfileController::class, 'inativate'])->middleware('auth')->name('profile.inativate');
});

// Rotas públicas
Route::get('/welcome', [ArtigoController::class, 'list'])->middleware(['auth', 'verified'])->name('welcome');
Route::get('/', [ArtigoController::class, 'list'])->name('index');;

Route::get('/ann', function () {
    return view('annoaccount');
});

Route::get('/search', [ArtigoController::class, 'search'])->name('search');
Route::get('/filter/{type}/{value}', [ArtigoController::class, 'filter'])->name('filter');

Route::get('/perfilanunciante/{id}', [ProfileController::class, 'viewProfileanun'])->name('viewProfileanun');

Route::post('/propose/create', [PropostaController::class, 'create'])->middleware(['auth', 'verified'])->name('propose.add');
Route::get('/viewannounce/{id_artigo}/{denun_id?}', [ArtigoController::class, 'viewAnnounce'])->name('artigo.view');

Route::get('/about', function () {
    return view('quemsomos');
})->name('about');

Route::get('/termos', function () {
    return view('termosdeuso');
})->name('termos');

require __DIR__ . '/auth.php';
