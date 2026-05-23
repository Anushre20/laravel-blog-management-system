<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home']);
Route::get('/filter', [BlogController::class, 'filter'])
    ->name('blogs.filter');

Route::get('/blog/{id}', [BlogController::class, 'show'])
    ->name('blogs.show');

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('blogs', BlogController::class)
            ->except(['show']);

});