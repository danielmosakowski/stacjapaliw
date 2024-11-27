<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\BrandControllerAdmin;
use App\Http\Controllers\Api\FuelTypeController;
use App\Http\Controllers\Api\UserRewardController;
use App\Http\Controllers\Api\StationController;
use App\Http\Controllers\Api\StationFuelTypeController;
use App\Http\Controllers\Api\FuelPriceSuggestionController;
use App\Http\Controllers\Api\StationPriceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\AdminMiddleware;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// REJESTRACJA I LOGOWANIE
// Zwykly użytkownik
Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);
// Zalogowani użytkownicy
Route::group(["middleware" => "auth:sanctum"], function (){
    Route::get('userprofile', [AuthController::class, 'userprofile']);
    Route::get('logout', [AuthController::class, 'logout']);
});

// BRANDS
// Zwykly użytkownik
Route::prefix('brands')->group(function () {
    // Zwykly użytkownik
    Route::get('/', [BrandController::class, 'index']);
    Route::get('{id}', [BrandController::class, 'show']);
    //Route::delete('{id}', [BrandControllerAdmin::class, 'destroy'])->middleware(AdminMiddleware::class);
});
// Zalogowani administratorzy
Route::prefix('brands')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::post('/', [BrandControllerAdmin::class, 'store']);
    Route::put('{id}', [BrandControllerAdmin::class, 'update']);
    Route::delete('{id}', [BrandControllerAdmin::class, 'destroy']);
});

//Route::delete('/brands/{id}',[BrandControllerAdmin::class, 'destroy'])->middleware('admin');

// Zalogowani administratorzy
Route::prefix('brands')->middleware('is_admin')->group(function () {
    //Route::post('/', [BrandControllerAdmin::class, 'store']);
    //Route::put('{id}', [BrandControllerAdmin::class, 'update']);
    //Route::delete('{id}', [BrandControllerAdmin::class, 'destroy']);
});
// Zalogowani administratorzy
//Route::group(["middleware" => "is_admin"], function (){
//    Route::post('/', [BrandControllerAdmin::class, 'store']);
//    Route::put('{id}', [BrandControllerAdmin::class, 'update']);
    //Route::delete('{id}', [BrandControllerAdmin::class, 'destroy']);
//});
//});

//Route::middleware([AdminMiddleware::class])->prefix('brands')->group(function(){
 //   Route::delete('{id}', [BrandControllerAdmin::class, 'destroy']);
//});

//Route::group([
 //   "middleware" => "auth:sanctum", "is_admin"
//], function (){
//    Route::post('/', [BrandController::class, 'store']);
//    Route::put('{id}', [FuelPriceSuggestionController::class, 'update']);
//    Route::delete('{id}', [FuelPriceSuggestionController::class, 'destroy']);
//});












//Route::middleware('auth:sanctum')->group(function () {
    //Route::post('logout', [AuthController::class, 'logout']);
    //Route::get('me', [AuthController::class, 'me']);
//});

/*

Route::prefix('fuel-types')->group(function () {
    Route::get('/', [FuelTypeController::class, 'index']);
    Route::get('{id}', [FuelTypeController::class, 'show']);
});

Route::prefix('stations')->group(function () {
    Route::get('/', [StationController::class, 'index']);
    Route::get('{id}', [StationController::class, 'show']);
});

Route::prefix('station-fuel-types')->group(function () {
    Route::get('/', [StationFuelTypeController::class, 'index']);
    Route::get('{id}', [StationFuelTypeController::class, 'show']);
});

Route::prefix('station-prices')->group(function () {
    Route::get('/', [StationPriceController::class, 'index']);
    Route::get('{id}', [StationPriceController::class, 'show']);
});

// Rejestracja i logowanie
Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);

// Zalogowani użytkownicy
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);

    // Fuel Price Suggestions (Dostęp tylko dla zalogowanych użytkowników)
    Route::prefix('fuel-price-suggestions')->group(function () {
        Route::get('/', [FuelPriceSuggestionController::class, 'index']);
        Route::get('{id}', [FuelPriceSuggestionController::class, 'show']);
        Route::post('/', [FuelPriceSuggestionController::class, 'store']); // Zalogowani mogą dodawać propozycje cen
    });
});

// Admin (Dostęp do wszystkiego)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('user-rewards', UserRewardController::class);
    Route::apiResource('brands', BrandController::class)->except(['index','show']);
    Route::apiResource('fuel-types', FuelTypeController::class)->except(['index','show']);
    Route::apiResource('stations', StationController::class)->except(['index','show']);
    Route::apiResource('station-fuel-types', StationFuelTypeController::class)->except(['index','show']);
    Route::apiResource('station-prices', StationPriceController::class);
    Route::apiResource('fuel-price-suggestions', FuelPriceSuggestionController::class);
})->middleware(AdminMiddleware::class);
*/


