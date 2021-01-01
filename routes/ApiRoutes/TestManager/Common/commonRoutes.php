<?php

use App\Http\Controllers\Api\TestManager\Common\CategoryController;
use App\Http\Controllers\Api\TestManager\Common\TestController;

// Routes list tests

Route::resource('tests', TestController::class )
    ->only('index', 'show');

//Routes list categories

Route::resource('categories', CategoryController::class)
    ->only('index');
