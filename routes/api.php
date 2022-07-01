<?php

use App\Http\Controllers\AttentionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DateController;
use App\Models\Attention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('clients/dates', [ClientController::class, 'clients_with_dates']);
Route::get('clients/dates/attentions', [ClientController::class, 'dates_with_attentions']);
Route::resource('client', ClientController::class)->names('client');
Route::resource('date', DateController::class)->names('date');
Route::resource('attention', AttentionController::class)->names('attention');