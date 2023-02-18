<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route("login");
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('members', App\Http\Controllers\MemberController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('branch', App\Http\Controllers\BranchController::class);
    Route::resource('group', App\Http\Controllers\GroupController::class);
    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
    Route::resource('recyclebin', App\Http\Controllers\RecyclebinController::class);
    Route::resource('activity', App\Http\Controllers\ActivityController::class);
    Route::resource('location-master', App\Http\Controllers\LocationMasterController::class);
    Route::resource('company-profile', App\Http\Controllers\CompanyProfileController::class);
    Route::resource('system-setting', App\Http\Controllers\SystemSettingController::class);
    Route::resource('admin-setting', App\Http\Controllers\AdminController::class);
    Route::resource('department', App\Http\Controllers\DepartmentController::class);
    Route::get('users/member/{id}', [UserController::class, 'showMember'])->name('users.showMember');
    Route::get('member/edit/{id}', [UserController::class, 'editMember'])->name('users.editMember');
    Route::get('active-member', [UserController::class, 'activeMember'])->name('activeMember');
    Route::get('pending-member', [UserController::class, 'pendingMember'])->name('pendingMember');
    Route::get('deleted-member', [UserController::class, 'deletedMember'])->name('deletedMember');
    Route::get('staff', [UserController::class, 'staffMember'])->name('staffMember');
    Route::get('users/Createmember/{id}', [UserController::class, 'createMember'])->name('users.createMember');
    Route::put('/users/{user}/status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
});
