<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\Backend\UserContorller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// User Managment all routes
Route::prefix('users')->group(function () {

    Route::get('/view', [UserContorller::class, 'userView'])->name('user.view');
    Route::get('/add', [UserContorller::class, 'userAdd'])->name('users.add');
    Route::post('/store', [UserContorller::class, 'userStore'])->name('users.store');
    Route::get('/edit/{id}', [UserContorller::class, 'userEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserContorller::class, 'userUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserContorller::class, 'userDelete'])->name('users.delete');
});

//User Profile and change password
Route::prefix('profiles')->group(function () {

    Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'profileStore'])->name('profile.store');
    Route::get('/pssword/view', [ProfileController::class, 'passwordView'])->name('password.view');
    Route::post('/pssword/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
});
