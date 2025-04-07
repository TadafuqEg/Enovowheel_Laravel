<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BaseGetController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CommunityController;
use App\Http\Controllers\API\AccidentController;
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



Route::post('/contact_us',[AuthController::class,'contact_us'])->name('contact_us');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/verifyOTP', [AuthController::class,'verifyOTP'])->name('verifyOTP');

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/profile/{id}', [AuthController::class,'profile'])->name('profile');
    Route::post('/edit_personal_info', [AuthController::class,'edit_personal_info'])->name('edit_personal_info');
    Route::post('/remove_account', [AuthController::class,'remove_account'])->name('remove_account');

});
