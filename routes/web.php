<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HalAdminController;
use App\Http\Controllers\Admin\PengadaanController;
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

Route::resource('Admin', AdminController::class);
Route::resource('HalAdmin', HalAdminController::class);
Route::resource('Pengadaan', PengadaanController::class);