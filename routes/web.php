<?php

// base
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\role\RoleController;
use App\Http\Controllers\menu\MenuController;
use App\Http\Controllers\user\PasswordController;
use App\Http\Controllers\menu\SubmenuController;
use App\Http\Controllers\menu\SubsubmenuController;
// end base

// ADMIN
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DataWorkSectionController;
use App\Http\Controllers\admin\MasterSoalController;

// END ADMIN

// Peserta
// End Peserta

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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAdd'])->name('register');
Route::middleware(['login'])->group(function () {
  
    Route::resource('/login', AuthController::class);
    Route::resource('/', AuthController::class);

});

Route::resource('/password', PasswordController::class);
Route::get('/verify/{token}/{email}', [AuthController::class, 'verified']);

//Route Groups admin

Route::middleware(['admin', 'user'])->group(function () {
// Base Route
   Route::resource('/menu', MenuController::class);
    Route::resource('/sub_menu', SubmenuController::class);
    Route::resource('/sub_sub_menu', SubsubmenuController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user_verify', UserVerifyController::class);
    Route::get('/user_verify_role/{id}/{role}', [UserVerifyController::class, 'user_verify_role']);
    Route::post('/access', [RoleController::class, 'access'])->name('access');
// Base Route

Route::resource('/dashboardadmin', DashboardController::class);
Route::resource('/dataworksection', DataWorkSectionController::class);
Route::resource('/mastersoal', MasterSoalController::class);



});

// End kepala Ruangan

//Route Groups User

Route::middleware(['user'])->group(function () {
  Route::resource('/user', UserController::class);
   
});
