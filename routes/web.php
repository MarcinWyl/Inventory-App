<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PersonController;

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

Route::get('/dashboard', [ProfileController::class, 'dashboard']) 
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admindashboard', function () {
    return view('admindashboard');
})->middleware(['auth', 'verified'])->name('admindashboard');

Route::get('/managerdashboard', function () {
    return view('managerdashboard');
})->middleware(['auth', 'verified'])->name('managerdashboard');

Route::get('/userdashboard', function () {
    return view('userdashboard');
})->middleware(['auth', 'verified'])->name('userdashboard');

Route::middleware('auth')->group(function () {

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/person', [PersonController::class, 'index'])->name('person.index');
    Route::get('/person/create', [PersonController::class, 'create'])->name('person.create');
    Route::post('/person/', [PersonController::class, 'store'])->name('person.store');
    Route::get('/person/{person}/edit', [PersonController::class, 'edit'])->name('person.edit');
    Route::put('/person/{person}/update', [PersonController::class, 'update'])->name('person.update');
    Route::delete('/person/{person}/destroy', [PersonController::class, 'destroy'])->name('person.destroy');
});

require __DIR__.'/auth.php';
