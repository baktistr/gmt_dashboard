<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TregController;
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
    return redirect()->route('login');
});

Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false,
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/treg/{treg}', [TregController::class, 'show'])->name('treg.show');

Route::get('/building/{building}', function () {})->name('building.show');
