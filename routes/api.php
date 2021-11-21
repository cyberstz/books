<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;

use App\Http\Controllers\API\WarehouseController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\BookWarehouseController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\OrderController;

Route::post('register', [UserController::class, 'register']);

Route::get('warehouses', [WarehouseController::class, 'index']);
Route::get('warehouse/{warehouse}', [WarehouseController::class, 'show']);
Route::get('warehouse/{warehouse}/books', [WarehouseController::class, 'showBooks']);

Route::get('books', [BookController::class, 'index']);
Route::get('book/{book}', [BookController::class, 'show']);

Route::get('clients', [ClientController::class, 'index']);
Route::get('client/{client}', [ClientController::class, 'show']);
Route::get('client/{client}/orders', [ClientController::class, 'showOrders']);

Route::get('orders', [OrderController::class, 'index']);
Route::get('order/{order}', [OrderController::class, 'show']);


Route::post('warehouse', [WarehouseController::class, 'store']);
Route::post('book', [BookController::class, 'store']);
Route::post('bookwarehouse', [BookWarehouseController::class, 'store']);
Route::post('client', [ClientController::class, 'store']);
Route::post('order', [OrderController::class, 'store']);