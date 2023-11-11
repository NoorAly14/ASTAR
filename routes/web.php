<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PartitionController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\DataController;
use App\Http\Controllers\Backend\ViewUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/logout',  'UserDestroy')->name('user.logout');
        Route::get('/user/profile',  'UserProfile')->name('user.profile');
        Route::post('/user/profile/store', 'UserProfileStore')->name('user.profile.store');
    });

    Route::controller(DataController::class)->group(function () {
        Route::get('/view/partition/{id}',  'ViewPartition')->name('view.partition');
        Route::get('/view/item/{id}',  'ViewItem')->name('view.item');
    });
});


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard',  'AdminDashboard')->name('admin.dashboard');
        Route::get('/admin/logout',  'AdminDestroy')->name('admin.logout');
        Route::get('/admin/profile',  'AdminProfile')->name('admin.profile');
        Route::post('/admin/profile/store', 'AdminProfileStore')->name('admin.profile.store');
    });

    // Category All Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
        Route::delete('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });
    // Partition All Route
    Route::controller(PartitionController::class)->group(function () {
        Route::get('/all/partition', 'AllPartition')->name('all.partition');
        Route::get('/add/partition', 'AddPartition')->name('add.partition');
        Route::post('/store/partition', 'StorePartition')->name('store.partition');
        Route::get('/edit/partition/{id}', 'EditPartition')->name('edit.partition');
        Route::post('/update/partition', 'UpdatePartition')->name('update.partition');
        Route::delete('/delete/partition/{id}', 'DeletePartition')->name('delete.partition');
        Route::get('/partition/ajax/{category_id}', 'GetPartition');
    });

    // Item All Route
    Route::controller(ItemController::class)->group(function () {
        Route::get('/all/item', 'AllItem')->name('all.item');
        Route::get('/add/item', 'AddItem')->name('add.item');
        Route::post('/store/item', 'StoreItem')->name('store.item');
        Route::get('/edit/item/{id}', 'EditItem')->name('edit.item');
        Route::post('/update/item', 'UpdateItem')->name('update.item');
        Route::delete('/delete/item/{id}', 'DeletePItem')->name('delete.item');
    });

    Route::controller(ViewUserController::class)->group(function () {
        Route::get('/all/user', 'AllUser')->name('all.user');
        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin/{id}', 'AddAdmin')->name('add.admin');
        Route::delete('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');

    });



}); // End Middleware
