<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BaseGetController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GetDateController;
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
Route::get('/categories', [GetDateController::class,'getCategories'])->name('getCategories');
Route::get('/products', [GetDateController::class,'products'])->name('products');
Route::get('/product/{id}', [GetDateController::class,'product'])->name('product');

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/profile/{id}', [AuthController::class,'profile'])->name('profile');
    Route::post('/edit_personal_info', [AuthController::class,'edit_personal_info'])->name('edit_personal_info');
    Route::post('/remove_account', [AuthController::class,'remove_account'])->name('remove_account');

    Route::post('/add_address',[AuthController::class,'add_address'])->name('add_address');
    Route::post('/update_address',[AuthController::class,'update_address'])->name('update_address');
    Route::post('/delete_address',[AuthController::class,'delete_address'])->name('delete_address');
    Route::get('/all_addresses', [AuthController::class,'all_addresses'])->name('all_addresses');
    Route::get('/address/{id}', [AuthController::class,'address'])->name('address');


});
