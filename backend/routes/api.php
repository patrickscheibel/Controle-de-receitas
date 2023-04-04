<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** RevenueController */
Route::get('revenue_index', [RevenueController::class, 'index']);
Route::post('revenue_store', [RevenueController::class, 'store']);
Route::post('revenue_update', [RevenueController::class, 'update']);
Route::delete('revenue_delete', [RevenueController::class, 'delete']);
Route::post('revenue_find_by_code', [RevenueController::class, 'findByCode']);

/** IngredientController */
Route::get('ingredient_index', [IngredientController::class, 'index']);
Route::post('ingredient_store', [IngredientController::class, 'store']);
Route::post('ingredient_update', [IngredientController::class, 'update']);
Route::delete('ingredient_delete', [IngredientController::class, 'delete']);

/** ItemController */
Route::get('item_index', [ItemController::class, 'index']);
Route::post('item_store', [ItemController::class, 'store']);
Route::post('item_update', [ItemController::class, 'update']);
Route::delete('item_delete', [ItemController::class, 'delete']);

/** UserController */
Route::get('user_index', [UserController::class, 'index']);
Route::post('user_store', [UserController::class, 'store']);
Route::post('user_update', [UserController::class, 'update']);
Route::delete('user_delete', [UserController::class, 'delete']);
Route::post('user_login', [UserController::class, 'login']);