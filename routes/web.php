<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminControlleer;
use App\Http\Controllers\ProfileController;

Route::get('/',[HomeController::class,'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route:: get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
require __DIR__.'/auth.php';

Route:: get('view_category',[AdminControlleer::class,'view_category'])->middleware(['auth','admin']);

Route:: post('add_category',[AdminControlleer::class,'add_category'])->middleware(['auth','admin']);

Route:: get('delete_category/{id}',[AdminControlleer::class,'delete_category'])->middleware(['auth','admin']);

Route:: get('edit_category/{id}',[AdminControlleer::class,'edit_category'])->middleware(['auth','admin']);