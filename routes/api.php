
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\PaymentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// User Routes
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
// Route::get('/users/{id}/edit', [UserController::class, 'edit']);

// Application Routes
Route::get('/applications', [ApplicationController::class, 'index']);
Route::post('/applications', [ApplicationController::class, 'store']);
Route::get('/applications/{id}', [ApplicationController::class, 'show']);
Route::put('/applications/{id}', [ApplicationController::class, 'update']);
Route::delete('/applications/{id}', [ApplicationController::class, 'destroy']);
// Route::get('/applications/{id}/edit', [ApplicationController::class, 'edit']);

// KYC Routes
Route::post('/kyc', [KYCController::class, 'store']);
Route::get('/kyc/status', [KYCController::class, 'status']);

// Payment Routes
Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);

// License Routes
Route::post('/licenses', [LicenseController::class, 'store']);
Route::get('/licenses', [LicenseController::class, 'index']);
Route::post('/licenses/create', [LicenseController::class, 'create']);

// Audit Log Route
Route::get('/audit-logs', [AuditLogController::class, 'index']);

// Institution Routes
// Language Routes
// Country Routes
