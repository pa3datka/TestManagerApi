<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 *  Routes common group
 */
Route::prefix('front')
    ->group(__DIR__ . '/ApiRoutes/TestManager/Common/commonRoutes.php');

/*
 * Routes auth group
 */
Route::prefix('auth')
   ->group(__DIR__ . '/ApiRoutes/TestManager/Auth/authRoutes.php');

/*
 * Routes user group
 */

Route::prefix('user')
    ->middleware('auth:api')
    ->group(__DIR__ . '/ApiRoutes/TestManager/User/userRoutes.php');
