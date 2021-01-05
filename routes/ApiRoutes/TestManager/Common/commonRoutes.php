<?php

use App\Http\Controllers\Api\TestManager\Common\CategoryController;
use App\Http\Controllers\Api\TestManager\Common\QuestionController;
use App\Http\Controllers\Api\TestManager\Common\ResultController;
use App\Http\Controllers\Api\TestManager\Common\TestController;

// Routes list tests
Route::get('tests/category/{categoryId}', [TestController::class, 'getAllTestsCategory']);
Route::resource('tests', TestController::class )
    ->only('index', 'show');

// Routes group results
Route::put('results/calculation', [ResultController::class, 'calculationResult']);

// Routes group Questions
Route::get('questions/{testId}', [QuestionController::class, 'showQuestionsBelongTest']);

//Routes list categories
Route::resource('categories', CategoryController::class)
    ->only('index');
