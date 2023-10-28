<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::post('login', [AuthController::class, 'AuthLogin']);

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});