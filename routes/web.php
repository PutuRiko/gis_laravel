<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\AuthController;

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

Route::get("/index", function () {
    return view('front-end.index');
})->name('index');

Route::get('/map-marker', function () {
    return view('front-end.map_marker');
})->name('mapmarker');

Route::get('/more-marker', function () {
    return view('front-end.more_marker');
})->name('moremarker');

Route::get('/hospital', function () {
    return view('front-end.hospital');
})->name('hospital');

Route::get('/', function () {
    return view('front-end.pages-login');
})->name('pageslogin');

Route::get('/register', function () {
    return view('front-end.pages-register');
})->name('pagesregister');


Route::post('/hospital-store', [HospitalController::class, 'store'])->name('hospitalstore');

Route::get('/show-hospitals', [HospitalController::class, 'show'])->name('show_hospitals');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::post('/', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/hospitals/{id_rs}/edit', [HospitalController::class, 'edit'])->name('hospitals.edit');

Route::put('/hospitals/{id_rs}', [HospitalController::class, 'update'])->name('hospitals.update');

Route::delete('/hospitals/{id_rs}', [HospitalController::class, 'destroy'])->name('hospitals.destroy');