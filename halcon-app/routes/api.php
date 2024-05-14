<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\OrderApiController;
use App\Models\Order;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('/apiorders', OrderApiController::class);
});

Route::get('test',function(){
    return response([1,2,3,4],200);   
});

Route::get('/clientorder/{idcliente}/{idorden}', [OrderApiController::class, 'orden_de_cliente']);
