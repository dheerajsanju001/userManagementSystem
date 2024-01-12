<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{userController, DisplayUserListing};

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
Route::get('login', function () {
    return view('login');
});
Route::get('Home', function () {
    return view('Home');
});
Route::get('dashboard', function () {
    return view('dashboard');
});

Route::controller(userController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login');
    Route::get('/innerPage', 'innerPage')->name('innerPage');
    Route::post('/logout', 'logout')->name('logout');
});
Route::get('/userListPage', [DisplayUserListing::class, 'displayAuthenticateUser']);
Route::get('/register{id}', [DisplayUserListing::class, 'editUserRecord']);
Route::post('/updateRecord{id}', [DisplayUserListing::class, 'updateRecord']);
Route::get('/userListPage', [DisplayUserListing::class, 'displayAuthenticateUser']);


