<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'index']);
});

use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('test', function() {
    User::create([
        'name' => 'Test',
        'email' => 'test@test.test',
        'password' => Hash::make('testtest')
    ]);
});
