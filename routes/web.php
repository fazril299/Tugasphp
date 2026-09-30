<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\SubcriptionPackageController;
use App\Http\Controllers\UserController;
use App\Models\SubcriptionPackage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $packages = SubcriptionPackage::query()->orderBy('id')->limit(3)->get();

    return view('Home', compact('packages'));
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('isGuest')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('login.store');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', [UserController::class, 'register'])->name('register.store');
});

Route::get('/logout', [UserController::class, 'logout'])
    ->middleware('isLoggedin')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware(['isLoggedin', 'isAdmin'])->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    Route::resource('book-categories', BookCategoryController::class)
        ->parameters(['book-categories' => 'bookCategory']);

    Route::resource('subscription-packages', SubcriptionPackageController::class)
        ->parameters(['subscription-packages' => 'subcriptionPackage']);
});
