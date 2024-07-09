<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Services\Pix;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Api\PixApi,
    Api\CreditCartApi,
    Api\AuthenticateApi,
};


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('/authenticate', [AuthenticateApi::class, 'authenticateUser']);
    Route::post('/pix', [PixApi::class, 'createTransactionPix']);
    Route::post('/webhook-pix', [PixApi::class, 'webHook']);
    Route::post('/pay-pix-in-admin', [Pix::class, 'createTransferPix']);
});

Route::post('/webhook-pix', [Pix::class, 'webHook']);
