<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BrandController;
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
    Route::get('/userprofile', [AuthController::class, 'userprofile']);
//    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/authenticated',[AuthController::class,'checkUserStatus']);
});


//Route::get('authenticated',[AuthController::class,'checkUserStatus']);
//Route::post('/logout', [AuthController::class, 'logout']);


// BRANDS
// Niezalogowany użytkownik
Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('{id}', [BrandController::class, 'show']);
});
// Zalogowany administrator
Route::prefix('brands')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::post('/', [BrandController::class, 'store']);
    Route::put('{id}', [BrandController::class, 'update']);
    Route::delete('{id}', [BrandController::class, 'destroy']);
});

//FUELPRICESUGGESTIONS
// Zalogowany użytkownik
Route::prefix('fuel-price-suggestions')->middleware("auth:sanctum")->group(function () {
    Route::get('/', [FuelPriceSuggestionController::class, 'index']);
    Route::get('{id}', [FuelPriceSuggestionController::class, 'show']);
    Route::post('/', [FuelPriceSuggestionController::class, 'store']);
});
// Zalogowany administrator
Route::prefix('fuel-price-suggestions')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::put('{id}', [FuelPriceSuggestionController::class, 'update']);
    Route::delete('{id}', [FuelPriceSuggestionController::class, 'destroy']);
});

//FUELTYPES
// Niezalogowany użytkownik
Route::prefix('fuel-types')->group(function () {
    Route::get('/', [FuelTypeController::class, 'index']);
    Route::get('{id}', [FuelTypeController::class, 'show']);
});
// Zalogowany administrator
Route::prefix('fuel-types')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::post('/', [FuelTypeController::class, 'store']);
    Route::put('{id}', [FuelTypeController::class, 'update']);
    Route::delete('{id}', [FuelTypeController::class, 'destroy']);
});

// STATIONS
// Niezalogowany użytkownik
Route::prefix('stations')->group(function () {
    Route::get('/', [StationController::class, 'index']);
    Route::get('{id}', [StationController::class, 'show']);
});
// Zalogowany administrator
Route::prefix('stations')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::post('/', [StationController::class, 'store']);
    Route::put('{id}', [StationController::class, 'update']);
    Route::delete('{id}', [StationController::class, 'destroy']);
});

// STATIONFUELTYPES
// Niezalogowany użytkownik
Route::prefix('station-fuel-types')->group(function () {
    Route::get('/', [StationFuelTypeController::class, 'index']);
    Route::get('{id}', [StationFuelTypeController::class, 'show']);
});
// Zalogowany administrator
Route::prefix('station-fuel-types')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::post('/', [StationFuelTypeController::class, 'store']);
    Route::put('{id}', [StationFuelTypeController::class, 'update']);
    Route::delete('{id}', [StationFuelTypeController::class, 'destroy']);
});

// STATIONPRICES
// Niezalogowany użytkownik
Route::prefix('station-prices')->group(function () {
    Route::get('/', [StationPriceController::class, 'index']);
    Route::get('{id}', [StationPriceController::class, 'show']);
});
// Zalogowany administrator
Route::prefix('station-prices')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::post('/', [StationPriceController::class, 'store']);
    Route::put('{id}', [StationPriceController::class, 'update']);
    Route::delete('{id}', [StationPriceController::class, 'destroy']);
});

// USERS
// Zalogowany administrator
Route::prefix('users')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('{id}', [UserController::class, 'update']);
    Route::delete('{id}', [UserController::class, 'destroy']);
});

// USERREWARDS
// Niezalogowany użytkownik
Route::prefix('user-rewards')->group(function () {
    Route::get('/', [UserRewardController::class, 'index']);
    Route::get('/user/{userId}', [UserRewardController::class, 'showUserRewards']);
    Route::get('{id}', [UserRewardController::class, 'show']);
});
// Zalogowany administrator
Route::prefix('user-rewards')->middleware(["auth:sanctum", "admin"])->group(function () {
    Route::post('/', [UserRewardController::class, 'store']);
    Route::put('{id}', [UserRewardController::class, 'update']);
    Route::delete('{id}', [UserRewardController::class, 'destroy']);
});


//admin
Route::get('/admin', function () {
    return response()->json(['message' => 'Welcome to Admin Panel'], 200);
})->middleware(['auth:sanctum', 'admin']);
