<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PartitionController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

// Auth
Route::middleware(['auth:sanctum'])->group(function () {
    // category
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category' , 'AllCategory');
        Route::get('/get/category/{id}' , 'GetCategory');
   });

   // Partitions
   Route::controller(PartitionController::class)->group(function(){
        Route::get('/all/partition' , 'AllPartition');
        Route::get('/get/partition/{id}' , 'GetPartition');
    });

    // Items
    Route::controller(ItemController::class)->group(function(){
        Route::get('/all/item' , 'AllItem');
        Route::get('/get/item/{id}' , 'GetItem');
    });

});

// Admin
Route::middleware(['auth:sanctum','role:admin'])->group(function () {
    // category
    Route::controller(CategoryController::class)->group(function(){
        Route::post('/store/category' , 'StoreCategory');
        Route::post('/update/category' , 'UpdateCategory');
        Route::delete('/delete/category/{id}' , 'DeleteCategory');
   });

   // Partitions
   Route::controller(PartitionController::class)->group(function(){
        Route::post('/store/partition' , 'StorePartition');
        Route::post('/update/partition' , 'UpdatePartition');
        Route::delete('/delete/partition/{id}' , 'DeletePartition');
    });

    // Items
    Route::controller(ItemController::class)->group(function(){
        Route::post('/store/item' , 'StoreItem');
        Route::post('/update/item' , 'UpdateItem');
        Route::delete('/delete/item/{id}' , 'DeletePItem');

    });

    Route::controller(UserController::class)->group(function(){
        Route::get('/all/user' , 'AllUser');
        Route::get('/all/admin' , 'AllAdmin');
        Route::get('/add/admin/{id}', 'AddAdmin')->name('add.admin');
        Route::delete('/delete/user/{id}' , 'DeleteUser');

    });

});
