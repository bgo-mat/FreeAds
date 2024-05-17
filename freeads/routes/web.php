<?php


use Illuminate\Support\Facades\Route;

Route::get('email/verify/{id}/{hash}', [\App\Http\Controllers\AuthController::class, 'verify'])->name('verification.verify');

Route::get('/', [App\Http\Controllers\IndexController::class, 'showIndex'])->name('landing.page');
Route::post('/signup', [App\Http\Controllers\UserController::class, 'create']);
Route::post('/log', [App\Http\Controllers\AuthController::class, 'connect']);



Route::middleware(['auth','verified'])->group(function () {
    Route::get('/accueil', [App\Http\Controllers\IndexController::class, 'showAccueil'])->name('user.accueil');
    Route::get('/profil', [App\Http\Controllers\IndexController::class, 'showProfil']);
    Route::post('/delete', [App\Http\Controllers\UserController::class, 'destroy']);
    Route::put('/update', [App\Http\Controllers\UserController::class, 'updateUser']);
    Route::get('/infoProfil', [App\Http\Controllers\UserController::class, 'read']);
    Route::get('/newAnnonce', [App\Http\Controllers\IndexController::class, 'showNewAnnonce']);
    Route::post('/createArticle', [App\Http\Controllers\ArticlesController::class, 'createArticle']);
    Route::get('/showAllArticles', [App\Http\Controllers\ArticlesController::class, 'read'])->name('main.article');
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'deconnect']);
    Route::post('/deleteArticle/{id}', [App\Http\Controllers\ArticlesController::class, 'deleteArticle']);
    Route::get('/editArticleView/{id}', [App\Http\Controllers\ArticlesController::class, 'editArticleView']);
    Route::post('/editArticle/{id}', [App\Http\Controllers\ArticlesController::class, 'editArticle']);
    Route::get('/filter', [App\Http\Controllers\ArticlesController::class, 'filter']);
    Route::get('/messages', [App\Http\Controllers\IndexController::class, 'showMessagerie'])->name('main.messagerie');
    Route::get('/newMessage', [App\Http\Controllers\IndexController::class, 'showNewMessage']);
    Route::get('/newMessage2/{dest}', [App\Http\Controllers\IndexController::class, 'showNewMessage2']);
    Route::post('/sendMessage', [App\Http\Controllers\MessagesController::class, 'sendMessage']);
    Route::get('/openMessage/{id}', [App\Http\Controllers\MessagesController::class, 'openMessage']);
});
